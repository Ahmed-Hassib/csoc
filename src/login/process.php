<?php
// check username in SESSION variable
if (isset($_SESSION['user_id'])) {
  // redirect to user page
  redirect_home(null, $src . 'dashboard/index.php', 0);
}
// check if user comming from http request ..
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
  // get request info
  $username     = $_POST["username"];
  $password     = $_POST["password"];
  $hashed_pass  = sha1($password);

  // query select
  $query = "SELECT * FROM `users` WHERE `users`.`username` = ? AND `users`.`password` = ? LIMIT 1";

  // check if user exist in database
  $stmt = $con->prepare($query);
  $stmt->execute(array($username, $hashed_pass));
  $user_info = $stmt->fetch();
  $count = $stmt->rowCount();

  // if count > 0 this mean that user exist
  if ($count > 0) {
    if (!isset($session_obj)) {
      // create an object of Session class to set session
      $session_obj = new Session();
    }
    // set session
    $session_obj->set_user_session($user_info);

    // prepare flash session variables
    $_SESSION['flash_message'] = 'LOGIN SUCCESS';
    $_SESSION['flash_message_icon'] = 'bi-check-circle-fill';
    $_SESSION['flash_message_class'] = 'success';
    $_SESSION['flash_message_status'] = true;
    $_SESSION['flash_message_lang_file'] = 'login';
    // redirected file name
    $redirected_file_name = $src . 'dashboard/index.php';
  } else {
    // prepare flash session variables
    $_SESSION['flash_message'] = 'LOGIN FAILED';
    $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
    $_SESSION['flash_message_class'] = 'danger';
    $_SESSION['flash_message_status'] = false;
    $_SESSION['flash_message_lang_file'] = 'login';
    // redirected file name
    $redirected_file_name = 'back';
  }
} else {
  // prepare flash session variables
  $_SESSION['flash_message'] = 'ACCESS FAILED';
  $_SESSION['flash_message_icon'] = 'bi-exclamation-triangle-fill';
  $_SESSION['flash_message_class'] = 'danger';
  $_SESSION['flash_message_status'] = false;
  $_SESSION['flash_message_lang_file'] = 'global_';
  // redirected file name
  $redirected_file_name = 'back';
}
// redirect to dashboard
redirect_home(null, $redirected_file_name, 0);