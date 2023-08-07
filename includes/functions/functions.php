<?php

/**
 * get_page_tilte function v2.0.5
 * This function not accept parameters
 * Contain global variable can be access from anywhere
 * get title page from the page and display it
 */
function get_page_tilte($file) {
  global $page_title; // page title
  // check if set or not
  if (isset($page_title)) {
    echo lang(strtoupper($page_title), $file);
  } else {
    echo lang('NOT ASSIGNED', 'global_');
  }
}

/**
 * redirect_home function v2
 * This function accepts parameters
 * $msg => echo the error message
 * $seconds => seconds before redirect
 */
function redirect_home($msg = null, $url = null, $seconds = 3)
{
  // check the url
  if ($url == null) {
    $target_url = '../dashboard/index.php';
  } else {
    if ($url == 'back') {
      $target_url = isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../dashboard/index.php';
    } else {
      $target_url = $url;
    }
  }
  // redirect page
  header("refresh:$seconds;url=$target_url");
  // check if empty message
  if (!empty($msg) && $msg != null) {
    echo $msg;
  }
  // show redirect messgae
  echo "<div>" . lang('REDIRECT AUTO', 'global_') . " $seconds " . lang('SECOND', 'global_') . "</div>";
  // exit
  exit();
}