<?php namespace PrivCode\App\Models;

use PrivCode\BaseModel;

class Lulz extends BaseModel {

	public function lol(){
		$this->database();
		$this->db->query('SELECT * FROM `tb_users`');
		return $this->db->fetchAll();
	}

}