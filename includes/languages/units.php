<?php

/**
 * function of words in arabic
 */
function units($phrase)
{
  static $lang = array(
    // units words
    'UNITS'               => 'الوحدات',
    'UNITS DASHBOARD'     => 'الصفحة الرئيسية للوحدات',
    'UNIT NAME'           => 'اسم الوحدة',
    'UNIT PHONE'          => 'رقم تليفون الوحدة',
    'UNIT TYPE'           => 'نوع الوحدة',
    'UNIT LEADER RANK'    => 'رتبة قائد الوحدة',
    'UNIT LEADER NAME'    => 'اسم قائد الوحدة',
    'UNIT LEADER PHONE'   => 'رقم تليفون قائد الوحدة',
    'UNIT ADDRESS'        => 'عنوان الوحدة',
    'EDIT UNIT'           => 'تعديل بيانات وحدة',

    // units messages
    'UNIT NAME IS REQUIRED'     => 'اسم الوحدة مطلوب',
    'UNIT TYPE IS REQUIRED'     => 'نوع الوحدة مطلوب',
    'LEADER RANK IS REQUIRED'   => 'رتبة قائد الوحدة مطلوبة',
    'LEADER NAME IS REQUIRED'   => 'اسم قائد الوحدة مطلوب',

    'INSERTED'        => 'تم اضافة بيانات الوحدة بنجاح',
    'UPDATED'         => 'تم تعديل بيانات الوحدة بنجاح',
    'DELETED'         => 'تم حذف بيانات الوحدة بنجاح',

  );
  // return the phrase
  return $lang[$phrase];
}
