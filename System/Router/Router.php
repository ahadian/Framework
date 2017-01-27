<?php namespace PrivCode\Router;

defined('ROOT_DIR') or die('Forbidden');

class Router extends \PrivCode\App\Config\Config {

	private $segment = array();
    private $controller;
    private $method;
    private $var = array();

	public function __construct(){
		parent::__construct();
		
		$this->uri    = new \PrivCode\URI\URI;
		$this->segment = $this->uri->segment();
		$this->setController();
		$this->setMethod();
		$this->setVars();
	}

	private function setController(){

		if(!isset($this->segment[1]) OR empty($this->segment[1])){

			if(empty($this->getConfigItem('routes', 'controller'))){
				die('Unable to determine what should be displayed. A default route of controller has not been specified in the config file. Please configure this file ' . APP_DIR . 'Config/Config.php');
			}

			$this->segment[1] = $this->getConfigItem('routes', 'controller');
		}

		$this->class = ucfirst($this->segment[1]);
		eval('$this->controller = new \PrivCode\App\Controllers\\'.$this->class.";");

	}

	private function setMethod(){

		if(!isset($this->segment[2]) OR empty($this->segment[2])){

			if(empty($this->getConfigItem('routes', 'method'))){
				die('Unable to determine what should be displayed. A default route of method has not been specified in the config file. Please configure this file ' . APP_DIR . 'Config/Config.php');
			}

			$this->segment[2] = $this->getConfigItem('routes', 'method');
		}

		$this->method = $this->segment[2];
		
		if(!method_exists($this->controller, $this->method)){
			die('Fatal Error : Uncaught Error: Call to undefined method \'' . $this->method . '\' in ' . APP_DIR . 'Controllers/' . $this->class . '.php');
		}	

	}

	private function setVars(){
		
		if(isset($this->segment[3])) {
            $this->var = array_slice($this->segment, 3); 
        }

	}

	public function init(){
		call_user_func_array(array(&$this->controller, $this->method), $this->var);
	}
}