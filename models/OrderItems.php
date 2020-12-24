<?php


namespace app\models;

use app\engine\Db;

class OrderItems extends DbModel {

    protected $id;
    protected $session_id;
    protected $product_price;
    protected $product_id;
    protected $order_id;

    protected $props = [
        'session_id' => false,
        'product_price' => false,
        'product_id' => false,
        'order_id' => false,
    ];

    public function __construct(
        $session_id = null, 
        $product_price = null, 
        $product_id = null, 
        $order_id = null
        )
    {
        $this->session_id = $session_id;
        $this->product_price = $product_price;
        $this->product_id = $product_id;
        $this->order_id = $order_id;
    }

    public function getOrderItems($id) {

        $sql = "SELECT * FROM order_items
        LEFT JOIN orders ON order_items.order_id = :id
        LEFT JOIN basket ON orders.session_id = basket.session_id
        LEFT JOIN products ON products.id = basket.product_id";
        return Db::getInstance()->queryAll($sql, ['id' => $id]);
    }

    protected static function getTableName()
    {
        return "order_items";
    }
}