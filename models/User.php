<?php

namespace app\models;


class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;

    public static function auth($login, $pass) {
        //TODO чекнуть логин и пароль по $this->login
        //Создать сессию login
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getName() {
        return $_SESSION['login'];
    }

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    protected static function getTableName() {
        return "users";
    }

}