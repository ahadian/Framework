<?php

defined('ROOT_DIR') or die('Forbidden');

require SYS_DIR . 'Common.php';

require SYS_DIR . 'Loader/Autoloader.php';

// instantiate the loader
$loader = new \System\Loader\Autoloader;

// register the autoloader
$loader->register();

// register the base directories for the namespace prefix

$loader->addNamespace(array(
		'PrivCode\\' => 'System',
		'PrivCode\\App\\' => 'Application'
	));
$router = new PrivCode\Router\Router;
$router->init();