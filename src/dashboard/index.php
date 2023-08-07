<?php
// start output buffering
ob_start();
// start session
session_start();
// regenerate session id
session_regenerate_id();
// page title
$page_title = "dashboard";
// page role
$page_role = "dashboard";
// allow preloader
$preloader = true;
// no header flag for not to include it
$no_navbar = false;
// level
$level = 2;
// nav level
$nav_level = 1;
// language file
$lang_file = "dashboard";
// pre configration of system
include_once str_repeat("../", $level) . "etc/pre-conf.php";
// check session
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
  // check if Get request do is set or not
  $query = isset($_GET['do']) && !empty($_GET['do']) ? $_GET['do'] : 'manage';
  // check query 
  if ($query == 'manage') {
    $file_name = 'dashboard.php';
  }
}

// initial configration of system
include_once str_repeat("../", $level) . "etc/init.php";
// include file
include_once $file_name;

// include js files
include_once $tpl . "js-includes.php";