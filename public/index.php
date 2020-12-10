<?php

//use app\models\{Product, User};
//use app\engine\Db;

include "../config/config.php";
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\models\{Product, User};
use app\engine\Db;

spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}

// $product = new Product("Банан2", "Эквадорский1", 123);
// $product->save();

/** @var Product $product */





die();
$product = Product::getOne(1);
$product->name = "Чай2";
//$product->update();
var_dump($product);

//CREATE


$product = new Product("Банан", "Эквадорский", 123);
$product->insert();

//DELETE
$product = new Product();
$product = $product->getOne(5);
$product->delete();

//UPDATE
$product = new Product();
$product = $product->getOne(5);
$product->name = "Чай2";
$product->update();

var_dump($product);


die();

var_dump($product);

var_dump($product->getOne(1));

var_dump($product);


