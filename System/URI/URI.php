<?php namespace PrivCode\URI;

defined('ROOT_DIR') or die('Forbidden');

class URI {
	public function segment($segment = NULL){
		if(isset($_SERVER['PATH_INFO'])){
			$this->pathinfo = explode(DIRECTORY_SEPARATOR, $_SERVER['PATH_INFO']);
			if($segment === NULL){
				return $this->pathinfo;
			} else {
				return $this->pathinfo[$segment];
			}
		}
	}
}