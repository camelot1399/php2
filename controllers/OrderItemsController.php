<?php


namespace app\controllers;

use app\models\OrderItems;

class OrderItemsController extends Controller {

    public function actionIndex() {
        echo $this->render('order', [
            'order' => OrderItems::getOrderItems(session_id())
        ]);
    }


}