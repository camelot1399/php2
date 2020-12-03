<?php

namespace app\models;

class Product extends Model {
    public $id;
    public $name;
    public $description;
    public $price;

    protected function getTableName() {
        return "Product";
    }

    protected function getId() {
        return $this->id;
    }

}