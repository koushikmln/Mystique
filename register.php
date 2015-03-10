<?php

include 'config.php';
session_name('MyLogin');
define('INCLUDE_CHECK', true);
$err = array();
if (isset($_POST['password']) && isset($_POST['email'])) {
  if (!$_POST['password'] || !$_POST['fname'] || !$_POST['email'] || !$_POST['college'] || !$_POST['nickname']) {
    $err[] = 'Form incomplete!';
  }
  if (strlen($_POST['nickname']) < 3 || strlen($_POST['nickname']) > 20) {
    $err[] = 'Your nickname must be between 3 and 20 characters!';
  }
  if (preg_match('/[^a-z0-9\-\_\.]+/i', $_POST['nickname'])) {
    $err[] = 'Your nickname contains invalid characters!';
  }
  if (!isValidEmail($_POST['email'])) {
    $err[] = 'Your email is not valid!';
  }
  if (strlen($_POST['password']) < 6 || strlen($_POST['nickname']) > 20) {
    $err[] = 'Your password must be between 6 and 20 characters!';
  }
  if (!count($err)) {
    $query = "select * from usermaster where nickname = " . DB::escape($_POST['nickname']);
    $result = DB::findOneFromQuery($query);
    if ($result) {
      $err[] = 'Sorry, this nick is already taken!';
      $_SESSION['data'] = $_POST;
    } else {
      $res1 = DB::insert("usermaster", array("name" => $_POST['fname'], "email" => $_POST['email'], "college" => $_POST['college'],
                  "nickname" => $_POST['nickname'], "password" => $_POST['password'], "levelcode" => 0));
      $idgen = DB::lastInsertId();
      $res2 = DB::insert("leveltiming", array("id" => $idgen));
      if ($res1 && $res2) {
        $from = "team@mystique.bitotsav.in";
        $fromname = "Team Mystique";
        $to = $_POST['email'];
        $toname = $_POST['fname'];
        $subject = 'Mystique Treasure Hunt 2014 - Successful Registration';
        $body = 'Hi ' . $_POST['fname'] . '<br/><br/>Welcome to <a href="http://mystique.bitotsav.in/">Mystique</a>, the online treasure hunt! Sponsored by 10kya.com<br/>Following are your login credentials:<br><br>
        Username:' . $_POST['nickname'] . '<br>Password: ' . $_POST['password'] . '<br><br>
        Please use these when <a href="http://mystique.bitotsav.in/">Mystique</a> is launched on ' . $dayName . ', ' . $monthName . ' ' . $targetDay . '!<br><br>Best of luck!<br><br>
        Team Mystique';
        $r = sendMail($to, $subject, $body, $toname);
        if (!$r) {
          $err[] = 'Email could not be sent. However, we have registered your credentials.';
        } else {
          DB::update("usermaster", array("emailSent" => 1),"id=$idgen");
        }
        $_SESSION['msg']['reg-success'] = 'You have succesfully registered.';
      } else {
        $err[] = 'Damn! We faced an error!';
        $_SESSION['data'] = $_POST;
      }
    }
  } else {
    $_SESSION['data'] = $_POST;
  }
  if (count($err)) {
    $_SESSION['msg']['reg-err'] = implode('&nbsp;', $err);
  }
}
redirectToAndExit(SITE_URL);
?>
