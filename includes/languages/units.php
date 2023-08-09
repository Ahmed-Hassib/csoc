<?php

/**
 * function of words in arabic
 */
function units($phrase)
{
  static $lang = array(
    'UNITS'               => 'الوحدات',
    'UNITS DASHBOARD'     => 'الصفحة الرئيسية للوحدات',
    'UNIT NAME'           => 'اسم الوحدة',
    'UNIT PHONE'          => 'رقم تليفون الوحدة',
    'UNIT TYPE'           => 'نوع الوحدة',
    'UNIT LEADER RANK'    => 'رتبة قائد الوحدة',
    'UNIT LEADER NAME'    => 'اسم قائد الوحدة',
    'UNIT LEADER PHONE'   => 'رقم تليفون قائد الوحدة',
    'UNIT ADDRESS'        => 'عنوان الوحدة',
  );
  // return the phrase
  return $lang[$phrase];
}
