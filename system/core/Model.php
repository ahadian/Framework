<?php
defined('DIR_ROOT') or die('Forbidden.');

class Model {
	
	public function __get($key) {
		return instance()->$key;
	}


}