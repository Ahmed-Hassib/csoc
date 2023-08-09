<?php $db_obj = isset($db_obj) ? $db_obj : new Database(); ?>
<div class="container">
  <header class="header">
    <h3 class="h3 text-capitalize"><?php echo lang('ADD UNIT') ?></h3>
  </header>
  <section class="units-content">
    <form class="add-new" action="?do=insert-unit" method="POST">
      <section class="form-content">
        <!-- unit name -->
        <div class="form-floating">
          <input type="text" class="form-control" id="unit-name" name="unit-name" placeholder="<?php echo lang("UNIT NAME", "units") ?>" required>
          <label for="unit-name"><?php echo lang("UNIT NAME", "units") ?></label>
        </div>
        <!-- unit type -->
        <div class="form-floating">
          <?php $unit_types = $db_obj->select_specific_column("*", "`unit_types`", ""); ?>
          <select type="text" class="form-select" id="unit-type" name="unit-type" required>
            <option value="default" disabled selected><?php echo lang("UNIT TYPE", "units") ?></option>
            <?php foreach ($unit_types as $key => $type) { ?>
              <option value="<?php echo $type['id'] ?>"><?php echo $type['type_name'] ?></option>
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
          <?php $ranks = $db_obj->select_specific_column("*", "`ranks`", "WHERE `type` = 1"); ?>
          <select type="text" class="form-select" id="unit-leader-rank" name="unit-leader-rank" required>
            <option value="default" disabled selected><?php echo lang("UNIT LEADER RANK", "units") ?></option>
            <?php foreach ($ranks as $key => $rank) { ?>
              <option value="<?php echo $rank['id'] ?>"><?php echo $rank['name'] ?></option>
            <?php } ?>
          </select>
          <label for="unit-leader-rank"><?php echo lang("UNIT LEADER RANK", "units") ?></label>
        </div>
        <!-- unit leader name -->
        <div class="form-floating">
          <input type="text" class="form-control" id="unit-leader-name" name="unit-leader-name" placeholder="<?php echo lang("UNIT LEADER NAME", "units") ?>" required>
          <label for="unit-leader-name"><?php echo lang("UNIT LEADER NAME", "units") ?></label>
        </div>
        <!-- unit leader phone -->
        <div class="form-floating">
          <input type="text" class="form-control" id="unit-leader-phone" name="unit-leader-phone" placeholder="<?php echo lang("UNIT LEADER PHONE", "units") ?>">
          <label for="unit-leader-phone"><?php echo lang("UNIT LEADER PHONE", "units") ?></label>
        </div>
        <!-- unit address -->
        <div class="form-floating">
          <input type="text" class="form-control" id="unit-address" name="unit-address" placeholder="<?php echo lang("UNIT ADDRESS", "units") ?>">
          <label for="unit-address"><?php echo lang("UNIT ADDRESS", "units") ?></label>
        </div>

        <div class="form-buttons">
          <button class="btn btn-primary ms-auto" type="submit"><?php echo lang('ADD') ?></button>
        </div>
      </section>
    </form>
  </section>
</div>