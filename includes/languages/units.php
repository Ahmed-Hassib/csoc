<?php

/**
 * function of words in arabic
 */
function units($phrase)
{
  static $lang = array(
    'UNITS' => 'الوحدات'
  );
  // return the phrase
  return $lang[$phrase];
}
