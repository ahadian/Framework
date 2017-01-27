<?php namespace PrivCode\Router;

defined('ROOT_DIR') or die('Forbidden');

class Router extends \PrivCode\App\Config\Config
{
    public $uri;
    
    /**
     * Current class name
     *
     * @var	string
     */
    public $class =        '';

    /**
     * Current method name
     *
     * @var	string
     */
    private $method;
    
    /**
     * Current uri segment
     *
     * @var	array
     */
    private $segment = array();
    
    /**
     * Current controller name
     *
     * @var	object
     */
    private $controller;

    /**
     * Current id
     *
     * @var	array
     */
    private $var = array();

    public function __construct()
    {
        parent::__construct();
        
        $this->uri    = new \PrivCode\URI\URI;
        $this->segment = $this->uri->segment();
        $this->setController();
        $this->setMethod();
        $this->setVars();
    }

    private function setController()
    {
        /**
         * Set default controller
         *
         * @return	void
         */
        if (!isset($this->segment[0]) or empty($this->segment[0])) {
            if (empty($this->getConfigItem('routes', 'controller'))) {
                die('Unable to determine what should be displayed. A default route of controller has not been specified in the config file. Please configure this file ' . APP_DIR . 'Config/Config.php');
            }

            $this->segment[0] = $this->getConfigItem('routes', 'controller');
        }

        $this->class = ucfirst($this->segment[0]);
        eval('$this->controller = new \PrivCode\App\Controllers\\'.$this->class.";");
    }

    private function setMethod()
    {
        if (!isset($this->segment[1]) or empty($this->segment[1])) {
            if (empty($this->getConfigItem('routes', 'method'))) {
                die('Unable to determine what should be displayed. A default route of method has not been specified in the config file. Please configure this file ' . APP_DIR . 'Config/Config.php');
            }

            $this->segment[1] = $this->getConfigItem('routes', 'method');
        }

        $this->method = $this->segment[1];
        
        if (!method_exists($this->controller, $this->method)) {
            die('Fatal Error : Uncaught Error: Call to undefined method \'' . $this->method . '\' in ' . APP_DIR . 'Controllers/' . $this->class . '.php');
        }
    }

    private function setVars()
    {
        if (isset($this->segment[2])) {
            $this->var = array_slice($this->segment, 3);
        }
    }


    /*
     * ------------------------------------------------------
     *  Call the requested method
     * ------------------------------------------------------
     */
    public function init()
    {
        call_user_func_array(array(&$this->controller, $this->method), $this->var);
    }
}

/* End of file Router.php */
/* Location: ./System/Router/Router.php */
