<?php

namespace Core;

abstract class ConectionModel
{
    protected $table;
    protected $fillable;
    protected $hidden;

    protected function conectDB()
    {
        try{
            return $con = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."",DB_USER, DB_PASS);

        } catch (\PDOException $error) {
            return $error->getMessage();
        }
    }

    protected function getFindAll()
    {
        $query = $this->conectDB()->prepare("SELECT {$this->removeCharInQuery()} FROM {$this->table}");
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    protected function getFind($id) 
    {
        $query = $this->conectDB()->prepare("SELECT * FROM {$this->table} where id=?");
        $query->bindParam(1, $id, \PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_OBJ);
        return $data;
    }

    // protected function getCreate($dados) 
    // {
    //     $query = $this->conectDB()->prepare("INSERT INTO {$this->table} VALUES(?,?,?,?,?)");
    //     $query->bindParam(1, $dados['id'], \PDO::PARAM_INT);
    //     $query->bindParam(2, $dados['perfil_id'], \PDO::PARAM_INT);
    //     $query->bindParam(3, $dados['name'], \PDO::PARAM_STR);
    //     $query->bindParam(4, $dados['email'], \PDO::PARAM_STR);
    //     $query->bindParam(5, $dados['password'], \PDO::PARAM_STR);
    //     $query->execute();
    //     $data = $query->fetchAll(\PDO::FETCH_OBJ);
    //     return $data;
    // }

    protected function getUpdate($dados) 
    {
        // $query = $this->conectDB()->prepare("INSERT INTO {$this->table} VALUES(?,?,?,?,?)");
        // $query->bindParam(1, $dados['id'], \PDO::PARAM_INT);
        // $query->bindParam(2, $dados['perfil_id'], \PDO::PARAM_INT);
        // $query->bindParam(3, $dados['name'], \PDO::PARAM_STR);
        // $query->bindParam(4, $dados['email'], \PDO::PARAM_STR);
        // $query->bindParam(5, $dados['password'], \PDO::PARAM_STR);
        // $query->execute();
        // $data = $query->fetchAll(\PDO::FETCH_OBJ);
        // return $data;
    }

    protected function removeCharInQuery() {
        $fillable = (empty($this->fillable)) ? '*' : $this->fillable;
        $result = (!empty($this->hidden)) ? $this->removeItemInQuery($fillable) : $fillable ;
        $dados = '';
        foreach ($result as $value) {
            $dados .= $value . ',';
        }
        return rtrim($dados, ',');
    }
    
    protected function removeItemInQuery($dados) {
        return array_diff($dados, $this->hidden);
    }

    
}