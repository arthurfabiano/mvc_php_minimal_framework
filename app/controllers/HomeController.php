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
        $users = $this->findAll();
        return $this->blade->render('home', compact(['nome', 'users']));
    }

    public function create()
    {
        // $dados = [
        //     'name'   => filter_input(INPUT_POST, 'name', FILTER_DEFAULT),
        //     'email'  => filter_input(INPUT_POST, 'email', FILTER_DEFAULT),
        //     'pass'   => filter_input(INPUT_POST, 'password', FILTER_DEFAULT)
        // ];

        $dados = [
            'perfil_id' => 1,
            'name'      => 'Teste',
            'email'     => 'teste@gmail.com',
            'password'      => 'teste'
        ];

        $users  = $this->store($dados);
        return $this->blade->render('home', compact(['nome', 'users']));
    }

    public function edit()
    {
        $dados = [
            'id'        => 4,
            'perfil_id' => 1,
            'name'      => 'Teste Update',
            'email'     => 'teste@gmail.com',
        ];

        $this->update($dados);
        $users  = $this->findAll();
        return $this->blade->render('home', compact(['nome', 'users']));
    }

    public function testePullRequest()
    {
        echo "asdfasdf";exit;
    }
}