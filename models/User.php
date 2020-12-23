<?php

namespace app\models;

use app\engine\Session;
use app\engine\Cookie;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    protected $rememberMe;

    public static function auth($login, $pass, $rememberMe = null) {

        $user = User::getOneWhere('login', $login);
        $check = password_verify($pass, $user->pass);

        if ($check) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            if (!is_null($rememberMe)) {
                Cookie::cookieStart($login);
            }
            
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

    public function __construct($login = null, $pass = null, $rememberMe = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->rememberMe = $rememberMe;
    }

    protected static function getTableName() {
        return "users";
    }

}