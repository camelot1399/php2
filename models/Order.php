<?php

namespace app\models;

class Order extends Model {
    public $id;
    public $name;
    public $description;
    public $price;

    protected function getTableName() {
        return "Order";
    }

}