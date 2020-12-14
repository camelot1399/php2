<?php

namespace app\models;

use app\engine\Session;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;

    public static function auth($login, $pass) {
       
        $user = User::getOneWhere('login', $login);

        $check = password_verify($pass, $user->pass);

        if ($check) {
            $session = new Session($login, $user->id);

            var_dump(Session::getSessionLogin());
            
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin() {
        return static::getName() == 'admin';
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