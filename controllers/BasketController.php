<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{


    public function actionIndex() {
        echo $this->render('basket');
    }

    public function actionBasket() {
        $basket = $this->getBasket();

        echo $this->render('basket', [
            'basket' => $basket
        ]);
    }

}