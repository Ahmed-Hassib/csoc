<?php

/**
 * function of words in arabic
 */
function dashboard($phrase)
{
  static $lang = array(
    'DASHBOARD'  => 'لوحة التحكم',
  );
  // return the phrase
  return $lang[$phrase];
}