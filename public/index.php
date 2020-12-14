<?php
session_start();
//use app\models\{Product, User};
//use app\engine\Db;

include "../config/config.php";
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\models\Product;
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Request;

spl_autoload_register([new Autoload(), 'loadClass']);
require_once '../vendor/autoload.php';

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
}



/** @var Product $product */



die();
$product = Product::getOne(1);
$product->name = "Чай2";
//$product->update();
var_dump($product);

//CREATE


$product = new Product("Банан", "Эквадорский", 123);
$product->save();

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


