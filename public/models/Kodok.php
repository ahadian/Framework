<?php

class Kodok extends Model {

	function getData(){
		$this->db->query("SELECT * FROM `tb_users`");
		return $this->db->fetchAll();
	}
}