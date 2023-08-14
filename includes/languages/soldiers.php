<?php

/**
 * function of words in arabic
 */
function soldiers($phrase)
{
  static $lang = array(
    'SOLDIER'   => 'جندى',
    'SOLDIERS'  => 'الجنود',
    'SOLDIERS DASHBOARD' => 'الصفحة الرئيسية للجنود',

    'BASIC INFO'        => 'المعلومات الاساسية',
    'MILITIRY INFO'     => 'المعلومات العسكرية',
    'DEGREE'            => 'درجة',
    'DEGREES'           => 'الدرجات',
    'MILITIRY NUMBER'   => 'الرقم العسكرى',
    'NATIONAL ID'       => 'الرقم القومى',
    'SOLDIER NAME'      => 'اسم الجندى',
    'SOLDIER PHONE'     => 'رقم تليفون الجندى',
    'SOLDIER ADDRESS'   => 'عنوان الجندى',
    'JOINED DATE'       => 'تاريخ الضم',
    'DISCHARGE DATE'    => 'تاريخ التسريح',
    'SPECIALIZATION'    => 'التخصص',
    'RELIGION'          => 'الديانة',
    'MUSLIM'            => 'مسلم',
    'CHRISTIAN'         => 'مسيحي',
    'QUALIFICATION'     => 'المؤهل',
    'STATUS'            => 'الحالة الاجتماعية',
    'SINGLE'            => 'اعزب',
    'MARRIED'           => 'متزوج',
    '#CHILD'            => 'عدد الاولاد',
    'BASIC UNIT'        => 'الوحدة الاساسية',
    'CURRENT UNIT'      => 'الوحدة الحالية',
    'FATHER JOB'        => 'وظيفة الاب',
    'MOTHER JOB'        => 'وظيفة الام',
    'EDIT SOLDIER'      => 'تعديل بيانات جندى',

    // soldiers page messages
    'INSERTED'    => 'تم اضافة بينات الجندى بنجاح',
    'UPDATED'     => 'تم تعديل بيانات الجندى بنجاح',
    'DELETED'     => 'تم حذف بيانات الجندى بنجاح',

    // error message
    'MILITIRY CANNOT BE EMPTY'          => 'الرقم العسكرى لا يمكن ان يكون فارغاً',
    'RANK MUST BE CHOOSEN'              => 'يجب اختيار الدرجة',
    'NAME IS REQUIRED'                  => 'اسم الجندى مطلوب',
    'BASIC UNIT MUST BE CHOOSEN'        => 'يجب احتيار الوحدة الاساسية للجندى',
    'CURRENT UNIT MUST BE CHOOSEN'      => 'يجب اختيار الوحدة الحالية للجندى',
    'SPECIALIZATION MUST BE CHOOSEN'    => 'يجب اختيار تخصص الجندى',
    'NATIONAL ID CANNOT BE EMPTY'       => 'الرقم القومى لا يمكن ان يكون فارغ',
    'RELIGION MUST BE CHOOSEN'          => 'يجب اختيار الديانة',
    'STATUS MUST BE CHOOSEN'            => 'يجب اختيار الحالة الاجتماعية للجندى',
  );
  // return the phrase
  return $lang[$phrase];
}
