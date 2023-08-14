<?php
// get request data for unit
$unit_id = isset($_GET['unit_id']) && !empty($_GET['unit_id']) ? base64_decode($_GET['unit_id']) : null;
// possible back
$is_back = isset($_GET['is_back']) && !empty($_GET['is_back']) ? 'back' : null;

// an empty array for erorrs
$err_arr = array();

// check unit name
if (empty($unit_id) || $unit_id === null) {
  $err_arr[] = 'unit name is requird';
}

// check if array of errors empty or not
if (empty($err_arr)) {
  // create an object of Unit class
  $unit_obj = new Unit();
  // delete unit
  $is_deleted = $unit_obj->delete_unit($unit_id);

  // check if unit deleted
  if ($is_deleted) {
    // prepare flash session variables
    $_SESSION['flash_message'] = 'DELETED';
    $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
    $_SESSION['flash_message_class'] = 'success';
    $_SESSION['flash_message_status'] = true;
    $_SESSION['flash_message_lang_file'] = 'units';
  } else {
    // prepare flash session variables
    $_SESSION['flash_message'] = 'QUERY PROBLEM';
    $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
    $_SESSION['flash_message_class'] = 'danger';
    $_SESSION['flash_message_status'] = false;
    $_SESSION['flash_message_lang_file'] = 'global_';
  }
} else {
  foreach ($err_arr as $key => $err) {
    // prepare flash session variables
    $_SESSION['flash_message'][$key] = strtoupper($err);
    $_SESSION['flash_message_icon'][$key] = 'bi-exclamation-triangle-fill';
    $_SESSION['flash_message_class'][$key] = 'danger';
    $_SESSION['flash_message_status'][$key] = false;
    $_SESSION['flash_message_lang_file'][$key] = 'units';
  }
}

// redirect back
redirect_home(null, $is_back, 0);
