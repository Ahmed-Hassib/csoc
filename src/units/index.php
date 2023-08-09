<?php
// start output buffering
ob_start();
// start session
session_start();
// regenerate session id
session_regenerate_id();
// page title
$page_title = "units";
// page role
$page_role = "units";
// allow preloader
$preloader = true;
// no header flag for not to include it
$no_navbar = false;
// level
$level = 2;
// nav level
$nav_level = 1;
// language file
$lang_file = "units";
// pre configration of system
include_once str_repeat("../", $level) . "etc/pre-conf.php";
// check session
if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
  // check if Get request do is set or not
  $query = isset($_GET['do']) && !empty($_GET['do']) ? $_GET['do'] : 'manage';
  // check query 
  if ($query == 'manage') {
    // dashboard file
    $file_name = 'dashboard.php';
  } elseif ($query == 'add-new-unit') {
    // add new unit file
    $file_name = 'add-new-unit.php';
  } elseif ($query == 'insert-unit') {
    // insert unit file
    $file_name = 'insert-unit.php';
  } elseif ($query == 'edit-unit') {
    // edit unit file
    $file_name = 'edit-unit.php';
  } elseif ($query == 'update-unit') {
    // update unit file
    $file_name = 'update-unit.php';
  } else {
    // null for access denied
    $file_name = null;
  }
} else {
  // null for access denied
  $file_name = null;
}

// initial configration of system
include_once str_repeat("../", $level) . "etc/init.php";

// check file name
if ($file_name === null) {
  // prepare flash session variables
  $_SESSION['flash_message'] = 'ACCESS FAILED';
  $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
  $_SESSION['flash_message_class'] = 'danger';
  $_SESSION['flash_message_status'] = false;
  $_SESSION['flash_message_lang_file'] = 'global_';
  // redirect back
  redirect_home(null, 'back', 0);
} else {
  // include file
  include_once $file_name;
}

// include js files
include_once $tpl . "js-includes.php";
