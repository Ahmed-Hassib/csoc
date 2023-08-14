<?php
// check Soldier class object was created or not
$soldier_obj = isset($soldier_obj) ? $soldier_obj : new Soldier();
// get soldier id
$soldier_id = isset($_GET['soldier_id']) && !empty($_GET['soldier_id']) ? base64_decode($_GET['soldier_id']) : null;
// check soldier id
if ($soldier_id !== null) {
  // get soldier data
  $soldier_data = $soldier_obj->get_soldier_info($soldier_id);
?>
  <div class="container">
    <header class="header">
      <h3 class="h3 text-capitalize"><?php echo lang('EDIT SOLDIER', 'soldiers') ?></h3>
    </header>
    <section class="soldiers-content">
      <form class="add-new" action="?do=update-soldier" method="POST" onchange="form_validation(this)" id="add-new-soldier">
        <input type="hidden" name="id" value="<?php echo base64_encode($soldier_data['id']) ?>">
        <section class="form-content">
          <header>
            <h4 class="h4"><?php echo lang('MILITIRY INFO', 'soldiers') ?></h4>
          </header>
          <!-- militiry number -->
          <div class="form-floating">
            <input type="text" class="form-control" id="militiry-number" name="militiry-number" placeholder="<?php echo lang("MILITIRY NUMBER", "soldiers") ?>" value="<?php echo $soldier_data['militiry_number'] ?>" required>
            <label for="militiry-number"><?php echo lang("MILITIRY NUMBER", "soldiers") ?></label>
          </div>
          <!-- soldier degree -->
          <div class="form-floating">
            <?php $degrees = $soldier_obj->select_specific_column("*", "`ranks`", "WHERE `type` = 0 LIMIT 3"); ?>
            <select class="form-select" id="soldier-rank" name="soldier-rank" required>
              <option value="default" disabled selected><?php echo lang("DEGREES", "soldiers") ?></option>
              <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $degree['id'] ?>" <?php echo $degree['id'] == $soldier_data['rank'] ? 'selected' : '' ?>><?php echo $degree['name'] ?></option>
              <?php } ?>
            </select>
            <label for="soldier-rank"><?php echo lang("DEGREE", "soldiers") ?></label>
          </div>
          <!-- soldier name -->
          <div class="form-floating">
            <input type="text" class="form-control" id="soldier-name" name="soldier-name" placeholder="<?php echo lang("SOLDIER NAME", "soldiers") ?>" value="<?php echo $soldier_data['name'] ?>" required>
            <label for="soldier-name"><?php echo lang("SOLDIER NAME", "soldiers") ?></label>
          </div>
          <!-- basic unit -->
          <div class="form-floating">
            <?php $units = $soldier_obj->select_specific_column("*", "`units`", ""); ?>
            <select class="form-select" id="basic-unit" name="basic-unit" required>
              <option value="default" disabled selected><?php echo lang("BASIC UNIT", "soldiers") ?></option>
              <?php foreach ($units as $key => $unit) { ?>
                <option value="<?php echo $unit['unit_id'] ?>" <?php echo $unit['unit_id'] == $soldier_data['basic_unit'] ? 'selected' : '' ?>><?php echo $unit['unit_name'] ?></option>
              <?php } ?>
            </select>
            <label for="basic-unit"><?php echo lang("BASIC UNIT", "soldiers") ?></label>
          </div>
          <!-- current unit -->
          <div class="form-floating">
            <?php $units = $soldier_obj->select_specific_column("*", "`units`", ""); ?>
            <select class="form-select" id="current-unit" name="current-unit" required>
              <option value="default" disabled selected><?php echo lang("CURRENT UNIT", "soldiers") ?></option>
              <?php foreach ($units as $key => $unit) { ?>
                <option value="<?php echo $unit['unit_id'] ?>" <?php echo $unit['unit_id'] == $soldier_data['current_unit'] ? 'selected' : '' ?>><?php echo $unit['unit_name'] ?></option>
              <?php } ?>
            </select>
            <label for="current-unit"><?php echo lang("CURRENT UNIT", "soldiers") ?></label>
          </div>
          <!-- joined date -->
          <div class="form-floating">
            <input type="date" class="form-control" id="joined-date" name="joined-date" placeholder="<?php echo lang("JOINED DATE", "soldiers") ?>" value="<?php echo $soldier_data['joined_date'] ?>">
            <label for="joined-date"><?php echo lang("JOINED DATE", "soldiers") ?></label>
          </div>
          <!-- discharge date -->
          <div class="form-floating">
            <input type="date" class="form-control" id="discharge-date" name="discharge-date" placeholder="<?php echo lang("DISCHARGE DATE", "soldiers") ?>" value="<?php echo $soldier_data['discharge_date'] ?>">
            <label for="discharge-date"><?php echo lang("DISCHARGE DATE", "soldiers") ?></label>
          </div>
          <!-- discharge date -->
          <div class="form-floating">
            <?php $specializations = $soldier_obj->select_specific_column("*", "`specialization`", ""); ?>
            <select class="form-select" id="specialization" name="specialization" required>
              <option value="default" disabled selected><?php echo lang("SPECIALIZATION", "soldiers") ?></option>
              <?php foreach ($specializations as $key => $spec) { ?>
                <option value="<?php echo $spec['spec_id'] ?>" <?php echo $spec['spec_id'] == $soldier_data['specialization'] ? 'selected' : '' ?>><?php echo $spec['spec_name'] ?></option>
              <?php } ?>
            </select>
            <label for="specialization"><?php echo lang("SPECIALIZATION", "soldiers") ?></label>
          </div>

          <!-- militiry info -->
          <header>
            <h4 class="h4"><?php echo lang('MILITIRY INFO', 'soldiers') ?></h4>
          </header>
          <!-- natinal id -->
          <div class="form-floating">
            <input type="text" class="form-control" id="national-id" name="national-id" placeholder="<?php echo lang("NATIONAL ID", "soldiers") ?>" value="<?php echo $soldier_data['national_id'] ?>" required>
            <label for="national-id"><?php echo lang("NATIONAL ID", "soldiers") ?></label>
          </div>
          <!-- soldier address -->
          <div class="form-floating">
            <input type="text" class="form-control" id="soldier-address" name="soldier-address" placeholder="<?php echo lang("SOLDIER ADDRESS", "soldiers") ?>" value="<?php echo $soldier_data['address'] ?>">
            <label for="soldier-address"><?php echo lang("SOLDIER ADDRESS", "soldiers") ?></label>
          </div>
          <!-- religion -->
          <div class="form-floating">
            <select class="form-select" id="religion" name="religion" required>
              <option value="default" disabled selected><?php echo lang("RELIGION", "soldiers") ?></option>
              <option value="0" <?php echo $soldier_data['religion'] == '0' ? 'selected' : '' ?>><?php echo lang("MUSLIM", "soldiers") ?></option>
              <option value="1" <?php echo $soldier_data['religion'] == '1' ? 'selected' : '' ?>><?php echo lang("CHRISTIAN", "soldiers") ?></option>
            </select>
            <label for="religion"><?php echo lang("RELIGION", "soldiers") ?></label>
          </div>
          <!-- qualification -->
          <div class="form-floating">
            <input type="text" class="form-control" id="qualification" name="qualification" placeholder="<?php echo lang("QUALIFICATION", "soldiers") ?>" value="<?php echo $soldier_data['qualification'] ?>">
            <label for="qualification"><?php echo lang("QUALIFICATION", "soldiers") ?></label>
          </div>
          <!-- status -->
          <div class="form-floating">
            <select class="form-select" id="status" name="status" required>
              <option value="default" disabled selected><?php echo lang("STATUS", "soldiers") ?></option>
              <option value="0" <?php echo $soldier_data['status'] == '0' ? 'selected' : '' ?>><?php echo lang("SINGLE", "soldiers") ?></option>
              <option value="1" <?php echo $soldier_data['status'] == '1' ? 'selected' : '' ?>><?php echo lang("MARRIED", "soldiers") ?></option>
            </select>
            <label for="status"><?php echo lang("STATUS", "soldiers") ?></label>
          </div>
          <!-- number of child -->
          <div class="form-floating">
            <input type="number" class="form-control" id="child" name="child" placeholder="<?php echo lang("#CHILD", "soldiers") ?>" value="<?php echo $soldier_data['num_child'] ?>">
            <label for="child"><?php echo lang("#CHILD", "soldiers") ?></label>
          </div>
          <!-- father`s job -->
          <div class="form-floating">
            <input type="text" class="form-control" id="father-job" name="father-job" placeholder="<?php echo lang("FATHER JOB", "soldiers") ?>" value="<?php echo $soldier_data['father_job'] ?>">
            <label for="father-job"><?php echo lang("FATHER JOB", "soldiers") ?></label>
          </div>
          <!-- mother job -->
          <div class="form-floating">
            <input type="text" class="form-control" id="mother-job" name="mother-job" placeholder="<?php echo lang("MOTHER JOB", "soldiers") ?>" value="<?php echo $soldier_data['mother_job'] ?>">
            <label for="mother-job"><?php echo lang("MOTHER JOB", "soldiers") ?></label>
          </div>
          <!-- soldier phone -->
          <div class="form-floating">
            <input type="text" class="form-control" id="soldier-phone-1" name="soldier-phone-1" placeholder="<?php echo lang("SOLDIER PHONE", "soldiers") ?>" value="<?php echo $soldier_data['phone1'] ?>">
            <label for="soldier-phone-1"><?php echo lang("SOLDIER PHONE", "soldiers") ?></label>
          </div>
          <!-- soldier phone -->
          <div class="form-floating">
            <input type="text" class="form-control" id="soldier-phone-2" name="soldier-phone-2" placeholder="<?php echo lang("SOLDIER PHONE", "soldiers") ?>" value="<?php echo $soldier_data['phone2'] ?>">
            <label for="soldier-phone-2"><?php echo lang("SOLDIER PHONE", "soldiers") ?></label>
          </div>

        </section>
        <!-- form button -->
        <div class="form-buttons">
          <button class="btn btn-success ms-auto" type="submit"><?php echo lang('SAVE') ?></button>
          <button type="button" onclick="confirm_delete('?do=delete-soldier&soldier_id=<?php echo base64_encode($soldier_data['id']) ?>')" class="btn btn-danger">
            <?php echo lang('DELETE') ?>
            <i class=" bi bi-trash"></i>
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
