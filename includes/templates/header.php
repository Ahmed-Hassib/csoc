<?php header('Accept-Encoding: deflate, gzip, compress, *');  // set accept encoding.
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- page title -->
  <title><?php get_page_tilte($lang_file); ?></title>
  <!-- css files -->
  <?php include_once 'css-includes.php' ?>
</head>

<body dir="rtl">
  <?php
  // set the default timezone to use.
  date_default_timezone_set('Africa/Cairo');
  // check if page have a preloader variable or not
  if (isset($preloader) && $preloader == true) {
    include_once 'preloader.php';
  }
  ?>


  <?php if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_message_icon']) && isset($_SESSION['flash_message_class']) && isset($_SESSION['flash_message_status'])) { ?>
    <div class="alert-flash-container">
      <?php if (is_array($_SESSION['flash_message'])) { ?>
        <?php foreach ($_SESSION['flash_message'] as $key => $message) { ?>
          <div class="alert alert-<?php echo $_SESSION['flash_message_class'][$key]; ?> alert-flash-status" dir="rtl">
            <i class="bi <?php echo $_SESSION['flash_message_icon'][$key] ?>"></i>
            <?php echo lang($message, $_SESSION['flash_message_lang_file'][$key]) ?>
            <button type="button" class="btn-close btn-close-left" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="alert alert-<?php echo $_SESSION['flash_message_class']; ?> alert-flash-status" dir="rtl">
          <i class="bi <?php echo $_SESSION['flash_message_icon'] ?>"></i>
          <?php echo lang($_SESSION['flash_message'], $_SESSION['flash_message_lang_file']) ?>
          <button type="button" class="btn-close btn-close-left" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
    </div>

    <script>
      let flash_alert = document.querySelectorAll('.alert-flash-status');
      let is_menu_opened = Boolean(localStorage.getItem('sidebarMenuClosed'))

      // set time to remove alert
      setTimeout(() => {
        flash_alert.forEach(alert => {
          alert.remove();
        });
      }, 10000);
    </script>

    <?php unset($_SESSION['flash_message']); ?>
    <?php unset($_SESSION['flash_message_icon']); ?>
    <?php unset($_SESSION['flash_message_class']); ?>
    <?php unset($_SESSION['flash_message_status']); ?>
    <?php unset($_SESSION['flash_message_lang_file']); ?>
  <?php } ?>