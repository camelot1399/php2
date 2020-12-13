<?php

namespace app\models;

class Auth extends DbModel {

    protected $auth;

    public function __construct($auth = null) {
        $this->auth = $auth;
    }
}