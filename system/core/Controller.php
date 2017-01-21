<?php
defined('DIR_ROOT') or die('Forbidden.');

class Controller {

	protected $load;
  	private static $instance;

	function __construct(){
		self::$instance =& $this;
		$this->load = new Loader();
	}
	
	public static function &instance() {
    	return self::$instance;
	}
}