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
    echo lang('NOT ASSIGNED');
  }
}