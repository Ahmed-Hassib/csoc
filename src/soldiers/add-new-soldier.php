<?php $soldier_obj = isset($soldier_obj) ? $soldier_obj : new Soldier(); ?>
<div class="container">
  <header class="header">
    <h3 class="h3 text-capitalize"><?php echo lang('ADD SOLDIER') ?></h3>
  </header>
  <section class="soldiers-content">
    <form class="add-new" action="?do=insert-soldier" method="POST" onchange="form_validation(this)" id="add-new-soldier">
      <section class="form-content">
        <header>
          <h4 class="h4"><?php echo lang('MILITIRY INFO', 'soldiers') ?></h4>
        </header>
        <!-- militiry number -->
        <div class="form-floating">
          <input type="text" class="form-control" id="militiry-number" name="militiry-number" placeholder="<?php echo lang("MILITIRY NUMBER", "soldiers") ?>" required>
          <label for="militiry-number"><?php echo lang("MILITIRY NUMBER", "soldiers") ?></label>
        </div>
        <!-- soldier degree -->
        <div class="form-floating">
          <?php $degrees = $soldier_obj->select_specific_column("*", "`ranks`", "WHERE `type` = 0 LIMIT 3"); ?>
          <select class="form-select" id="soldier-rank" name="soldier-rank" required>
            <option value="default" disabled selected><?php echo lang("DEGREES", "soldiers") ?></option>
            <?php foreach ($degrees as $key => $degree) { ?>
              <option value="<?php echo $degree['id'] ?>"><?php echo $degree['name'] ?></option>
            <?php } ?>
          </select>
          <label for="soldier-rank"><?php echo lang("DEGREE", "soldiers") ?></label>
        </div>
        <!-- soldier name -->
        <div class="form-floating">
          <input type="text" class="form-control" id="soldier-name" name="soldier-name" placeholder="<?php echo lang("SOLDIER NAME", "soldiers") ?>" required>
          <label for="soldier-name"><?php echo lang("SOLDIER NAME", "soldiers") ?></label>
        </div>
        <!-- basic unit -->
        <div class="form-floating">
          <?php $units = $soldier_obj->select_specific_column("*", "`units`", ""); ?>
          <select class="form-select" id="basic-unit" name="basic-unit" required>
            <option value="default" disabled selected><?php echo lang("BASIC UNIT", "soldiers") ?></option>
            <?php foreach ($units as $key => $unit) { ?>
              <option value="<?php echo $unit['unit_id'] ?>"><?php echo $unit['unit_name'] ?></option>
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
              <option value="<?php echo $unit['unit_id'] ?>"><?php echo $unit['unit_name'] ?></option>
            <?php } ?>
          </select>
          <label for="current-unit"><?php echo lang("CURRENT UNIT", "soldiers") ?></label>
        </div>
        <!-- joined date -->
        <div class="form-floating">
          <input type="date" class="form-control" id="joined-date" name="joined-date" placeholder="<?php echo lang("JOINED DATE", "soldiers") ?>">
          <label for="joined-date"><?php echo lang("JOINED DATE", "soldiers") ?></label>
        </div>
        <!-- discharge date -->
        <div class="form-floating">
          <input type="date" class="form-control" id="discharge-date" name="discharge-date" placeholder="<?php echo lang("DISCHARGE DATE", "soldiers") ?>">
          <label for="discharge-date"><?php echo lang("DISCHARGE DATE", "soldiers") ?></label>
        </div>
        <!-- discharge date -->
        <div class="form-floating">
          <?php $specializations = $soldier_obj->select_specific_column("*", "`specialization`", ""); ?>
          <select class="form-select" id="specialization" name="specialization" required>
            <option value="default" disabled selected><?php echo lang("SPECIALIZATION", "soldiers") ?></option>
            <?php foreach ($specializations as $key => $spec) { ?>
              <option value="<?php echo $spec['spec_id'] ?>"><?php echo $spec['spec_name'] ?></option>
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
          <input type="text" class="form-control" id="national-id" name="national-id" placeholder="<?php echo lang("NATIONAL ID", "soldiers") ?>" required>
          <label for="national-id"><?php echo lang("NATIONAL ID", "soldiers") ?></label>
        </div>
        <!-- soldier address -->
        <div class="form-floating">
          <input type="text" class="form-control" id="soldier-address" name="soldier-address" placeholder="<?php echo lang("SOLDIER ADDRESS", "soldiers") ?>">
          <label for="soldier-address"><?php echo lang("SOLDIER ADDRESS", "soldiers") ?></label>
        </div>
        <!-- religion -->
        <div class="form-floating">
          <select class="form-select" id="religion" name="religion" required>
            <option value="default" disabled selected><?php echo lang("RELIGION", "soldiers") ?></option>
            <option value="0"><?php echo lang("MUSLIM", "soldiers") ?></option>
            <option value="1"><?php echo lang("CHRISTIAN", "soldiers") ?></option>
          </select>
          <label for="religion"><?php echo lang("RELIGION", "soldiers") ?></label>
        </div>
        <!-- qualification -->
        <div class="form-floating">
          <input type="text" class="form-control" id="qualification" name="qualification" placeholder="<?php echo lang("QUALIFICATION", "soldiers") ?>">
          <label for="qualification"><?php echo lang("QUALIFICATION", "soldiers") ?></label>
        </div>
        <!-- status -->
        <div class="form-floating">
          <select class="form-select" id="status" name="status" required>
            <option value="default" disabled selected><?php echo lang("STATUS", "soldiers") ?></option>
            <option value="0"><?php echo lang("SINGLE", "soldiers") ?></option>
            <option value="1"><?php echo lang("MARRIED", "soldiers") ?></option>
          </select>
          <label for="status"><?php echo lang("STATUS", "soldiers") ?></label>
        </div>
        <!-- number of child -->
        <div class="form-floating">
          <input type="number" class="form-control" id="child" name="child" placeholder="<?php echo lang("#CHILD", "soldiers") ?>">
          <label for="child"><?php echo lang("#CHILD", "soldiers") ?></label>
        </div>
        <!-- father`s job -->
        <div class="form-floating">
          <input type="text" class="form-control" id="father-job" name="father-job" placeholder="<?php echo lang("FATHER JOB", "soldiers") ?>">
          <label for="father-job"><?php echo lang("FATHER JOB", "soldiers") ?></label>
        </div>
        <!-- mother job -->
        <div class="form-floating">
          <input type="text" class="form-control" id="mother-job" name="mother-job" placeholder="<?php echo lang("MOTHER JOB", "soldiers") ?>">
          <label for="mother-job"><?php echo lang("MOTHER JOB", "soldiers") ?></label>
        </div>
        <!-- soldier phone -->
        <div class="form-floating">
          <input type="text" class="form-control" id="soldier-phone-1" name="soldier-phone-1" placeholder="<?php echo lang("SOLDIER PHONE", "soldiers") ?>">
          <label for="soldier-phone-1"><?php echo lang("SOLDIER PHONE", "soldiers") ?></label>
        </div>
        <!-- soldier phone -->
        <div class="form-floating">
          <input type="text" class="form-control" id="soldier-phone-2" name="soldier-phone-2" placeholder="<?php echo lang("SOLDIER PHONE", "soldiers") ?>">
          <label for="soldier-phone-2"><?php echo lang("SOLDIER PHONE", "soldiers") ?></label>
        </div>

      </section>
      <!-- form button -->
      <div class="form-buttons">
        <button class="btn btn-primary ms-auto" type="submit"><?php echo lang('ADD') ?></button>
      </div>
    </form>
  </section>
</div>