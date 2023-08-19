<?php
// check Unit type was created or not
$unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
// get unit id
$type_id = isset($_GET['type_id']) && !empty($_GET['type_id']) ? base64_decode($_GET['type_id']) : null;
// possible back
$is_back = isset($_GET['is_back']) && !empty($_GET['is_back']) ? 'back' : null;
// get type data
$is_exist = $unit_obj->is_exist("`id`", "`unit_types`", $type_id);

// check data
if ($type_id !== null && $is_exist == true) {
  // update all units of this type
  $unit_obj->reset_units_types($type_id);
  // update type name
  $unit_obj->delete_type($type_id);
  // prepare flash session variables
  $_SESSION['flash_message'] = 'TYPE DELETED';
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

// redirect back
redirect_home(null, $is_back, 0);
