<?php namespace PrivCode\App\Controllers;

use PrivCode\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $this->model('Lulz');
        $this->data['db'] = $this->lulz->lol();
        $this->view('test_view', $this->data);
    }

    public function supian($a,$b)
    {
        echo 'Supian => '.$a.' => '.$b;
    }
}
