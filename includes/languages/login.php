<?php 

/**
 * function of words in arabic
 */
function login($phrase) {
  static $lang = array (
    'USERNAME'  => 'اسم المستخدم',
    'PASSWORD'  => 'كلمة المرور',
    'LOGIN'     => 'تسجيل الدخول',

    'LOGIN SUCCESS' => 'تسجيل دخول ناجح',
    'LOGIN FAILED'  => 'فشلت عملية تسجيل الدخول',
  );
  // return the phrase
  return $lang[$phrase];
}