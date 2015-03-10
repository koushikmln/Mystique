<?php
include 'config.php';
if (!(isset($_SESSION['id']) && in_array($_SESSION['nick'], $admins))) {
  $err[] = 'Please login!';
  $_SESSION['msg']['login-err'] = implode('<br /><img src="cross.jpg">', $err);
  header("Location: index.php");
  exit;
}
if (isset($_GET['nk'])) {
  echo "<title>Admin - " . $_GET['nk'] . "</title>";
  $sql = "select * from usermaster where nickname like " . DB::escape($_GET['nk']);
  $row = DB::findOneFromQuery($sql);
  unset($row['password']);
  echo "<pre>";
  print_r($row);
  echo "</pre>";
  $sql = "select * from wronganswers where nickname like " . DB::escape($_GET['nk']) . " order by updatedOn";
  $result = DB::findAllFromQuery($sql);
  echo "<table>";
  echo "<tr><td>Nick</td><td>IP</td><td>Level</td><td>Answer</td><td>Time</td></tr>";
  foreach ($result as $row) {
    echo "<tr><td>" . $row['nickname'] . "</td><td>" . $row['ip'] . "</td><td>" . $row['level'] . "</td><td>" . $row['answer'] . "</td><td>" . $row['updatedOn'] . "</td></tr>";
  }
  echo "</table>";
} else if (isset($_GET['answers'])) {
  ?>
  <head>
    <title>Admin - Answers</title>
    <meta http-equiv="refresh" content="20;url=admin.php?answers">
  </head>
  <body>
    <?php
    $sql = "select * from wronganswers where nickname!='ADMINZZZ' order by updatedOn desc LIMIT 100";
    $result = DB::findAllFromQuery($sql);
    echo "<table>";
    echo "<tr><td>Nick</td><td>IP</td><td>Level</td><td>Answer</td><td>Time</td></tr>";
    foreach ($result as $row) {
      echo "<tr><td><a target='_blank' href='/admin.php?nk=" . $row['nickname'] . "'>" . $row['nickname'] . "</a></td><td>" . $row['ip'] . "</td><td>" . $row['level'] . "</td><td>" . $row['answer'] . "</td><td>" . $row['updatedOn'] . "</td></tr>";
    }
    echo "</table>";
  } else if (isset($_GET['ips'])) {
    ?>
  <head>
    <title>Admin - IPs</title>
  </head>
  <body>
    <?php
    $sql = "select * from wronganswers where nickname='ADMINZZZ' order by time desc LIMIT 100";
    $result = mysql_query($sql);
    echo "<table>";
    echo "<tr><td>IP</td><td>Time</td></tr>";
    while ($row = mysql_fetch_assoc($result)) {
      echo "<tr><td>" . $row['ip'] . "</td><td>" . $row['time'] . "</td></tr>";
    }
    echo "</table>";
  }
  ?>