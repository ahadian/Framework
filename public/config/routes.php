<?php
defined('DIR_ROOT') or die('Forbidden.');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$config['routes']['controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$config['routes']['function'] = 'index';
|
| This route indicates which controller class should be loaded if the
| URI contains no data of method. In the above example, the "index" method
| would be called.
|
*/

$config['routes']['controller'] = 'home'; 
$config['routes']['function'] = 'index'; 