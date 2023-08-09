<?php

/**
 * function of words in arabic
 */
function global_($phrase)
{
  static $lang = array(
    // buttons words
    'ADD'     => 'اضافة',
    'SAVE'    => 'حفظ',
    'UPDATE'  => 'تعديل',
    'DELETE'  => 'حذف',
    
    // units words
    'RANK'          => 'رتبة',
    'RANKS'         => 'رتب',
    'DEGREE'        => 'درجة',
    'DEGREES'       => 'درجات',
    'DEGREE/RANK'   => 'درجة/رتبة',

    // navbar words
    'SECOND' => 'ثانية',
    'REFRESH SESSION' => 'تحديث الجلسة',
    'DASHBOARD' => 'لوحة التحكم',
    'UNITS'     => 'الوحدات',
    'ADD UNIT'  => 'اضافة وحدة جديدة',

    'REDIRECT AUTO' => 'سيتم اعادة تحويلك تلقائيا بعد',
    'ACCESS FAILED' => 'لايمكن الدخول لهذة الصفحة'
  );
  // return the phrase
  return $lang[$phrase];
}