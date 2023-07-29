<div class="loginPageContainer">
  <div class="contentBox">
    <div class="formBox">
      <!-- login form avatar -->
      <div class="formBoxAvatar">
        <i class="bi bi-person-circle"></i>
      </div>
      <!-- login form -->
      <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="mb-4">
          <label class="mb-2" for="username"><?php echo lang('USERNAME', 'login') ?></label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-4 position-relative login">
          <label class="mb-2" for="password"><?php echo lang('PASSWORD', 'login') ?></label>
          <input type="password" class="form-control" id="password" name="pass">
          <i class="bi bi-eye-slash show-pass text-dark" id="show-pass" onclick="showPass(this)"></i>
        </div>
        <div class="mb-4 position-relative">
          <button type="submit" class="btn w-100" ><?php echo lang('LOGIN', 'login') ?></button>
        </div>
      </form>
    </div>
  </div>
</div>
