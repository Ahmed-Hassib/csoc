<?php

// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // get specialization info
  $spec_id    = isset($_POST['spec-id']) && !empty($_POST['spec-id']) ? base64_decode($_POST['spec-id']) : null;
  $spec_name  = $_POST['specialization-name'];
  $spec_note  = $_POST['note'];

  // create an object of Soldier class
  $spec_obj = new Specialization();

  // check if id exists
  if ($spec_id !== null && $spec_obj->is_exist("`spec_id`", "`specialization`", $spec_id)) {
    // update specialization
    $is_updated = $spec_obj->update_specialization(array($spec_name, $spec_note, $spec_id));
    // prepare flash session variables
    $_SESSION['flash_message'] = 'UPDATED';
    $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
    $_SESSION['flash_message_class'] = 'success';
    $_SESSION['flash_message_status'] = true;
    $_SESSION['flash_message_lang_file'] = 'specializations';
  } else {
    // prepare flash session variables
    $_SESSION['flash_message'] = 'NO DATA';
    $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
    $_SESSION['flash_message_class'] = 'danger';
    $_SESSION['flash_message_status'] = false;
    $_SESSION['flash_message_lang_file'] = 'global_';
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
