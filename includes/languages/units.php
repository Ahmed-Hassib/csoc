<?php

/**
 * function of words in arabic
 */
function units($phrase)
{
  static $lang = array(
    // units words
    'UNIT'                => 'وحدة',
    'UNITS'               => 'الوحدات',
    'UNITS DASHBOARD'     => 'الصفحة الرئيسية للوحدات',
    'UNIT NAME'           => 'اسم الوحدة',
    'UNIT PHONE'          => 'رقم تليفون الوحدة',
    'UNIT TYPE'           => 'نوع الوحدة',
    'UNIT LEADER RANK'    => 'رتبة قائد الوحدة',
    'UNIT LEADER NAME'    => 'اسم قائد الوحدة',
    'UNIT LEADER PHONE'   => 'رقم تليفون قائد الوحدة',
    'UNIT ADDRESS'        => 'موقع الوحدة',
    'EDIT UNIT'           => 'تعديل بيانات وحدة',
    'UNIT TYPE INFO'      => 'بيانات نوع الوحدة',
    

    // units messages
    'UNIT NAME IS REQUIRED'     => 'اسم الوحدة مطلوب',
    'UNIT TYPE IS REQUIRED'     => 'نوع الوحدة مطلوب',
    'LEADER RANK IS REQUIRED'   => 'رتبة قائد الوحدة مطلوبة',
    'LEADER NAME IS REQUIRED'   => 'اسم قائد الوحدة مطلوب',

    // units operations
    'INSERTED'        => 'تم اضافة بيانات الوحدة بنجاح',
    'UPDATED'         => 'تم تعديل بيانات الوحدة بنجاح',
    'DELETED'         => 'تم حذف بيانات الوحدة بنجاح',
    
    // units types operations
    'TYPE INSERTED'        => 'تم اضافة بيانات نوع الوحدة بنجاح',
    'TYPE INSERTED ALL'    => 'تم اضافة جميع بيانات انواع الوحدات بنجاح',
    'TYPE UPDATED'         => 'تم تعديل بيانات نوع الوحدة بنجاح',
    'TYPE DELETED'         => 'تم حذف بيانات نوع الوحدة بنجاح',

  );
  // return the phrase
  return $lang[$phrase];
}
