<?php


namespace app\models;


use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $session_id;
    protected $product_id;
    protected $product_price;

    protected $props = [
        'session_id' => false,
        'product_id' => false,
        'product_price' => false
    ];

    public function __construct($session_id = null, $product_id = null, $product_price = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->product_price = $product_price;
    }
    
    public static function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, basket.product_price basket_product_price, products.id prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = :session AND basket.product_id = products.id";
        return Db::getInstance()->queryAll($sql, ['session' => $session_id]);
    }

    public static function getSummBasket($session_id) {
        $sql = "SELECT SUM(product_price) as count FROM `basket` WHERE `session_id` = :session ";
        $response = Db::getInstance()->queryAll($sql, ['session' => $session_id]);
        return $response[0]['count'];
    }

    protected static function getTableName()
    {
        return "basket";
    }

}