<?php

namespace App\Models;

use \Core\ConectionModel;

class HomeModel extends ConectionModel
{
    protected $table    = 'user';

    protected $fillable = ['id', 'name', 'email'];

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

    public function store($dados)
    {
        $query = $this->conectDB()->prepare("INSERT INTO {$this->table} VALUES(?,?,?,?,?)");
        $query->bindParam(1, $dados['id'], \PDO::PARAM_INT);
        $query->bindParam(2, $dados['perfil_id'], \PDO::PARAM_INT);
        $query->bindParam(3, $dados['name'], \PDO::PARAM_STR);
        $query->bindParam(4, $dados['email'], \PDO::PARAM_STR);
        $query->bindParam(5, $dados['password'], \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

}