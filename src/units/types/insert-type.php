<?php

// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get request data for unit
  $types = $_POST['type-name'];

  // check unit class object was created or not
  $unit_obj = isset($unit_obj) ? $unit_obj : new Unit();

  // check array counter
  if (count($types) > 0) {
    // flag
    $flag = 0;

    foreach ($types as $key => $type) {
      if (!empty($type)) {
        // insert new specialization
        $is_inserted = $unit_obj->insert_new_type($type);
        // increase flag
        if ($is_inserted) $flag += 1;
      }
    }

    if ($flag == 0) {
      // prepare flash session variables
      $_SESSION['flash_message'] = 'QUERY PROBLEM';
      $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
      $_SESSION['flash_message_class'] = 'danger';
      $_SESSION['flash_message_status'] = false;
      $_SESSION['flash_message_lang_file'] = 'global_';
    } else {
      // prepare flash session variables
      $_SESSION['flash_message'] = $flag > 1 ? 'TYPE INSERTED ALL' : 'TYPE INSERTED';
      $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
      $_SESSION['flash_message_class'] = 'success';
      $_SESSION['flash_message_status'] = true;
      $_SESSION['flash_message_lang_file'] = 'units';
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
