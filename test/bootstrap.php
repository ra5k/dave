<?php
/*
 * This file is part of the Ra5k Dave library
 * (c) 2020 GitHub/ra5k
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// Define some paths
define('TEST_PATH', realpath(__DIR__));
define('APPLICATION_PATH', realpath(__DIR__ . "/.."));

// Register the autoloader
require APPLICATION_PATH . "/vendor/autoload.php";

// Create temp directory
if (!file_exists(__DIR__ . '/temp')) {
    mkdir(__DIR__ . '/temp');
}
