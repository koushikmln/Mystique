<?php
session_start();
session_set_cookie_params(60 * 60 * 6); //Session limit 6 hours
clearstatcache();

define("SITE_URL", "http://192.168.102.66/mystique15/");
define("PUBLIC_URL", SITE_URL);
define("JS_URL", PUBLIC_URL . "js/");
define("CSS_URL", PUBLIC_URL . "css/");
define("IMAGE_URL", PUBLIC_URL . "images/");
define("INCLUDE_PATH", dirname(__FILE__) . "/includes/");
define("IMG_PATH", SITE_URL . "game_img/");

define("SQL_HOST", "localhost");
define("SQL_PORT", "3306");
define("SQL_USER", "root");
define("SQL_PASS", "root");
define("SQL_DB", "mystique");

define("MAIL_PATH", dirname(__FILE__) . "/PHPMailer/PHPMailerAutoload.php");
define("MAIL_USER", "mystique@bitotsav.in");
define("MAIL_PASS", "mystique2015");
define("MAIL_HOST", "mail.bitotsav.in");   // ssl://smtp.gmail.com
define("MAIL_PORT", "587");                // 465

define("ERROR_LOG", dirname(__FILE__) . "/~errors.txt");

date_default_timezone_set("Asia/Kolkata");
define("ZONE_OFFSET", "+0530");

define("START_MINUTES", 00);
define("START_HOUR", 18);
define("START_DAY", 13);
define("START_MONTH", 2); //Month 0-11
define("START_YEAR", 115); //Starting from 1900

define("SKIP", 3);
define("MAX_SKIP_LEVEL", 20);
define("END_LEVEL", 29);

$admins = array("adm_nightstalker", "adm_hippiesEverywhere", "adm_conquistador", "adm_czar", "adm_nims");
$bans = array("Batman");
?>