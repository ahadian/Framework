<?php
defined('DIR_ROOT') or die('Forbidden.');

require DIR_SYSTEM . 'core/Common.php';

$config['main'] = config_loader('main');
// set config settings
Autoloader(array(
    [
      'basepath' => $config['main']['basepath'],
      'verbose' => false
    ],

    'public/controllers',
    'public/models',
    'public/libraries',
    'system/core',
    'system/libraries',
    'system/database'  
));


$router = new Router();
$router->init();