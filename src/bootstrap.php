<?php

$autoloader = realpath(__DIR__ . '/../vendor/autoload.php');
$settings   = realpath(__DIR__ . '/../config/settings.php');

if (!file_exists($autoloader)) {
    throw new \Exception(
        "composer autoload not found, run composer install first"
    );
}
if (!file_exists($settings)) {
    throw new \Exception(
        "Please check config/settings.php.dist for running"
    );
}

require_once $autoloader;
require_once $settings;