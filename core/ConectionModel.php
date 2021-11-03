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