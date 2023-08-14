<?php
// get action 
$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : 'manage';
// check action
if ($action == 'manage') {
  // dashboard of unit types
  $file_name_action = 'dashboard.php';
} elseif ($action == 'insert-type') {
  // insert new type
  $file_name_action = 'insert-type.php';
} elseif ($action == 'edit-type') {
  // edit new type
  $file_name_action = 'edit-type.php';
} elseif ($action == 'update-type') {
  // update new type
  $file_name_action = 'update-type.php';
} elseif ($action == 'delete-type') {
  // delete new type
  $file_name_action = 'delete-type.php';
} else {
  $file_name_action = null;
}

// check file name
if ($file_name_action === null) {
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
  include_once 'types/' . $file_name_action;
}
