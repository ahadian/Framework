<?php namespace PrivCode;

defined('ROOT_DIR') or die('Forbidden');

use PrivCode\Database\Database;

class BaseModel extends Database {

	public function __construct(){
		parent::__construct();
	}

}