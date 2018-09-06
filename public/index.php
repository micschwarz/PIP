<?php
/*
 * PIP v0.5.3
 */

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(__DIR__) . '/');
define('APP_DIR', ROOT_DIR . '../src/application/');

// Includes
require APP_DIR . '/config/config.php';
require ROOT_DIR . '../src/system/Model.php';
require ROOT_DIR . '../src/system/View.php';
require ROOT_DIR . '../src/system/Controller.php';
require ROOT_DIR . '../src/system/pip.php';

// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

pip();
