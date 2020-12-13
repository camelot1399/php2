<?php


namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('basket');
    }

    public function actionBasket() {
        $basket = Basket::getBasket(111);

        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }
}