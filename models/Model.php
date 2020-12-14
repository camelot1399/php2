<?php


namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{

    public function __set($name, $value) {
        //TODO запретить обращение к несуществующим полям if ...
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __isset($name) {
        //TODO return isset $this->$name;
        return true;
    }



    abstract protected static function getTableName();
}