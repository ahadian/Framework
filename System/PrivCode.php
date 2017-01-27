<?php

defined('ROOT_DIR') or die('Forbidden');

/**
 * System Initialization File
 *
 * Loads the base classes and executes the request.
 *
 * @package		Priv Code
 * @subpackage	Priv Code
 * @category	Front Controller
 * @author		Supian M
 * @link		http://www.priv-code.com
 */

/**
 * Priv Code Version
 *
 * @var	string
 *
 */
const PRIVCODE_VERSION = '1.6.0';

/*
 * ------------------------------------------------------
 *  Load the global functions
 * ------------------------------------------------------
 */
require SYS_DIR . 'Common.php';

/*
 * ------------------------------------------------------
 *  Load the class autoloader
 * ------------------------------------------------------
 */
require SYS_DIR . 'Loader/Autoloader.php';

/*
 * ------------------------------------------------------
 *  Instantiate the autoloader class and set the loader
 * ------------------------------------------------------
 */
$autoloader = new \System\Loader\Autoloader;

/*
 *------------------------------------------------------
 *	Register the autoloader
 *------------------------------------------------------
 */
$autoloader->register();

/*
 *------------------------------------------------------
 *	Set the base directories for the namespace prefix
 *------------------------------------------------------
 */
$autoloader->addNamespace(array(
        'PrivCode\\' => $system,
        'PrivCode\\App\\' => $application
    ));

/*
 * ------------------------------------------------------
 *  Instantiate the routing class and set the routing
 * ------------------------------------------------------
 */
$router = new PrivCode\Router\Router;

/* ------------------------------------------------------
 *  Send the final rendered output to the browser
 * ------------------------------------------------------
 */
$router->init();

/* End of file PrivCode.php */
/* Location: ./System/PrivCode.php */
