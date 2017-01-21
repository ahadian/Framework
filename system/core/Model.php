<?php
defined('DIR_ROOT') or die('Forbidden.');

class Model {
	public $db;
	public function __construct(){
		$this->db = new Database();
	}

	public function __get($key) {
		return instance()->$key;
	}


}