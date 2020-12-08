<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }


    public function getOne($id) {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ["id" => $id], static::class);
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return Db::getInstance()->queryAll($sql);

    }

    public function lastInsertId() {
        $sql = "SELECT id FROM {$this->getTableName()} ORDER BY id DESC LIMIT 1";
        return Db::getInstance()->execute($sql);
    }

    public function insert() {

        foreach($this as $key => $value) {
            
            if ($key == 'id') continue;
            if ($key == 'db') continue;
        
            $params[] = [$key => $value];
            $params2[] = $key;
        }

        $paramsKey = implode(', ', $params2);
        $paramsValue = implode(', :', $params2);

        $sql = "INSERT INTO {$this->getTableName()} ({$paramsKey}) VALUES (:{$paramsValue})";
 
        Db::getInstance()->execute($sql, $params)->fetchAll();

        return $this->id = $this->lastInsertId();
    }

    public function delete() {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = {$this->id}";
        return Db::getInstance()->execute($sql);
    }


    abstract protected function getTableName();
}