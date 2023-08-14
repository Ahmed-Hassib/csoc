<div class="container">
  <header class="header">
    <h3 class="h3 text-capitalize"><?php echo lang('ADD SPECIALIZATION') ?></h3>
  </header>
  <section class="spec-content">
    <form class="add-new" action="?do=insert-specialization" method="POST" onchange="form_validation(this)" id="add-new-specialization">
      <section class="form-content" id="spec-form-content">
        <header>
          <h4 class="h4"><?php echo lang('SPEC INFO', 'specializations') ?></h4>
        </header>
        <section class="section-content">
          <!-- specialization name -->
          <div class="form-floating">
            <input type="text" class="form-control" id="specialization-name" name="specialization-name[]" placeholder="<?php echo lang("SPEC NAME", "specializations") ?>" required>
            <label for="specialization-name"><?php echo lang("SPEC NAME", "specializations") ?></label>
          </div>
          <!-- specialization name -->
          <div class="form-floating">
            <textarea type="text" class="form-control" id="note" name="note[]" placeholder="<?php echo lang("NOTE") ?>"></textarea>
            <label for="note"><?php echo lang("NOTE") ?></label>
          </div>

          <div class="spec-buttons">
            <button type="button" class="btn btn-success" onclick="add_new_spec(this, 'spec-form-content')">
              <i class="bi bi-plus"></i>
            </button>
          </div>
        </section>
      </section>
      <!-- form button -->
      <div class="form-buttons">
        <button class="btn btn-primary ms-auto" type="submit"><?php echo lang('ADD') ?></button>
      </div>
    </form>
  </section>
</div>