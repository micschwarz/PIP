<?php
/*
 * PIP v0.5.3
 */

require_once 'Autoloader.php';

//Start the Session
session_start();

// Defines
define('ROOT_DIR', realpath(__DIR__) . '/');
define('APP_DIR', ROOT_DIR . '../src/Application/');

// Includes
require APP_DIR . '/config/config.php';


// Define base URL
global $config;
define('BASE_URL', $config['base_url']);

new \System\App();
