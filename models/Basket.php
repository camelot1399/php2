<?php

namespace app\models;

class Basket extends Model {
    public $id;

    protected function getTableName() {
        return "Basket";
    }

}