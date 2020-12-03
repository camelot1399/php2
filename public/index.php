<?php

use app\models\{Product, User, Basket, Order};
use app\engine\{Autoload, Db};
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());

$product->price = 50;

// var_dump($product);
//var_dump($product->getOne(5));


$user = new User(new Db());
// var_dump($user->getOne(3));

$basket = new Basket(new Db());
echo '<br>';
var_dump($basket->getOne(3)->insert());