<?php
// check Specialization class object
$spec_obj = isset($spec_obj) ? $spec_obj : new Specialization();
// get specialization id
$spec_id = isset($_GET['spec_id']) && !empty($_GET['spec_id']) ? base64_decode($_GET['spec_id']) : null;
// get specialization data
$spec_data = $spec_obj->get_specialization_info($spec_id);
// check specialization id
if ($spec_id !== null && $spec_data !== null) {
?>
  <div class="container">
    <header class="header">
      <h3 class="h3 text-capitalize"><?php echo lang('ADD SPECIALIZATION') ?></h3>
    </header>
    <section class="spec-content">
      <form class="add-new" action="?do=update-specialization" method="POST" onchange="form_validation(this)" id="add-new-specialization">
        <input type="hidden" name="spec-id" value="<?php echo base64_encode($spec_id) ?>">

        <section class="form-content" id="spec-form-content">
          <header>
            <h4 class="h4"><?php echo lang('SPEC INFO', 'specializations') ?></h4>
          </header>
          <section class="section-content">
            <!-- specialization name -->
            <div class="form-floating">
              <input type="text" class="form-control" id="specialization-name" name="specialization-name" placeholder="<?php echo lang("SPEC NAME", "specializations") ?>" value="<?php echo $spec_data['spec_name'] ?>" required>
              <label for="specialization-name"><?php echo lang("SPEC NAME", "specializations") ?></label>
            </div>
            <!-- specialization name -->
            <div class="form-floating">
              <textarea type="text" class="form-control" id="note" name="note" placeholder="<?php echo lang("NOTE") ?>"><?php echo $spec_data['note'] ?></textarea>
              <label for="note"><?php echo lang("NOTE") ?></label>
            </div>
          </section>
        </section>
        <!-- form button -->
        <div class="form-buttons">
          <button class="btn btn-success ms-auto" type="submit">
            <?php echo lang('SAVE') ?>
          </button>
          <button type="button" onclick="confirm_delete('?do=delete-specialization&spec_id=<?php echo base64_encode($spec_data['spec_id']) ?>')" class="btn btn-danger">
            <?php echo lang('DELETE') ?>
            <i class="bi bi-trash"></i>
          </button>
        </div>
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
