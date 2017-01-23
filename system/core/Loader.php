<?php
defined('DIR_ROOT') or die('Forbidden.');

class Loader {

	protected $instance;

	function __construct(){
		$this->instance = &instance();
	}

	public function library($library, $name = ''){
		$libName = strtolower($library);
		$class 	 = ucfirst($library);
		if($name){
			$libName = strtolower($name);
			$class     = ucfirst($library);
		}
		
		return $this->instance->{$libName} = new $class();
	}

	public function model($model, $name = ''){
		$modelName = strtolower($model);
		$class 	   = ucfirst($model);
		if($name){
			$modelName = strtolower($name);
			$class     = ucfirst($model);
		}
		
		return $this->instance->{$modelName} = new $class();
	}

	
	public function view($view, $data = Array()){
		$viewPath = DIR_PUBLIC . 'views/' . $view . '.php';
	
		if(!file_exists($viewPath)){
			error('Unable to load the requested file : ' . $viewPath, 'An Error Was Encountered');
		}
	
		if($data){
			foreach ($data as $key => $value) {
				${$key} = $value;
			}
		}
		require $viewPath;
	}
}