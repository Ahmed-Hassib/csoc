<?php
// check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // check Unit type was created or not
  $unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
  // get unit id
  $type_id = isset($_POST['id']) && !empty($_POST['id']) ? base64_decode($_POST['id']) : null;
  // get type data
  $type_data = $unit_obj->get_type_info($type_id);
  // check data
  if ($type_id !== null && $type_data !== null) {
    // get type name
    $type_name = trim($_POST['type-name'], '');
    // update type name
    $unit_obj->update_type($type_name, $type_id);
    // prepare flash session variables
    $_SESSION['flash_message'] = 'TYPE UPDATED';
    $_SESSION['flash_message_icon'] = 'bi-check2-circle-fill';
    $_SESSION['flash_message_class'] = 'success';
    $_SESSION['flash_message_status'] = true;
    $_SESSION['flash_message_lang_file'] = 'units';
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
