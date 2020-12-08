<?php

namespace app\models;

class Order extends Model {
    public $id;
    public $product_id;
    public $user_id;
    public $price;
    public $session_id;
    public $userName;

    protected function getTableName() {
        return "Order";
    }

}