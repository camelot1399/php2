<?php

use app\models\{Product, User, Basket, Order};
use app\engine\{Autoload, Db};
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$db = new Db();
$product = new Product($db);

$product->price = 50;

// var_dump($product);
//var_dump($product->getOne(5));


$user = new User($db);

$order = new Order($db);
// var_dump($user->getOne(3));

$basket = new Basket($db);
echo '<br>';
var_dump($basket->insert());

echo '<br>';
var_dump($order->insert());