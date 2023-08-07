<?php
// start output buffering
ob_start();
// start session
session_start();
// regenerate session id
session_regenerate_id();
// page title
$page_title = "login";
// page role
$page_role = "login";
// allow preloader
$preloader = true;
// no header flag for not to include it
$no_navbar = true;
// level
$level = 0;
// nav level
$nav_level = 0;
// language file
$lang_file = "login";
// pre configration of system
include_once str_repeat("../", $level) . "etc/pre-conf.php";

// check if user comming from http request ..
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // include code of process data
  $file_name = $src . "login/process.php";
} else {
  // include login content
  $file_name = $src . "login/index.php";
}

// initial configration of system
include_once str_repeat("../", $level) . "etc/init.php";
// include file
include_once $file_name;

// include js files
include_once $tpl . "js-includes.php";