<?php


namespace app\controllers;

use app\models\Order;
use app\models\Basket;
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

        $userFirstName = ORDER::cleanChars($_POST['userFirstName']);
        $userLastName  = ORDER::cleanChars($_POST['userLastName']);
        $phone         = ORDER::cleanChars($_POST['phone']);
        $email         = ORDER::cleanChars($_POST['email']);
        
        (new Order(session_id(), $productPrice, $userFirstName, $userLastName, $phone, $email))->save();
        
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