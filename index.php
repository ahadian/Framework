<?php
/*
*
*/
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

/*
*
*/
define('DIR_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

/*
*
*/
if(is_dir(DIR_ROOT . 'public')){
	define('DIR_PUBLIC', DIR_ROOT . 'public' . DIRECTORY_SEPARATOR);
} else {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your public folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3);
}

/*
*
*/

if(is_dir(DIR_ROOT . 'system')){
	define('DIR_SYSTEM', DIR_ROOT . 'system' . DIRECTORY_SEPARATOR);
} else {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your public folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
	exit(3);
}

require DIR_SYSTEM . 'core/PrivCode.php';