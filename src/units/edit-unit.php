<?php
// create a new object of Unit class
$unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
// get unit id
$unit_id = isset($_GET['unit_id']) && !empty($_GET['unit_id']) ? base64_decode($_GET['unit_id']) : null;
// get unit data
$unit_data = $unit_obj->get_unit_info($unit_id);
// check if data exists
if ($unit_id !== null && $unit_data !== null) {
?>
  <div class="container">
    <header class="header">
      <h3 class="h3 text-capitalize"><?php echo lang('EDIT UNIT', 'units') ?></h3>
    </header>
    <section class="units-content">
      <form class="add-new" action="?do=update-unit" method="POST">
        <input type="hidden" class="hidden-input" id="unit-id" name="unit-id" value="<?php echo base64_encode($unit_data['unit_id']) ?>" required>
        <section class="form-content">
          <!-- unit name -->
          <div class="form-floating">
            <input type="text" class="form-control" id="unit-name" name="unit-name" placeholder="<?php echo lang("UNIT NAME", "units") ?>" value="<?php echo $unit_data['unit_name'] ?>" required>
            <label for="unit-name"><?php echo lang("UNIT NAME", "units") ?></label>
          </div>
          <!-- unit type -->
          <div class="form-floating">
            <?php $unit_types = $unit_obj->select_specific_column("*", "`unit_types`", ""); ?>
            <select type="text" class="form-select" id="unit-type" name="unit-type" required>
              <option value="default" disabled selected><?php echo lang("UNIT TYPE", "units") ?></option>
              <?php foreach ($unit_types as $key => $type) { ?>
                <option value="<?php echo $type['id'] ?>" <?php echo $unit_data['unit_type'] == $type['id'] ? 'selected' : '' ?>><?php echo $type['type_name'] ?></option>
              <?php } ?>
            </select>
            <label for="unit-type"><?php echo lang("UNIT TYPE", "units") ?></label>
          </div>
          <!-- unit phone -->
          <div class="form-floating">
            <input type="text" class="form-control" id="unit-phone" name="unit-phone" placeholder="<?php echo lang("UNIT PHONE", "units") ?>">
            <label for="unit-phone"><?php echo lang("UNIT PHONE", "units") ?></label>
          </div>
          <!-- unit leader rank -->
          <div class="form-floating">
            <?php $ranks = $unit_obj->select_specific_column("*", "`ranks`", "WHERE `type` = 1"); ?>
            <select type="text" class="form-select" id="unit-leader-rank" name="unit-leader-rank" required>
              <option value="default" disabled selected><?php echo lang("UNIT LEADER RANK", "units") ?></option>
              <?php foreach ($ranks as $key => $rank) { ?>
                <option value="<?php echo $rank['id'] ?>" <?php echo $unit_data['unit_leader_rank'] == $rank['id'] ? 'selected' : '' ?>><?php echo $rank['name'] ?></option>
              <?php } ?>
            </select>
            <label for="unit-leader-rank"><?php echo lang("UNIT LEADER RANK", "units") ?></label>
          </div>
          <!-- unit leader name -->
          <div class="form-floating">
            <input type="text" class="form-control" id="unit-leader-name" name="unit-leader-name" placeholder="<?php echo lang("UNIT LEADER NAME", "units") ?>" value="<?php echo $unit_data['unit_leader_name'] ?>" required>
            <label for="unit-leader-name"><?php echo lang("UNIT LEADER NAME", "units") ?></label>
          </div>
          <!-- unit leader phone -->
          <div class="form-floating">
            <input type="text" class="form-control" id="unit-leader-phone" name="unit-leader-phone" placeholder="<?php echo lang("UNIT LEADER PHONE", "units") ?>">
            <label for="unit-leader-phone"><?php echo lang("UNIT LEADER PHONE", "units") ?></label>
          </div>
          <!-- unit address -->
          <div class="form-floating">
            <input type="text" class="form-control" id="unit-address" name="unit-address" placeholder="<?php echo lang("UNIT ADDRESS", "units") ?>" value="<?php echo $unit_data['unit_address'] ?>">
            <label for="unit-address"><?php echo lang("UNIT ADDRESS", "units") ?></label>
          </div>

        </section>
        <div class="form-buttons">
          <button class="btn btn-success ms-auto" type="submit"><?php echo lang('SAVE') ?></button>
          <button type="button" onclick="confirm_delete('?do=delete-unit&unit_id=<?php echo base64_encode($unit_data['unit_id']) ?>')" class="btn btn-danger">
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
