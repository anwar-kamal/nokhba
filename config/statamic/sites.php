<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang =  $_SESSION['locale'] ?? "ar";
$actual_link = '';
if (isset($_SERVER) &&  isset($_SERVER['HTTP_HOST']) &&  isset($_SERVER['PHP_SELF']))
    $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (str_contains($actual_link, '/en')) {

    $lang =  'en';
    $_SESSION['locale'] = 'en';
} else {
    $lang =  'ar';
    $_SESSION['locale'] = 'ar';
}

return [

    /*
    |--------------------------------------------------------------------------
    | Sites
    |--------------------------------------------------------------------------
    |
    | Each site should have root URL that is either relative or absolute. Sites
    | are typically used for localization (eg. English/French) but may also
    | be used for related content (eg. different franchise locations).
    |
    */

    'sites' => [
        'default' => [
            'name' => config('app.name'),
            'locale' => $lang,
            'url' => '/' . ($lang == 'en' ? 'en' : "") . '/',
        ],
    ],
];
