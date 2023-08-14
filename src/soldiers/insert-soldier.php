<?php

// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get soldier info
  $militiry_num   = trim($_POST['militiry-number'], '');
  $rank           = trim($_POST['soldier-rank'], '');
  $soldier_name   = trim($_POST['soldier-name'], '');
  $basic_unit     = isset($_POST['basic-unit']) ? $_POST['basic-unit'] : -1;
  $current_unit   = isset($_POST['current-unit']) ? $_POST['current-unit'] : -1;
  $joined_date    = isset($_POST['joined-date']) ? date_format(date_create($_POST['joined-date']), 'Y-m-d') : '0000-00-00';
  $discharge_date = isset($_POST['discharge-date']) ? date_format(date_create($_POST['discharge-date']), 'Y-m-d') : '0000-00-00';
  $national_id    = trim($_POST['national-id'], '');
  $soldier_addr   = trim($_POST['soldier-address'], '');
  $religion       = isset($_POST['religion']) ? $_POST['religion'] : -1;
  $qualification  = trim($_POST['qualification'], '');
  $specialization = isset($_POST['specialization']) ? trim($_POST['specialization'], '') : -1;
  $status         = isset($_POST['status']) ? $_POST['status'] : -1;
  $child          = $status == 1 ? $_POST['child'] : 0;
  $father_job     = trim($_POST['father-job'], '');
  $mother_job     = trim($_POST['mother-job'], '');
  $phone_1        = trim($_POST['soldier-phone-1'], '');
  $phone_2        = trim($_POST['soldier-phone-2'], '');

  // empty array for errors
  $err_arr = array();

  // validate military number field
  if (empty($militiry_num)) {
    $err_arr[] = 'militiry cannot be empty';
  }

  // validate rank field
  if ($rank < 0) {
    $err_arr[] = 'rank must be choosen';
  }

  // validate soldier name field
  if (empty($soldier_name)) {
    $err_arr[] = 'name is required';
  }

  // validate basic unit field
  if ($basic_unit < 0) {
    $err_arr[] = 'basic unit must be choosen';
  }

  // validate current unit field
  if ($current_unit < 0) {
    $err_arr[] = 'current unit must be choosen';
  }

  // validate specialization field
  if ($specialization < 0) {
    $err_arr[] = 'specialization must be choosen';
  }

  // validate national id field
  if (empty($national_id)) {
    $err_arr[] = 'national id cannot be empty';
  }

  // validate religion field
  if ($religion < 0) {
    $err_arr[] = 'religion must be choosen';
  }

  // validate status field
  if ($status < 0) {
    $err_arr[] = 'status must be choosen';
  }

  // check if array of errors empty or not
  if (empty($err_arr)) {
    // create an object of Soldier class
    $soldier_obj = new Soldier();
    // insert new soldier
    $is_inserted = $soldier_obj->insert_new_soldier(array($rank, $soldier_name, $soldier_addr, $phone_1, $phone_2, $militiry_num, $national_id, $basic_unit, $current_unit, $qualification, $specialization, $joined_date, $discharge_date, $status, $child, $father_job, $mother_job, $religion));
    // check if was inserted
    if ($is_inserted && $is_inserted !== null) {
      // prepare flash session variables
      $_SESSION['flash_message'] = 'INSERTED';
      $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
      $_SESSION['flash_message_class'] = 'success';
      $_SESSION['flash_message_status'] = true;
      $_SESSION['flash_message_lang_file'] = 'soldiers';
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
      $_SESSION['flash_message_lang_file'][$key] = 'soldiers';
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
