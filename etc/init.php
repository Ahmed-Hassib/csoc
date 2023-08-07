<?php

/**
 * check if navbar flag was set or not
 * will include navbar in the following cases:
 * [1] if navbar flag was not set
 * [2] if navabr flag was set with true value
 */
if (!isset($no_navbar) || (isset($no_navbar) && $no_navbar == false)) {
  include_once $tpl . "navbar.php";
}