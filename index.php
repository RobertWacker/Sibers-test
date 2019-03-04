<?php

use app\core\Router;

session_start();

// Define constants
define ('ROOT', dirname(__FILE__));
define ('APP', dirname(__FILE__).'/app/');
define ('CONFIG', dirname(__FILE__).'/app/configs/');

// If you want to see PHP errors
include APP.'libs/debug.php';

// Autoload classes
spl_autoload_register(function($class) {

	// get class file address
    $path = str_replace('\\', '/', $class.'.php');

    // If the class file exists
    if (file_exists($path)) {
        require $path;
    }
});

// Start routing 
$router = new Router;
$router -> run();