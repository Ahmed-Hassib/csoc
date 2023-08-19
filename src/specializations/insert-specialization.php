<?php

// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get specialization info
  $spec_name   = $_POST['specialization-name'];
  $spec_note  = $_POST['note'];

  // create an object of Soldier class
  $spec_obj = new Specialization();

  // check array counter
  if (count($spec_name) > 0) {
    // flag
    $flag = 0;

    foreach ($spec_name as $key => $spec) {
      if (!empty($spec)) {
        // insert new specialization
        $is_inserted = $spec_obj->insert_new_specialization(array($spec, $spec_note[$key]));
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
      $_SESSION['flash_message'] = $flag > 1 ? 'INSERTED ALL' : 'INSERTED';
      $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
      $_SESSION['flash_message_class'] = 'success';
      $_SESSION['flash_message_status'] = true;
      $_SESSION['flash_message_lang_file'] = 'specializations';
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
