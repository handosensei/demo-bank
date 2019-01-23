<?php

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/vendor/autoload.php';
require __DIR__ . '/app/config/container.php';

return $loader;
