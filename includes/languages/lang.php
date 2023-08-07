<?php
// all language files
$lang_files = [
    'global',
    'login', 'dashboard'
];

// loop on language files
foreach ($lang_files as $file) {
    // include file
    include_once "$file.php";
}

// language function
function lang($phrase, $file = 'global_', $lang = "ar")
{
    // return the word
    return $file($phrase);
}