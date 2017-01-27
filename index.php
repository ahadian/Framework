<?php

/**
 *
 *	Priv Code
 *
 * @package	Priv Code
 * @author	Supian M
 * @copyright	Copyright (c) 2017, Priv Code Lab (http://www.priv-code.com/)
 * @link	https://github.com/SupianID/Framework
 * @since	Version 1.6.0
 * @filesource
 */

$system = 'System';

$application = 'Application';

// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The name of system directory
define('ROOT_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);

// Is the system path correct?
if (!is_dir(ROOT_DIR . $system)) {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo 'Your public folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
    exit();
}

// Is the system path correct?
if (!is_dir(ROOT_DIR . $application)) {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo 'Your public folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
    exit();
}


// The name of "system" directory
define('SYS_DIR', ROOT_DIR . $system . DIRECTORY_SEPARATOR);

define('APP_DIR', ROOT_DIR . $application . DIRECTORY_SEPARATOR);


/*
|------------------------------------------------------
|	LOAD THE CODE
|------------------------------------------------------
*/

require SYS_DIR . 'PrivCode.php';

/* End of file index.php */
/* Location: ./index.php */