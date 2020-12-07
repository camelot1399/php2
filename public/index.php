<?php
include '../config/config.php';
include "../engine/Autoload.php";


use app\models\{Product, User, Basket, Order};
use app\engine\Autoload;
use app\engine\Db;
// use app\interfaces\{IModel};



spl_autoload_register([new Autoload(), 'loadClass']);

// $product = new Product('чай', 'йейлонский', 20);
// $product2 = new Product($db);
// $product->price = 50;

$product = new Product("Пицца","Описание", 125);
// echo '<pre>';
var_dump($product->lastInsertId());
// var_dump($product->lastInsertId());

echo '<pre>';
var_dump($product);

// var_dump($product->name);

// var_dump($product);

// var_dump($product->getOne(3));

// var_dump($product);

// $product->insert();
