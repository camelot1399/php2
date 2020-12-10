<?php


namespace app\models;

use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    public static function getBasket($session_id) {
        $sql = "JOIN";
        var_dump($sql);
        return Db::getInstance()->queryAll($sql);
    }

    protected static function getTableName()
    {
        return "basket";
    }
}