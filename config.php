<?php

define("DEBUG", true);
error_reporting(E_ALL | E_STRICT);

function displayErrors($option = true) {
  if ($option) {
    ini_set('display_errors', '1');
  } else {
    ini_set('display_errors', '0');
  }
}

displayErrors(DEBUG);

session_start();
session_set_cookie_params(60 * 60 * 6); //Session limit 6 hours
clearstatcache();

define("SITE_FOLDER", "s/");

define("SITE_URL", "http://localhost/mystique/");
define("PUBLIC_URL", SITE_URL);
define("GAME_URL", PUBLIC_URL . "game/");
define("JS_URL", PUBLIC_URL . "js/");
define("CSS_URL", PUBLIC_URL . "css/");
define("IMAGE_URL", PUBLIC_URL . "images/");

define("INCLUDE_PATH", dirname(__FILE__) . "/includes/");

$admins = array("ADMIN_sdh", "adm_DeathEater", "adm_honeyras", "adm_maximus", "admin_rico", "Admin_Iceman", "admin_Stormbringer", "adm_trojan", "admin_Madking", "admin_mario", "admin_BHAGAT");

define("SQL_HOST", "localhost");
define("SQL_PORT", "3306");
define("SQL_USER", "siddhart_mstq14");
define("SQL_PASS", "k2rPT4H6InPc");
define("SQL_DB", "siddhart_mstq14");

define("MAIL_PATH", dirname(__FILE__) . "./../PHPMailer/PHPMailerAutoload.php");
define("MAIL_USER", "mystique+bitotsav.in");
define("MAIL_PASS", "KmkcsBEw}if6");
define("MAIL_HOST", "mail.bitotsav.in");   // ssl://smtp.gmail.com
define("MAIL_PORT", "587");                // 465
//define("FB_APPID", "");
//define("FB_SECRET", "");

define("ERROR_LOG", dirname(__FILE__) . "/~errors.txt");

date_default_timezone_set("Asia/Kolkata");
define("ZONE_OFFSET", "+0530");

require_once 'functions.php';
include "countdown.php";
?>
