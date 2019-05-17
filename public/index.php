<?php 

// Define the framework paths.
define('APP_PATH', realpath('../application').'/');
define('SYS_PATH', realpath('../system').'/');
define('BASE_PATH', realpath('../').'/');

// Define the PHP file extension.
define('EXT', '.php');

// Load the configuration and string classes.
require SYS_PATH.'config'.EXT;

// Register the auto-loader
spl_autoload_register(require SYS_PATH.'loader'.EXT);

// Set the error reporting level.
error_reporting((System\Config::get('error.detail')) ? E_ALL | E_STRICT : 0);
// error_reporting(E_ALL);

// 
$route = System\Router::route(System\Request::method(), System\Request::uri());

$response = $route->call();

$response->send();

echo '<h1>Track-Laravel</h1>';
