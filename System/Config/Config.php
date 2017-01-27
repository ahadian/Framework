<?php namespace PrivCode\Config;

defined('ROOT_DIR') or die('Forbidden');

class Config {

	public function __construct(){
		if(empty($this->getConfigItem('url'))){
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
			$this->setConfigItem('url', $this->baseurl);
		}
	}

	public function setConfigItem($key, $value){
		$this->config[$key] = $value;
		return $this->config;
	}
	
	public function getConfigItem($key, $index = ''){
		if($index === ''){
			return isset($this->config[$key]) ? $this->config[$key] : NULL;
		}

		return isset($this->config[$key][$index]) ? $this->config[$key][$index] : NULL;
	}

}