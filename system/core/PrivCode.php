<?php

require DIR_SYSTEM . 'core/Common.php';

autoloader(array(
    [
      'basepath' => DIR_ROOT,
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
