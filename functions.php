<?php

/**
 * This collection of php classes and functions is part of the phpboilerplate project
 * @author: Siddhartha Sahu <sh.siddhartha@gmail.com>
 * @license: GNU GPLv3
 * 
 */
function redirectToAndExit($url) {
  header("Location:" . $url);
  exit;
}

function getUserDetails($nick) {
  $sql = "select * from usermaster where nickname=:nick";
  $res = DB::findOneFromQuery($sql, array(":nick" => $nick));
  return $res;
}

function redirectWithCheckAndExit($url) {
  if (isset($_SESSION['RedirectUrl'])) {
    $url = $_SESSION['RedirectUrl'];
    unset($_SESSION['RedirectUrl']);
  }
  redirectTo($url);
}

function getNumberForCache() {
  return DEBUG ? date("YmdHis") : date("YmdH");
}

function writeFile($filename, $data) {
  $file = fopen($filename, "a+");
  if ($file) {
    fputs($file, date("[Y-m-d H:i:s]\n") . $data
            . "\n======================================================================\n");
    fclose($file);
    return true;
  }
  return false;
}

function writeError($data) {
  writeFile(ERROR_LOG, $data);
}

function isValidEmail($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sendMail($to, $subject, $body, $toname = "", $from = "mystique@bitotsav.in", $fromname = "Team Mystique") {
  try {
    require MAIL_PATH;
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = MAIL_HOST;
    $mail->Port = MAIL_PORT;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = MAIL_USER;
    $mail->Password = MAIL_PASS;
    $mail->setFrom($from, $fromname);
    $mail->addReplyTo($from, $fromname);
    $mail->addAddress($to, $toname);
    $mail->Subject = $subject;
    $mail->msgHTML($body);
    if (!$mail->send()) {
      return FALSE;
    } else {
      return TRUE;
    }
  } catch (Exception $ex) {
    return FALSE;
  }
}

function prettyPrint($data, $withType = false) {
  echo "<pre>";
  $withType ? var_dump($data) : print_r($data);
  echo "</pre>";
}

function printPageNos($total) {
  if ($total > 1) {
    parse_str($_SERVER['QUERY_STRING'], $query_string);
    echo "<p class='pagenos'>Page: ";
    for ($i = 1; $i <= $total; $i++) {
      $query_string['page'] = $i;
      echo "<a style='text-decoration:none' href='?" . http_build_query($query_string) . "'>$i</a> ";
    }
    echo "</p>";
  }
}

class SessionData {

  public static function set($name, $data) {
    $_SESSION[$name] = $data;
  }

  public static function get($name1, $name2 = null) {
    if (isset($_SESSION[$name1])) {
      if ($name2 != null) {
        if (isset($_SESSION[$name1][$name2])) {
          $data = $_SESSION[$name1][$name2];
          unset($_SESSION[$name1][$name2]);
        } else {
          $data = "";
        }
      } else {
        $data = $_SESSION[$name1];
        unset($_SESSION[$name1]);
      }
    } else {
      $data = "";
    }
    return $data;
  }

}

class DB {

  public static $connection = null;

  public static function initialize() {
    if (self::$connection != null)
      return true;
    try {
      self::$connection = new PDO("mysql:dbname=" . SQL_DB . ";host=" . SQL_HOST . ";port=" . SQL_PORT . "", SQL_USER, SQL_PASS, array(
          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      ));
      self::$connection->exec("SET CHARACTER SET utf8");
    } catch (PDOException $error) {
      self::$connection = null;
      writeError('DB Connection failed:\n' . $error->getMessage());
      die("Error creating database connection (error log)!");
      return false;
    }
    return true;
  }

  public static function closeConnection() {
    self::$connection = null;
    return true;
  }

  public static function query($query, $values = null) {
    if (!self::initialize())
      return false;
    try {
      if (is_array($values)) {
        $stmt = self::$connection->prepare($query);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        return self::$connection->query($query);
      }
    } catch (PDOException $e) {
      self::handleError($e, $query);
      return false;
    }
  }

  public static function findAllWithCount($select, $body, $page, $limit) {
    if (!self::initialize())
      return false;
    $countselect = "SELECT count(*) as count ";
    $limitquery = " LIMIT " . ($page - 1) * $limit . "," . $limit;
    $query = $countselect . $body;
    $count = self::findOneFromQuery($query);
    $res['total'] = $count['count'];
    $res['noofpages'] = ceil($count['count'] * 1.0 / $limit);
    $query = $select . " " . $body . $limitquery;
    $res['data'] = self::findAllFromQuery($query);
    return $res;
  }

  public static function insert($table, $data) {
    if (!self::initialize())
      return false;
    $data['createdOn'] = date("Y-m-d H:i:s");
    $data['updatedOn'] = date("Y-m-d H:i:s");
    $keys = array();
    $values = array();
    foreach ($data as $key => $value) {
      $keys[] = $key;
      $values[] = self::$connection->quote($value);
    }
    $query = 'INSERT INTO ' . $table . ' (' . join(', ', $keys) . ') VALUES (' . join(', ', $values) . ')';
    try {
      return self::$connection->exec($query);
    } catch (PDOException $e) {
      self::handleError($e, $query);
      return false;
    }
  }

  public static function update($table, $data, $where, $values = null) {
    if (!self::initialize())
      return false;
    $data['updatedOn'] = date("Y-m-d H:i:s");
    $setters = array();
    foreach ($data as $key => $value) {
      $setters[] = $key . '=' . self::$connection->quote($value);
    }
    $query = 'UPDATE ' . $table . ' SET ' . join(', ', $setters) . ' WHERE ' . $where;
    try {
      if (is_array($values)) {
        $stmt = self::$connection->prepare($query);
        $stmt->execute($values);
      } else {
        $stmt = self::$connection->exec($query);
      }
      return $stmt;
    } catch (PDOException $e) {
      self::handleError($e, $query);
      return false;
    }
  }

  public static function delete($table, $where) {
    return self::query("delete from $table where " . $where);
  }

  public static function findAllFromQuery($query, $values = null) {
    if (!self::initialize())
      return false;
    try {
      if (is_array($values)) {
        $stmt = self::$connection->prepare($query);
        $stmt->execute($values);
      } else {
        $stmt = self::$connection->query($query);
      }
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      self::handleError($e, $query);
      return false;
    }
  }

  public static function findOneFromQuery($query, $values = null) {
    if (!self::initialize())
      return false;
    try {
      if (is_array($values)) {
        $stmt = self::$connection->prepare($query);
        $stmt->execute($values);
      } else {
        $stmt = self::$connection->query($query);
      }
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      self::handleError($e, $query);
      return false;
    }
  }

  public static function logActivity($activity, $message, $result) {
    if (!self::initialize()) {
      writeError("No connection error:\n" . $activity . "\n" . $message . "\n" . $result);
      return false;
    }
    $table = "phpbp_activity_log";
    $createTable = "CREATE TABLE IF NOT EXISTS `$table` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `activity` text NOT NULL,
    `message` text NOT NULL,
    `result` text NOT NULL,
    `session` text NOT NULL,
    `createdOn` datetime NOT NULL,
    `updatedOn` datetime NOT NULL,
    PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
    self::query($createTable);
    $data = array("activity" => $activity, "message" => $message, "result" => $result);
    $data['session'] = print_r($_SESSION, true);
    $data['updatedOn'] = date("Y-m-d H:i:s");
    $data['createdOn'] = date("Y-m-d H:i:s");
    return self::insert($table, $data);
  }

  public static function escape($value) {
    if (!self::initialize())
      return false;
    return self::$connection->quote($value);
  }

  public static function lastInsertId() {
    if (!self::initialize())
      return false;
    return self::$connection->lastInsertId();
  }

  private static function handleError($e = null, $data = "") {
    if ($e != null) {
      $data .= "\nError: " . $e->getMessage() . "\n" . $e->getFile();
    }
    writeError("Query error:\n" . $data);
  }

}

?>
