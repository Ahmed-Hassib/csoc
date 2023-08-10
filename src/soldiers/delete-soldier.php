<?php

// get soldier info
$soldier_id = trim($_GET['soldier_id'], '');

// empty array for errors
$err_arr = array();

// validate military number field
if (empty($soldier_id)) {
  $err_arr[] = 'query problem';
}

// check if array of errors empty or not
if (empty($err_arr)) {
  // create an object of Soldier class
  $soldier_obj = new Soldier();
  // update new soldier
  $is_updated = $soldier_obj->delete_soldier($soldier_id);
  // prepare flash session variables
  $_SESSION['flash_message'] = 'DELETED';
  $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
  $_SESSION['flash_message_class'] = 'success';
  $_SESSION['flash_message_status'] = true;
  $_SESSION['flash_message_lang_file'] = 'soldiers';
} else {
  foreach ($err_arr as $key => $err) {
    // prepare flash session variables
    $_SESSION['flash_message'][$key] = strtoupper($err);
    $_SESSION['flash_message_icon'][$key] = 'bi-exclamation-triangle-fill';
    $_SESSION['flash_message_class'][$key] = 'danger';
    $_SESSION['flash_message_status'][$key] = false;
    $_SESSION['flash_message_lang_file'][$key] = 'global_';
  }
}

// redirect back
redirect_home(null, 'back', 0);
