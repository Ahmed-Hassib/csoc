<?php

/**
 * function of words in arabic
 */
function specializations($phrase)
{
  static $lang = array(
    'SPECIALIZATION'      => 'تخصص',
    'SPECIALIZATIONS'     => 'التخصصات',

    'SPEC DASHBOARD'  => 'الصفحة الرئيسية للتخصصات',
    'SPEC INFO'       => 'بيانات التخصص',
    'SPEC NAME'       => 'اسم التخصص',

    // specializations message
    'INSERTED'      => 'تم اضافة التخصص بنجاح',
    'INSERTED ALL'  => 'تم اضافة جميع التخصصات بنجاح',
    'UPDATED'       => 'تم تعديل التخصص بنجاح',
    'DELETED'       => 'تم حذف التخصص بنجاح',

    'SPEC NAME CANNOT BE EMPTY' => 'اسم التخصص لا يمكن ان يكون فارغاً',
  );
  // return the phrase
  return $lang[$phrase];
}
