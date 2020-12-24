<?php

namespace app\controllers;

use app\models\Product;
use app\engine\Request;

class ProductController extends Controller
{


    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        //TODO переделать на Request

        $page = (int)$_GET['page'];

        $catalog = Product::getLimit(($page + 1) * PRODUCT_PER_PAGE);

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        //TODO переделать на Request
        echo $this->render('card', [
            'product' => Product::getOne($id)
        ]);
    }

    public function actionDel() {
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);

        $product->deleteProduct();

        $response = [
            'count' => Product::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    public function actionAdd() {
        $id = (new Request())->getParams()['id'];
        $product = Product::getOne($id);

        if (!$product) {
            $name        = Product::cleanChars($_POST['name']);
            $description = Product::cleanChars($_POST['description']);
            $price       = Product::cleanChars($_POST['price']);
            $product = new Product($name, $description, $price);
        } else {
            $product->name        = Product::cleanChars($_POST['name']);
            $product->description = Product::cleanChars($_POST['description']);
            $product->price       = Product::cleanChars($_POST['price']);
        }

        $product->save();

        header("Location:" . '/adminka/catalog');

    }

}