<?php

/**
 * function of words in arabic
 */
function units($phrase)
{
  static $lang = array();
  // return the phrase
  return $lang[$phrase];
}
