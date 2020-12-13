<?php


namespace app\models;

use app\engine\Db;
class Basket extends DbModel
{
    protected $id;
    protected $session_id;
    protected $product_id;

    public static function getBasket($session_id) {
        $sql = "SELECT basket.id basket_id, products.id prod_id, products.name, products.description, products.price FROM `basket`,`products` WHERE `session_id` = '111' AND basket.product_id = products.id";
        var_dump($sql);
        return Db::getInstance()->queryALl($sql, ['session_id' => $session_id]);
    }

    public static function getSummBasket($session_id) {
        $sql = "JOIN";
        return [];
    }

    protected static function getTableName()
    {
        return "basket";
    }
}