<?php
// check Unit type was created or not
$unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
// get unit id
$type_id = isset($_GET['type_id']) && !empty($_GET['type_id']) ? base64_decode($_GET['type_id']) : null;
// get type data
$type_data = $unit_obj->get_type_info($type_id);
// check data
if ($type_id !== null && $type_data !== null) {
?>
  <div class="container">
    <header class="header">
      <h3 class="h3 text-capitalize"><?php echo lang('UNITS TYPES') ?></h3>
    </header>
    <section class="units-content">
      <form class="edit-type" action="?do=unit-types&action=update-type" method="POST" onchange="form_validation(this)" id="edit-type">
        <section class="form-content form-content-normal" id="units-form-content">
          <input type="hidden" name="id" value="<?php echo base64_encode($type_data['id']) ?>">
          <div class="section-content">
            <!-- unit-type name -->
            <div class="form-floating">
              <input type="text" class="form-control" id="type-name" name="type-name" placeholder="<?php echo lang("UNIT TYPE", "units") ?>" value="<?php echo $type_data['type_name'] ?>" required>
              <label for="type-name"><?php echo lang("UNIT TYPE", "units") ?></label>
            </div>

            <div class="units-buttons">
              <button type="submit" class="btn btn-success m-auto" type="submit"><?php echo lang('SAVE') ?></button>
              <button type="button" class="btn btn-danger m-auto" onclick="confirm_delete('?do=unit-types&action=delete-type&type_id=<?php echo base64_encode($type_data['id']) ?>')">
                <?php echo lang('DELETE') ?>
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </div>
        </section>
      </form>
    </section>
  </div>
<?php } else {
  // prepare flash session variables
  $_SESSION['flash_message'] = 'NO DATA';
  $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
  $_SESSION['flash_message_class'] = 'danger';
  $_SESSION['flash_message_status'] = false;
  $_SESSION['flash_message_lang_file'] = 'global_';
  // redirect back
  redirect_home(null, 'back', 0);
}