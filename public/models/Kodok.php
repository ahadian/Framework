<?php

class Kodok extends Model {

	function getData(){
		$this->load->library('database', 'db');
		$this->db->connection();
		$this->db->query("SELECT * FROM `tb_users`");
		return $this->db->fetchAll();
	}
}