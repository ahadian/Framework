<?php namespace PrivCode\App\Config;

defined('ROOT_DIR') or die('Forbidden');

use PrivCode\Config\Config as Base_Config;

class Config extends Base_Config
{
    public function __construct()
    {

        /*
        |--------------------------------------------------------------------------
        | Base Site URL
        |--------------------------------------------------------------------------
        |
        | URL to your Priv Code root. Typically this will be your base URL,
        | WITH a trailing slash:
        |
        |	https://example.com/
        |
        | WARNING: You MUST set this value!
        |
        | If it is not set, then Priv Code will try guess the protocol and path
        | your installation, but due to security concerns the hostname will be set
        | to $_SERVER['SERVER_ADDR'] if available, or localhost otherwise.
        | The auto-detection mechanism exists only for convenience during
        | development and MUST NOT be used in production!
        |
        | If you need to allow multiple domains, remember that this file is still
        | a PHP script and you can easily do that on your own.
        |
        */
        $this->setConfigItem(

            'url', 'http://localhost/'
            
            );

        /*
        |-------------------------------------------------------------------------
        | URI ROUTING
        |-------------------------------------------------------------------------
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
        |-------------------------------------------------------------------------
        | RESERVED ROUTES
        |-------------------------------------------------------------------------
        |
        | There are three reserved routes:
        |
        |	['controller'] = 'Home';
        |
        | This route indicates which controller class should be loaded if the
        | URI contains no data. In the above example, the "welcome" class
        | would be loaded.
        |
        |	['method'] = 'index';
        |
        | This route indicates which method should be loaded if the
        | URI contains no data. In the above example, the "index" method
        | would be loaded.
        */
        $this->setConfigItem('routes', array(

            'controller' => 'Home',
            'method'     => 'index'
            
            ));
        
        /*
        |-------------------------------------------------------------------
        | DATABASE CONNECTIVITY SETTINGS
        |-------------------------------------------------------------------
        | This file will contain the settings needed to access your database.
        |
        | For complete instructions please consult the 'Database Connection'
        | page of the User Guide.
        |
        |-------------------------------------------------------------------
        | EXPLANATION OF VARIABLES
        |-------------------------------------------------------------------
        |
        |	['hostname'] The hostname of your database server.
        |	['username'] The username used to connect to the database
        |	['password'] The password used to connect to the database
        |	['database'] The name of the database you want to connect to
        |	['driver'] The database driver. e.g.: MySQLI.
        |			Currently supported:
        |				 MySQLI
        |
        */
        $this->setConfigItem('database', array(

            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'exploded',
            'database' => 'privcode',
            'driver'   => 'MySQLI'
            
            ));

        /*
        |-------------------------------------------------------------------
        |	Construct parent class
        |	DO NOT EDIT THIS SECTION!!!
        |-------------------------------------------------------------------
        */
        parent::__construct();
    }
}
