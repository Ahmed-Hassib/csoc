<?php $unit_obj = isset($unit_obj) ? $unit_obj : new Unit(); ?>
<div class="container">
  <header class="header">
    <h3 class="h3"><?php echo lang('UNITS DASHBOARD', 'units') ?></h3>
  </header>
  <section class="units-content">
    <?php $units_data = $unit_obj->get_all_units_info(); ?>
    <?php if ($units_data !== null && count($units_data) > 0) { ?>
      <section class="units-statistics">
        <?php foreach ($units_data as $key => $unit) { ?>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $unit['unit_name'] ?></h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">
                <?php $leader_rank = $unit_obj->select_specific_column("`name`", "`ranks`", "WHERE `id` = " . $unit['unit_leader_rank'])[0]['name'] ?>
                <span><?php echo $leader_rank ?>/</span>
                <span><?php echo $unit['unit_leader_name'] ?></span>
              </h6>
              <p class="card-text"></p>
              <div class="card-buttons">
                <a href="?do=edit-unit&unit_id=<?php echo $unit['unit_id'] ?>" class="btn btn-primary">
                  <?php echo lang('UPDATE') ?>
                  <i class="bi bi-pencil-square"></i>
                </a>
                <!-- <a href="?do=delete-unit&unit_id=<?php echo $unit['unit_id'] ?>" class="btn btn-danger">
                  <?php echo lang('DELETE') ?>
                  <i class="bi bi-trash"></i>
                </a> -->
              </div>
            </div>
          </div>
        <?php } ?>
      </section>
    <?php } ?>
  </section>
</div>