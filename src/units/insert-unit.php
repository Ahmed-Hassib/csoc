<?php

// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get request data for unit
  $unit_name    = trim($_POST['unit-name'], '');
  $unit_type    = trim($_POST['unit-type'], '');
  $unit_phone   = trim($_POST['unit-phone'], '');
  $unit_address = trim($_POST['unit-address'], '');
  // get request data for unit leader
  $unit_leader_rank    = trim($_POST['unit-leader-rank'], '');
  $unit_leader_name    = trim($_POST['unit-leader-name'], '');
  $unit_leader_phone   = trim($_POST['unit-leader-phone'], '');

  // an empty array for erorrs
  $err_arr = array();

  // check unit name
  if (empty($unit_name)) {
    $err_arr[] = 'unit name is requird';
  }

  // check unit type
  if (empty($unit_type)) {
    $err_arr[] = 'unit type is requird';
  }

  // check unit leader rank
  if (empty($unit_leader_rank)) {
    $err_arr[] = 'leader rank is requird';
  }

  // check unit leader name
  if (empty($unit_leader_name)) {
    $err_arr[] = 'leader name is requird';
  }

  // check if array of errors empty or not
  if (empty($err_arr)) {
    // create an object of Unit class
    $unit_obj = new Unit();
    // insert new unit
    $is_inserted = $unit_obj->insert_new_unit(array($unit_name, $unit_address, $unit_type, $unit_leader_rank, $unit_leader_name));
    // check if was inserted
    if ($is_inserted && $is_inserted !== null) {
      // prepare flash session variables
      $_SESSION['flash_message'] = 'INSERTED';
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
} else {
  // prepare flash session variables
  $_SESSION['flash_message'] = 'ACCESS FAILED';
  $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
  $_SESSION['flash_message_class'] = 'danger';
  $_SESSION['flash_message_status'] = false;
  $_SESSION['flash_message_lang_file'] = 'global_';
}

// redirect back
redirect_home(null, 'back', 0);
