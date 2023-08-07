<?php

/**
 * function of words in arabic
 */
function global_($phrase)
{
  static $lang = array(
    'SECOND' => 'ثانية',
    'REFRESH SESSION' => 'تحديث الجلسة',

    'DASHBOARD' => 'لوحة التحكم',
    'UNITS' => 'الوحدات',

    'REDIRECT AUTO' => 'سيتم اعادة تحويلك تلقائيا بعد',
    'ACCESS FAILED' => 'لايمكن الدخول لهذة الصفحة'
  );
  // return the phrase
  return $lang[$phrase];
}