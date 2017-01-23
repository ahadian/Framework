<?php
defined('DIR_ROOT') or die('Forbidden.');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Custom config files
| 2. Models
| 4. Libraries
| 4. Helper files
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$config['autoload']['config'] = ['config1', 'config2'];
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$config['autoload']['config'] = [];

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$config['autoload']['model'] = ['first_model', 'second_model'];
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$config['autoload']['model'] = ['first_model' => 'first', 'second_model' => 'second'];
*/
$config['autoload']['model'] = ['kodok'];

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| public/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$config['autoload']['libraries'] = ['database','email','session'];
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$config['autoload']['libraries'] = ['user_agent' => 'ua'];
*/
$config['autoload']['libraries'] = ['database'];

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$config['autoload']['helper'] = ['form'];
*/
$config['autoload']['helper'] = [];