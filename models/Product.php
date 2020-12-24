<?php

namespace app\models;

class Product extends DbModel {

    protected $id;
    protected $name;
    protected $description;
    protected $price;

    protected $props = [
        'name' => false,
        'description' => false,
        'price' => false
    ];


    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public static function cleanChars($input_text) {
        $input_text = trim($input_text);
        $input_text = strip_tags($input_text);
        $input_text = htmlspecialchars($input_text);
        return $input_text;
    }


    protected static function getTableName() {
        return "products";
    }

}