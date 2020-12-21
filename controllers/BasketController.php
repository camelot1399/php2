<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Basket;
use app\models\Product;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id()),
            'count' => Basket::getSummBasket(session_id())
            
        ]);
    }

    public function actionAdd() {
        //$id = json_decode(file_get_contents('php://input'))->id;
        $id = (new Request())->getParams()['id'];
 
        $price = Product::getOne($id);
        $price = $price->price;

        (new Basket(session_id(), $id, $price))->save();

        $response = [
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

    //basket/del
    //$_POST['id]
    public function actionDel() {
        $id = (new Request())->getParams()['id'];

        // $basket = Basket::getOne($id);
        // $basket->delete();

        (new Basket(session_id(), $id))->delete();

        $response = [
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }

}