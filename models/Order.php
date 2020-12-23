<?php


namespace app\models;


use app\engine\Db;

class Order extends DbModel {

    protected $id;
    protected $session_id;
    protected $product_price;
    protected $userFirstName;
    protected $userLastName;
    protected $phone;
    protected $email;

    protected $props = [
        'session_id' => false,
        'product_price' => false,
        'userFirstName' => false,
        'userLastName' => false,
        'phone' => false,
        'email' => false
    ];

    public function __construct(
        $session_id = null, 
        $product_price = null, 
        $userFirstName = null,
        $userLastName = null,
        $phone = null,
        $email = null
        )
    {
        $this->session_id = $session_id;
        $this->product_price = $product_price;
        $this->userFirstName = $userFirstName;
        $this->userLastName = $userLastName;
        $this->phone = $phone;
        $this->email = $email;
    }

    public static function getOrderCatalog($session_id) {
        $sql = "SELECT 
        basket.id basket_id, 
        basket.product_price basket_product_price, 
        products.id prod_id, 
        products.name, 
        products.description, 
        products.price
        FROM `basket`,`products` WHERE `session_id` = :session AND basket.product_id = products.id";

        return Db::getInstance()->queryAll($sql, ['session' => $session_id]);
    }

    public static function getSummOrder($session_id) {
        $sql = "SELECT * FROM `orders` WHERE `session_id` = :session ";
        $response = Db::getInstance()->queryAll($sql, ['session' => $session_id]);
        return $response[0]['product_price'];
    }

    public static function getOrder($session_id) {
        $sql = "SELECT * FROM `orders` WHERE `session_id` = :session ";
        $response = Db::getInstance()->queryOne($sql, ['session' => $session_id]);
        return $response;
    }

    public static function getOrderId($id) {
        $sql = "SELECT * FROM `orders` WHERE `id` = :id ";
        $response = Db::getInstance()->queryOne($sql, ['id' => $id]);
        return $response;
    }

    public static function getOrderAll() {
        $sql = "SELECT * FROM `orders`";
        $response = Db::getInstance()->queryAll($sql);
        return $response;
    }

    public static function cleanChars($input_text) {
        $input_text = trim($input_text);
        $input_text = strip_tags($input_text);
        $input_text = htmlspecialchars($input_text);
        return $input_text;
    }

    protected static function getTableName()
    {
        return "orders";
    }

}