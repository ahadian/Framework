<?php namespace PrivCode\Loader;

defined('ROOT_DIR') or die('Forbidden');

use PrivCode\URI\URI;

class Loader extends URI {
	
	public function model($model, $name = false){

		if(in_array('Models', explode('\\', get_called_class()))){
			show_error('Load model in the model classes are not allowed');
		}
		
		$class = strtolower($model);
		if($name !== false && !empty($name)){
			$class = strtolower($name);
		}
		eval('$this->'.$class.' = new PrivCode\App\Models\\'.ucfirst(strtolower($model)).'();');
		return $this->{$class};
	}

	public function helper($helper){

		$helperPath = APP_DIR . 'Helpers' . DIRECTORY_SEPARATOR . $helper . '.php';
		
		if(!file_exists($helperPath)){
			show_error('Unable to load the requested helper file : '. $helperPath);
		}
		
		include $helperPath;
	}

	public function library($library, $name = false){
		
		$class = strtolower($library);
		if($name !== false && !empty($name)){
			$class = strtolower($name);
		}
		eval('$this->'.$class.' = new PrivCode\App\Libraries\\'.ucfirst(strtolower($library)).'();');
		return $this->{$class};
	}

	public function view($view, $data = NULL){

		if(in_array('Models', explode('\\', get_called_class()))){
			show_error('Load view in the model classes are not allowed');
		}

		$viewPath = APP_DIR . 'Views'. DIRECTORY_SEPARATOR . $view . '.php';
		if(!file_exists($viewPath)){
			show_error('Unable to load the requested view file : '. $helperPath);
		}
		if($data){
			foreach ($data as $key => $value) {
				${$key} = $value;
			}
		}
		include $viewPath;
	}

}