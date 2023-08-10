<?php
// create SOldier class object
$soldier_obj = isset($soldier_obj) ? $soldier_obj : new Soldier();
// get all soldiers data
$soldier_data = $soldier_obj->get_all_soldiers_info();
?>
<div class="container pb-3">
  <header class="header">
    <h3 class="h3"><?php echo lang('SOLDIERS DASHBOARD', 'soldiers') ?></h3>
  </header>
  <!-- strst users table -->
  <table class="table table-bordered display compact table-style" style="width:100%">
    <thead class="primary text-capitalize">
      <tr>
        <th style="max-width: 20px">#</th>
        <th><?php echo lang('MILITIRY NUMBER', 'soldiers') ?></th>
        <th><?php echo lang('NATIONAL ID', 'soldiers') ?></th>
        <th><?php echo lang('SOLDIER NAME', 'soldiers') ?></th>
        <th><?php echo lang('BASIC UNIT', 'soldiers') ?></th>
        <th><?php echo lang('CURRENT UNIT', 'soldiers') ?></th>
        <th style="width: 100px"><?php echo lang('CONTROL') ?></th>
      </tr>
    </thead>
    <tbody id="soldiers_table">
      <?php if ($soldier_data !== null && !empty($soldier_data)) { ?>
        <?php foreach ($soldier_data as $key => $soldier) { ?>
          <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $soldier['militiry_number'] ?></td>
            <td><?php echo $soldier['national_id'] ?></td>
            <td><?php echo $soldier['name'] ?></td>
            <td>
              <?php
              $basic_unit_data = $soldier_obj->select_specific_column("`unit_name`, `unit_leader_rank`, `unit_leader_name`", "`units`", "WHERE `unit_id` = " . $soldier['basic_unit'])[0];
              $basic_leader_rank = $soldier_obj->select_specific_column("`name`", "`ranks`", "WHERE `id` = " . $basic_unit_data['unit_leader_rank'])[0]['name'];
              $basic_leader_name = "$basic_leader_rank/ " . $basic_unit_data['unit_leader_name'];
              ?>
              <!-- basic unit data -->
              <span title="<?php echo $basic_leader_name ?>">
                <?php echo $basic_unit_data['unit_name'] ?>
              </span>
            </td>
            <td>
              <?php
              $current_unit_data = $soldier_obj->select_specific_column("`unit_name`, `unit_leader_rank`, `unit_leader_name`", "`units`", "WHERE `unit_id` = " . $soldier['current_unit'])[0];
              $current_leader_rank = $soldier_obj->select_specific_column("`name`", "`ranks`", "WHERE `id` = " . $current_unit_data['unit_leader_rank'])[0]['name'];
              $current_leader_name = "$current_leader_rank/ " . $current_unit_data['unit_leader_name'];
              ?>
              <!-- current unit data -->
              <span title="<?php echo $current_leader_name ?>">
                <?php echo $current_unit_data['unit_name'] ?>
              </span>
            </td>
            <td>
              <a href="?do=edit-soldier&soldier_id=<?php echo $soldier['id'] ?>" class="btn btn-outline-success fs-12 py-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <a href="?do=delete-soldier&soldier_id=<?php echo $soldier['id'] ?>" class="btn btn-danger fs-12 py-1">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>