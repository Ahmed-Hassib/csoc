<?php 

/**
 * function of words in arabic
 */
function login($phrase) {
  static $lang = array (
    'USERNAME'  => 'اسم المستخدم',
    'PASSWORD'  => 'كلمة المرور',
    'LOGIN'     => 'تسجيل الدخول'
  );
  // return the phrase
  return $lang[$phrase];
}