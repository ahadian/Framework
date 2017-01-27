<?php
defined('ROOT_DIR') or die('Forbidden');

/**
 * Is HTTPS?
 *
 * Determines if the application is accessed via an encrypted
 * (HTTPS) connection.
 *
 * @return	bool
 */
if (!function_exists('https')) {
    function https()
    {
        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
            return true;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') {
            return true;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return true;
        }
        return false;
    }
}

/**
 * Error Handler
 *
 * This function lets us invoke the exception class and
 * display errors using the standard error template located
 * in System/Templates/Errors/error_general.php
 * This function will send the error page directly to the
 * browser and exit.
 *
 * @param	string
 * @param	int
 * @param	string
 * @return	void
 */
if (!function_exists('show_error')) {
    function show_error($message = '', $heading = 'An Error Was Encountered', $type = 'general')
    {
        include SYS_DIR . 'Templates/Errors/error_'.$type.'.php';
        exit();
    }
}

/* End of file Comming.php */
/* Location: ./System/Common.php */