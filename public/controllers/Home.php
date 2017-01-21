<?php


class Home extends Controller {
	function index(){
		$this->load->model('kodok');
		$a['data'] = $this->kodok->getData();

		$a['datakedua'] = 'Saya Data Kedua';
		
		$this->load->view('test_view', $a);
	}
}