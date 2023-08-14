<?php
// create SOldier class object
$spec_obj = isset($spec_obj) ? $spec_obj : new Specialization();
// get all specs data
$spec_data = $spec_obj->get_all_specializations_info();
?>
<div class="container pb-3">
  <header class="header">
    <h3 class="h3"><?php echo lang('SPEC DASHBOARD', 'specializations') ?></h3>
  </header>
  <!-- strst specializations table -->
  <table class="table table-bordered table-striped display compact table-style" style="width:100%">
    <thead class="primary text-capitalize">
      <tr>
        <th style="max-width: 20px">#</th>
        <th><?php echo lang('SPEC NAME', 'specializations') ?></th>
        <th><?php echo lang('#SOLDIERS') ?></th>
        <!-- <th><?php echo lang('#OFFICERS') ?></th> -->
        <th><?php echo lang('NOTE') ?></th>
        <th style="width: 100px"><?php echo lang('CONTROL') ?></th>
      </tr>
    </thead>
    <tbody id="specializations_table">
      <?php if ($spec_data !== null && !empty($spec_data)) { ?>
        <?php foreach ($spec_data as $key => $spec) { ?>
          <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $spec['spec_name'] ?></td>
            <td>
              <?php $num_soldiers = $spec_obj->count_records("`id`", "`soldier`", "WHERE `specialization` = " . $spec['spec_id']) ?>
              <span><?php echo $num_soldiers . " " . lang('SOLDIER', 'soldiers') ?></span>
            </td>
            <!-- <td>
              <?php $num_officers = $spec_obj->count_records("`off_id`", "`officers`", "WHERE `specialization` = " . $spec['spec_id']) ?>
              <span><?php echo $num_officers . " " . lang('SOLDIER', 'soldiers') ?></span>
            </td> -->
            <td><?php echo $spec['note'] ?></td>
            <td>
              <a href="?do=edit-specialization&spec_id=<?php echo base64_encode($spec['spec_id']) ?>" class="btn btn-outline-success fs-12 py-1">
                <i class="bi bi-pencil-square"></i>
              </a>
              <button onclick="confirm_delete('?do=delete-specialization&spec_id=<?php echo base64_encode($spec['spec_id']) ?>&is_back=true')" class="btn btn-danger fs-12 py-1">
                <i class="bi bi-trash"></i>
              </button>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>