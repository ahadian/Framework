<?php namespace PrivCode\App\Config;

defined('ROOT_DIR') or die('Forbidden');

use PrivCode\Config\Config as Base_Config;

class Config extends Base_Config {
	
	public function __construct(){
		
		$this->setConfigItem(
			'url', ''
			);
	
		$this->setConfigItem('routes', array(
			'controller' => 'Home',
			'method'	 => 'index'
			));

		$this->setConfigItem('database', array(
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => 'exploded',
			'database' => 'privcode',
			'driver'   => 'MySQLI'
			));

		parent::__construct();
	}
}