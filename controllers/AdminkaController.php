<?php


namespace app\controllers;

use app\models\Order;
use app\models\OrderItems;
use app\models\User;
use app\models\Product;

class AdminkaController extends Controller
{
    public function actionIndex() {

        if (User::isAdmin()) {
            echo $this->render('adminka/adminka', [
                'orders' => Order::getOrderALl(),
            ]);
        } else {
            header("Location:" . '/');
        }

    }

    public function actionCatalog() {
        echo $this->render('adminka/catalog', [
            'list' => Product::getAll(),
        ]);
    }

    public function actionOrderItem() {
        $id = $_GET['id'];
        echo $this->render('adminka/orderItem', [
            'items' => OrderItems::getOrderItems($id),
            'order' => Order::getOrderId($id)
        ]);
    }

    public function actionEdit() {
        $id = $_GET['id'];
        var_dump($id);
        echo $this->render('adminka/edit', [
            'item' => Product::getOne($id),
        ]);
    }

    public function actionAdd() {
        echo $this->render('adminka/add');
    }
}