<?php
// check username in SESSION variable
if (isset($_SESSION['user_id'])) {
  // redirect to user page
  redirect_home(null, $src . 'dashboard/index.php', 0);
}
?>

<div class="login_container">
  <div class="content_box">
    <!-- login form avatar -->
    <div class="avatar_container">
      <div class="avatar_box">
        <i class="bi bi-person-circle"></i>
      </div>
    </div>
    <!-- login form -->
    <form class="login_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <!-- username -->
      <div class="mb-3 form-floating">
        <input type="text" class="form-control" id="username" name="username" placeholder="linke admin..."
          autocomplete="off" required />
        <label for="username"><?php echo lang('USERNAME', 'login') ?></label>
      </div>
      <!-- password -->
      <div class="mb-3 form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="make srong..."
          autocomplete="off" required>
        <i class="bi bi-eye-slash show-pass text-dark" id="show-pass" onclick="show_pass(this)"></i>
        <label class="mb-2" for="password"><?php echo lang('PASSWORD', 'login') ?></label>
      </div>
      <!-- submit button -->
      <div class="mb-4 position-relative">
        <button type="submit" class="btn w-100"><?php echo lang('LOGIN', 'login') ?></button>
      </div>
    </form>
  </div>
</div>