<?php

namespace App\Models;

use \Core\ConectionModel;

class HomeModel extends ConectionModel
{
    protected $table    = 'user';

    protected $fillable = ['name', 'email'];

    #Item que não irá aparecer em nenhuma query 
    protected $hidden   = ['password'];

    public function findAll()
    {
        return $this->getFindAll();
    }

    public function find($id)
    {
        return $this->getFind($id);
    }

}