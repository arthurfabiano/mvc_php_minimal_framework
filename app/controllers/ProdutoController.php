<?php

namespace App\Controllers;

use Jenssegers\Blade\Blade;

class ProdutoController {

    private $blade;

    public function __construct()
    {
        $this->blade = new Blade(DIR_REQ . 'app/views', DIR_REQ . 'lib/cache');
    }

    public function index($url=null, $tipo=null, $marca=null)
    {
        $title = 'Produto';
        return $this->blade->render('produto', compact(['title']));
    }
}