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
    'SECOND'          => 'ثانية',
    'REFRESH SESSION' => 'تحديث الجلسة',
    'DASHBOARD'       => 'الصفحة الرئيسية',
    'UNITS'           => 'الوحدات',
    'ADD UNIT'        => 'اضافة وحدة جديدة',
    'SOLDIERS'        => 'الجنود',
    'ADD SOLDIER'     => 'اضافة جندى جديد',

    // global messages
    'REDIRECT AUTO'     => 'سيتم اعادة تحويلك تلقائيا بعد',
    'ACCESS FAILED'     => 'لايمكن الدخول لهذة الصفحة',
    'NO DATA'           => 'لا توجد بيانات للعرض',
    'QUERY PROBLEM'     => 'حدثت مشكلة اثناء حفظ البيانات',

  );
  // return the phrase
  return $lang[$phrase];
}