<?php

defined('DIR_ROOT') or die('Forbidden.');

if (!function_exists('https')){
	/**
	 * Is HTTPS?
	 *
	 * Determines if the application is accessed via an encrypted
	 * (HTTPS) connection.
	 *
	 * @return	bool
	 */
	function https(){
		if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off'){
			return TRUE;
		} else if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https') {
			return TRUE;
		} else if ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
			return TRUE;
		}
		return FALSE;
	}
}


if (!function_exists('config_loader')){
	/**
	 * Loads the main config file
	 *
	 * This function lets us grab the config file even if the Config class
	 * hasn't been instantiated yet
	 *
	 * @param	array
	 * @return	array
	 */
	function &config_loader(Array $replace = array()){
		static $config;

		if (empty($config)){
			$configPath = DIR_PUBLIC.'config/main.php';
			$found = FALSE;
			if (file_exists($configPath)){
				$found = TRUE;
				require $configPath;
			}

			if (!$found){
				error('The configuration file does not exist.');
			}

			// Does the $config array exist in the file?
			if (!isset($config) || !is_array($config)){
				error('Your config file does not appear to be formatted correctly.');
			}
		}

		// Are any values being dynamically added or replaced?
		foreach ($replace as $key => $val){
			$config[$key] = $val;
		}

		return $config;
	}
}


if(!function_exists('instance')){
	
	function &instance(){
		return Controller::instance();
	}

}


if(!function_exists('error')){

	function error($message = '', $heading = 'Error', $code = false){
		if($code){
			$message = '<code>'.$message.'</code>';
		}
		require DIR_PUBLIC . 'views/errors/general.php';
		exit();
	}

}

if(!function_exists('autoloader')){

	function autoloader($class_paths = NULL, $use_base_dir = true){
		static $is_init = false;

		static $conf = [
			'basepath' => '',
			'debug' => false,
			'extensions' => ['.php'], // multiple extensions ex: ['.php', '.class.php']
			'namespace' => '',
			'verbose' => false
		];

		static $paths = [];

	// autoloader(); returns paths (for debugging)  
		if(\is_null($class_paths)){
			return $paths;
		}

		if(\is_array($class_paths) && isset($class_paths[0]) && \is_array($class_paths[0])) {
			foreach($class_paths[0] as $k => $v){
				if(isset($conf[$k]) || \array_key_exists($k, $conf)){
					$conf[$k] = $v; // set conf setting
				}
			}
		
			unset($class_paths[0]); // rm conf from class paths
		}

		// init autoloader
		if(!$is_init){
			\spl_autoload_extensions(implode(',', $conf['extensions']));
			\spl_autoload_register(NULL, false); // flush existing autoloads
			$is_init = true;
		}

		if($conf['debug']){
			$paths['conf'] = $conf; // add conf for debugging
		}
		// autoload class
		if(!\is_array($class_paths)){
			// class with namespaces, ex: 'MyPack\MyClass' => 'MyPack/MyClass' (directories)
			$class_path = \str_replace('\\', \DIRECTORY_SEPARATOR, $class_paths);

			foreach($paths as $path){
				if(!\is_array($path)){
					foreach($conf['extensions'] as &$ext){
						$ext = \trim($ext);

						if(\file_exists($path . $class_path . $ext)){
							if($conf['debug']){
								if(!isset($paths['loaded'])){
									$paths['loaded'] = [];
								}

								$paths['loaded'][] = $path . $class_path . $ext;
							}

							require $path . $class_path . $ext;
							if(!class_exists($class_path)){
								error('<font style="font-weight:bold;">Fatal Error</font> : Uncaught Error: Class \''.$class_path.'\'  not found in ' . $path . $class_path . $ext );
							}

							if($conf['verbose']){
								echo '<div>' . __METHOD__ . ': autoloaded class "' . $path
									. $class_path . $ext . '"</div>';
							}
							return true;
						}
					}

					if($conf['verbose']){
						echo '<div>' . __METHOD__ . ': failed to autoload class "' . $path
							. $class_path . $ext . '"</div>';
					}

				}
			}

			return false; // failed to autoload class
		} else {

			$is_unregistered = true;
			if(count($class_paths) > 0){
				foreach($class_paths as $path){
					$tmp_path = ( $use_base_dir ? \rtrim($conf['basepath'], \DIRECTORY_SEPARATOR)
						. \DIRECTORY_SEPARATOR : '' ) . \trim(\rtrim($path, \DIRECTORY_SEPARATOR))
						. \DIRECTORY_SEPARATOR;

					if(!\in_array($tmp_path, $paths)){
						$paths[] = $tmp_path;

						if($conf['verbose']){
							echo '<div>' . __METHOD__ . ': registered path "' . $tmp_path . '"</div>';
						}
					}
				}

				if(\spl_autoload_register(( strlen($conf['namespace']) > 0 // add namespace
					? rtrim($conf['namespace'], '\\') . '\\' : '' ) . 'autoloader', (bool)$conf['debug'])){
					if($conf['verbose']){
						echo '<div>' . __METHOD__ . ': autoload registered</div>';
					}

					$is_unregistered = false; // flag unable to register
				} else if($conf['verbose']){
					echo '<div>' . __METHOD__ . ': autoload register failed</div>';
				}
			}

			return !$conf['debug'] ? !$is_unregistered : $paths;
		}
	}
}
