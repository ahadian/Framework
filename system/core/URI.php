<?php

//defined('DIR_ROOT') or die('Forbidden.');

class URI {
	
	public function segment($x = 0) {
		if(isset($_SERVER['PATH_INFO'])):
			$uri = explode('/', $_SERVER['PATH_INFO']);
			
			if($x['array'] === true):
				return $uri;
			endif;

			return $uri[$x];
		endif;
	}

}
