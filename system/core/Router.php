<?php
defined('DIR_ROOT') or die('Forbidden.');

class Router {

	private $segment = array();
    private $controller;
    private $method;
    private $var = array();

	public function __construct(){
		$this->segment = URI::Segment(array('array' => true)); 
		$this->config['routes'] = config_loader('routes');
	}

	private function set_controller(){
		if(!isset($this->segment[1]) || empty($this->segment[1])){
			if(empty($this->config['routes']['controller'])){
				error('Unable to determine what should be displayed. A default route of controller has not been specified in the routing file. Please configure this file ' . DIR_PUBLIC . 'config/routes.php');
			}
			$this->segment[1] = $this->config['routes']['controller'];
		}

	//	new Controller();
			
		$this->class = ucfirst($this->segment[1]);
		$this->controller = new $this->class();
	}

	private function set_method(){
        if(!isset($this->segment[2]) || empty($this->segment[2])){
            if(empty($this->config['routes']['function'])){
				error('Unable to determine what should be displayed. A default route of function has not been specified in the routing file. Please configure this file ' . DIR_PUBLIC . 'config/routes.php');
			}
			$this->segment[2] = $this->config['routes']['function'];
        }

        $this->method = $this->segment[2];

       	if(!method_exists($this->controller, $this->method)){
       		error('<font style="font-weight:bold;">Fatal Error</font> : Uncaught Error: Call to undefined method \'' . $this->method . '\' in ' . DIR_PUBLIC . 'controllers/' . $this->class . '.php');
       	}
    }

    private function set_vars() {
        if(isset($this->segment[3])) {
            $this->var = array_slice($this->segment, 3); 
        }
    }

	public function init(){
		$this->set_controller();
		$this->set_method();
		$this->set_vars();
        
        call_user_func_array(array(&$this->controller, $this->method), $this->var);
	}

}