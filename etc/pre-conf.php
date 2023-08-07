<?php

// connect to database from configration file
require_once 'conf.php';
// developer name
$developer_name = "ahmed hassib";
// company name
$appName = "csoc";
// is app suspended
$is_developin = false;

// include routes file
require_once "app-routes.php";            // get all routes
require_once "system-architecture.php";   // get files arcitecture of system

// include the important files
require_once $func . "functions.php";     // include all functions
require_once $lan  . "lang.php";          // include language file
require_once $tpl  . "header.php";        // include header file