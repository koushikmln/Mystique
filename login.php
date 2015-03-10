<?php

include 'config.php';
$err = array();
if (!(strtotime($actualDateDisplay) < strtotime($targetDateDisplay)) && isset($_POST['password']) && isset($_POST['nickname'])) {
  if (!$_POST['nickname'] || !$_POST['password']) {
    $err[] = 'All the fields must be filled in!';
  }
  if (!count($err)) {
    $sql = "select * from usermaster where nickname = :nick and password = :pass";
    $result = DB::findOneFromQuery($sql, array(":nick" => $_POST['nickname'], ":pass" => substr($_POST['password'], 0, 20)));
    if (!$result) {
      $err[] = 'Wrong username and/or password!';
    } else {
      $_SESSION['nick'] = $result['nickname'];
      $_SESSION['id'] = $result['id'];
      $sql = "select starting_url from levelmaster where levelcode=" . $result['levelcode'];
      $row = DB::findOneFromQuery($sql);
      $url = implode('.', array_slice(explode('.', $row['starting_url']), 0, -1));
      redirectToAndExit(SITE_URL . $url);
    }
  }
}
if (count($err)) {
  $_SESSION['msg']['login-err'] = implode(' ', $err);
}
redirectToAndExit(SITE_URL);
?>
