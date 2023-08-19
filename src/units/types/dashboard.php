<div class="container">
  <header class="header">
    <h3 class="h3 text-capitalize"><?php echo lang('UNITS TYPES') ?></h3>
  </header>
  <section class="units-content">
    <form class="add-new-type" action="?do=unit-types&action=insert-type" method="POST" onchange="form_validation(this)" id="add-new-type">
      <section class="form-content" id="units-form-content">
        <div class="section-content">
          <!-- unit-type name -->
          <div class="form-floating">
            <input type="text" class="form-control" id="type-name" name="type-name[]" placeholder="<?php echo lang("UNIT TYPE", "units") ?>" required>
            <label for="type-name"><?php echo lang("UNIT TYPE", "units") ?></label>
          </div>

          <div class="units-buttons">
            <button type="button" class="btn btn-success fs-12 py-1" onclick="add_new_type('units-form-content')">
              <i class="bi bi-plus-lg"></i>
            </button>
          </div>
        </div>
      </section>
      <!-- form button -->
      <div class="form-buttons">
        <button class="btn btn-primary ms-auto" type="submit"><?php echo lang('ADD') ?></button>
      </div>
    </form>
  </section>

  <?php
  // check if Unit class object is created
  $unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
  // get all units types
  $unit_types = $unit_obj->get_all_types_info();
  // check if any data exists
  if ($unit_types !== null && count($unit_types) > 0) {
  ?>
    <section class="units-statistics">
      <?php foreach ($unit_types as $key => $type) { ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $type['type_name'] ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary nums">
              <?php $num_units = $unit_obj->count_records("`unit_id`", "`units`", "WHERE `unit_type` = " . $type['id']) ?>
              <span class="num" data-goal="<?php echo $num_units ?>">0</span>
              <span>&nbsp;<?php echo lang('UNIT', 'units') ?></span>
            </h6>
            <a href="?do=unit-types&action=edit-type&type_id=<?php echo base64_encode($type['id']) ?>" class="card-link btn btn-success fs-12 py-1">
              <i class="bi bi-pencil-square"></i>
              <?php echo lang('UPDATE') ?>
            </a>
            <button type="button" onclick="confirm_delete('?do=unit-types&action=delete-type&type_id=<?php echo base64_encode($type['id']) ?>&is_back=true')" class="card-link btn btn-danger fs-12 py-1">
              <?php echo lang('DELETE') ?>
              <i class="bi bi-trash"></i>
            </button>
          </div>
        </div>
      <?php } ?>
    </section>
  <?php } ?>
</div>