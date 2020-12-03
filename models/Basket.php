<?php

namespace app\models;

class Basket extends Model {
    public $id;

    protected function getTableName() {
        return "Basket";
    }

    protected function getId() {
        return $this->id;
    }

}