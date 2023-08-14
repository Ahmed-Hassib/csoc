<?php

// get specialization info
$spec_id = isset($_GET['spec_id']) && !empty($_GET['spec_id']) ? base64_decode($_GET['spec_id']) : null;
// possible back
$is_back = isset($_GET['is_back']) && !empty($_GET['is_back']) ? 'back' : null;

// check spec id
if ($spec_id !== null) {
  // create an object of Soldier class
  $spec_obj = new Specialization();

  // check if id exists
  if ($spec_obj->is_exist("`spec_id`", "`specialization`", $spec_id)) {
    // update specialization
    $is_deleted = $spec_obj->delete_specialization($spec_id);
    // check if deleted
    if ($is_deleted) {
      // prepare flash session variables
      $_SESSION['flash_message'] = 'DELETED';
      $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
      $_SESSION['flash_message_class'] = 'success';
      $_SESSION['flash_message_status'] = true;
      $_SESSION['flash_message_lang_file'] = 'specializations';
    } else {
      // prepare flash session variables
      $_SESSION['flash_message'] = 'QUERY PROBLEM';
      $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
      $_SESSION['flash_message_class'] = 'danger';
      $_SESSION['flash_message_status'] = false;
      $_SESSION['flash_message_lang_file'] = 'global_';
    }
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
  $_SESSION['flash_message'] = 'NO DATA';
  $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
  $_SESSION['flash_message_class'] = 'danger';
  $_SESSION['flash_message_status'] = false;
  $_SESSION['flash_message_lang_file'] = 'global_';
}

// redirect back
redirect_home(null, $is_back, 0);