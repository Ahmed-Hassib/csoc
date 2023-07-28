<?php

// connect to database from configration file
require_once 'conf.php';
// developer name
$developerName = "ahmed hassib";
// sponsor company
$sponsorCompany = "leader group";
// company name
$appName = "sys tree";
// is app suspended
$isDeveloping = false;
// get user version of system
$curr_version = isset($_SESSION['curr_version_name']) ? $_SESSION['curr_version_name'] : "v1.0.3";

// include routes file
require_once "app-routes.php";            // get all routes
require_once "system-architecture.php";   // get files arcitecture of system

// include the important files
require_once $func . "functions.php";     // include all functions
require_once $lan  . "lang.php";          // include language file
require_once $tpl  . "header.php";        // include header file
