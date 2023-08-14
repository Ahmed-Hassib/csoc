<?php
// create Unit class object
$unit_obj = isset($unit_obj) ? $unit_obj : new Unit();
// get all units data
$units_data = $unit_obj->get_all_units_info();
?>
<div class="container">
  <header class="header">
    <h3 class="h3"><?php echo lang('UNITS DASHBOARD', 'units') ?></h3>
  </header>
  <!-- strst units table -->
  <table class="table table-bordered table-striped display compact table-style">
    <thead class="primary text-capitalize">
      <tr>
        <th style="width: 20px">#</th>
        <th><?php echo lang('UNIT NAME', 'units') ?></th>
        <th><?php echo lang('UNIT LEADER NAME', 'units') ?></th>
        <th><?php echo lang('#SOLDIERS') ?></th>
        <!-- <th><?php echo lang('#OFFICERS') ?></th> -->
        <th style="width: 100px"><?php echo lang('CONTROL') ?></th>
      </tr>
    </thead>
    <tbody id="units_table">
      <?php if ($units_data !== null && !empty($units_data)) { ?>
        <?php foreach ($units_data as $key => $unit) { ?>
          <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $unit['unit_name'] ?></td>
            <td>
              <?php $leader_rank = $unit_obj->select_specific_column("`name`", "`ranks`", "WHERE `id` = " . $unit['unit_leader_rank'])[0]['name'] ?>
              <span><?php echo $leader_rank ?>/</span>
              <span><?php echo $unit['unit_leader_name'] ?></span>
            </td>
            <td>
              <?php $num_soldiers_basic = $unit_obj->count_records("`id`", "`soldier`", "WHERE `basic_unit` = " . $unit['unit_id']) ?>
              <?php $num_soldiers_current = $unit_obj->count_records("`id`", "`soldier`", "WHERE `current_unit` = " . $unit['unit_id']) ?>
              <span><?php echo lang('BASIC UNIT', 'soldiers') . " " . $num_soldiers_basic . " " . lang('SOLDIER', 'soldiers') ?></span>
              <span>&nbsp;|&nbsp;</span>
              <span><?php echo lang('CURRENT UNIT', 'soldiers') . " " . $num_soldiers_current . " " . lang('SOLDIER', 'soldiers') ?></span>
            </td>
            <!-- <td></td> -->
            <td>
              <a href="?do=edit-unit&unit_id=<?php echo base64_encode($unit['unit_id']) ?>" class="btn btn-outline-success fs-12 py-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <button onclick="confirm_delete('?do=delete-unit&unit_id=<?php echo base64_encode($unit['unit_id']) ?>&is_back=true')" class="btn btn-danger fs-12 py-1">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>