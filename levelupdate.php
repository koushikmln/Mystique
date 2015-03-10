<?php

include 'config.php';
if (!isset($_SESSION['nick'])) {
  redirectToAndExit(SITE_URL);
}
$details = getUserDetails($_SESSION['nick']);
if (isset($_POST['submit'])) {
  $skip = FALSE;
  if (isset($_POST['submit']) && $_POST['submit'] == "Skip") {
    $ans = "SKIP98756";
    if ($details['skips'] > 0) {
      $skip = TRUE;
    }
  } else {
    $ans = $_POST['answer'];
  }
  DB::insert("wronganswers", array("nickname" => $_SESSION['nick'], "level" => $details['levelcode'], "answer" => $ans, "ip" => $_SERVER['REMOTE_ADDR']));
  $query = "select starting_url from levelmaster where levelcode = :level and answer = :ans";
  $result = DB::findOneFromQuery($query, array(":level" => $details['levelcode'], ":ans" => $ans));
  if ($result || $skip) {
    DB::update("usermaster", array("skips" => $skip ? $details['skips'] - 1 : $details['skips'], "levelcode" => $details['levelcode'] + 1), "nickname='" . $_SESSION['nick'] . "' and levelcode=" . $details['levelcode'] . " and id=" . $_SESSION['id']);
    if (!$skip) {
      DB::update("leveltiming", array("level" . $details['levelcode'] => date("Y-m-d H:i:s")), "id=" . $_SESSION['id']);
    }
  }
}
$sql = "select * from levelmaster where levelcode=:level";
$row = DB::findOneFromQuery($sql, array(":level" => $details['levelcode']));
$url = implode('.', array_slice(explode('.', $row['starting_url']), 0, -1));
redirectToAndExit(SITE_URL . $url);
