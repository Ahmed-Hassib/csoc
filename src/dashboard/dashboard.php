<?php $db_obj = isset($db_obj) ? $db_obj : new Database(); ?>
<div class="container">
  <header class="header">
    <h3 class="h3"><?php echo lang('DASHBOARD') ?></h3>
  </header>

  <div class="dashboard-content">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo lang('#UNITS') ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary nums">
          <?php $num_units = $db_obj->count_records("`unit_id`", "`units`", "") ?>
          <span class="num" data-goal="<?php echo $num_units ?>">0</span>
          <span>&nbsp;<?php echo lang('UNIT', 'units') ?></span>
        </h6>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo lang('#SPECS') ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary nums">
          <?php $num_spec = $db_obj->count_records("`spec_id`", "`specialization`", "") ?>
          <span class="num" data-goal="<?php echo $num_spec ?>">0</span>
          <span>&nbsp;<?php echo lang('SPECIALIZATION', 'specializations') ?></span>
        </h6>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo lang('#SOLDIERS') ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary nums">
          <?php $num_soldier = $db_obj->count_records("`id`", "`soldier`", "") ?>
          <span class="num" data-goal="<?php echo $num_soldier ?>">0</span>
          <span>&nbsp;<?php echo lang('SOLDIER', 'soldiers') ?></span>
        </h6>
      </div>
    </div>
    <!-- <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo lang('#OFFICERS') ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">
          <?php $num_officer = $db_obj->count_records("`off_id`", "`officers`", "") ?>
          <span><?php echo $num_officer ?>:</span>
          <span><?php echo lang('SOLDIER', 'soldiers') ?></span>
        </h6>
      </div>
    </div> -->
  </div>
</div>