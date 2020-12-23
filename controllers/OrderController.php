<?php


namespace app\controllers;

use app\models\Order;
use app\models\Basket;
use app\models\OrderItems;
use app\engine\Request;


class OrderController extends Controller {

    public function actionIndex() {
        echo $this->render('order', [
            'catalog' => Order::getOrderCatalog(session_id()),
            'order'   => Order::getOrder(session_id()),
            'price'   => Order::getSummOrder(session_id()),
        ]);
    }

    public function actionAdd() {

        $productPrice = Basket::getSummBasket(session_id());

        $userFirstName = Order::cleanChars($_POST['userFirstName']);
        $userLastName  = Order::cleanChars($_POST['userLastName']);
        $phone         = Order::cleanChars($_POST['phone']);
        $email         = Order::cleanChars($_POST['email']);

        $productList = Basket::getBasket(session_id());
        (new Order(session_id(), $productPrice, $userFirstName, $userLastName, $phone, $email))->save();

        //OrderItems обработчик start
        $lastId = Order::getOrder(session_id());

        foreach($productList as $item) {
            (new OrderItems(session_id(), $item['basket_product_price'], $item['prod_id'], $lastId['id']))->save();
        }
        //OrderItems обработчик end


        $this->actionIndex();
        //$id = json_decode(file_get_contents('php://input'))->id;
        // $id = (new Request())->getParams()['id'];

        // (new Basket(session_id(), $id))->save();

        // $response = [
        //     'count' => Basket::getCountWhere('session_id', session_id())
        // ];

        // echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

}