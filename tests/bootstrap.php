<?php

error_reporting(E_ALL | E_STRICT);

// include the composer autoloader
$autoloader = require __DIR__ . '/../vendor/autoload.php';

// autoload abstract TestCase classes in test directory
$autoloader->add('Omnipay', __DIR__);

$configFile = realpath(__DIR__ . '/../config.php');

if (file_exists($configFile)) {
    include_once $configFile;
} else {
    define('ALIPAY_PARTNER', '2088011436420182');
    define('ALIPAY_KEY', '18x8lAi0a1520st1hvxcnt7m4w1whkbs');
    define('ALIPAY_SELLER_ID', '2088011436420182');
}

if (! function_exists('dd')) {
    function dd()
    {
        foreach (func_get_args() as $arg) {
            var_dump($arg);
        }
        exit(0);
    }
}
