<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include_once("./classes/DB.php");
include_once("./classes/Login.php");
if (Login::isLoggedIn()) {
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $token = "";
  $type = 0;
  if (isset($_COOKIE['Campaigners_ID'])) {
    $token = $_COOKIE['Campaigners_ID'];
    setcookie("Campaigners_ID", null, -1, '/');
    setcookie("Campaigners_ID_", null, -1, '/');
  } else if (isset($_COOKIE['TCampaigners_ID'])) {
    $token = $_COOKIE['TCampaigners_ID'];
    setcookie("TCampaigners_ID", null, -1, '/');
    setcookie("TCampaigners_ID_", null, -1, '/');
  } else if (isset($_SESSION["loginToken"])) {
    $token = $_SESSION['loginToken'];
    $_SESSION['loginToken'] = NULL;
  }
  DB::query('UPDATE member_login_tokens SET is_deleted=1 WHERE token=:token', array(":token" => $token));
  $_SESSION['userId'] = NULL;
}
header("Location:./login_page.html");
