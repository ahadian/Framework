<?php

class Config {

	/**
	 * List of all loaded config values
	 *
	 * @var	array
	 */
	public $config = array();

	public function __construct(){
		$this->config =& config_loader();

		// Set the baseurl automatically if none was provided
		if (empty($this->config['main']['baseurl'])){
			if (isset($_SERVER['SERVER_ADDR'])){
				if (strpos($_SERVER['SERVER_ADDR'], ':') !== FALSE){
					$address = '['.$_SERVER['SERVER_ADDR'].']';
				} else {
					$address = $_SERVER['SERVER_ADDR'];
				}
				$this->baseurl = (https() ? 'https' : 'http').'://'.$address.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
			} else {
				$this->baseurl = 'http://localhost/';
			}

			$this->set_item('main', 'baseurl', $this->baseurl);
		}

	}

	public function load($files = array()){
		$loaded = false;
		foreach ($files as $file) {
			$configPath =  DIR_PUBLIC . 'config' . DIRECTORY_SEPARATOR . strtolower($file) . '.php';
			if(file_exists($configPath)){
				$loaded = true;
				include $configPath;
			}
		}

		if($loaded === true){
			if($config && is_array($config)){
				$this->config = array_merge($this->config, $config);
				return true;
			} else {
				error('Your '.$configPath.' file does not appear to contain a valid configuration array.');
			}
		} else {
			error('The configuration file '.$file.'.php does not exist.');
		}
	}

	/**
	 * Fetch a config file item
	 *
	 * @param	string	$item	Config item name
	 * @param	string	$index	Index name
	 * @return	string|null	The configuration item or NULL if the item doesn't exist
	 */
	public function item($type, $item, $index = ''){
		if ($index == ''){
			return isset($this->config[$type][$item]) ? $this->config[$type][$item] : NULL;
		}

		return isset($this->config[$type][$index], $this->config[$type][$index][$item]) ? $this->config[$type][$index][$item] : NULL;
	}

	/**
	 * Set a config file item
	 *
	 * @param	string	$item	Config item key
	 * @param	string	$value	Config item value
	 * @return	void
	 */
	public function set_item($type, $item, $value){
		$this->config[$type][$item] = $value;
	}
}