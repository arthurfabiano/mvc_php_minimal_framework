<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;
use App\models\HomeModel;

class HomeController extends HomeModel{

    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIR_REQ . 'app/views', DIR_REQ . 'lib/cache');
    }

    public function index($url=null, $tipo=null, $marca=null)
    {
        $data = $this->findAll();
        var_dump($data);exit;
        return $this->blade->render('home', compact(['nome']));
    }
}