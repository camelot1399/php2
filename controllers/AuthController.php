<?php


namespace app\controllers;


use app\engine\Request;
use app\models\User;

class AuthController extends Controller
{
    public function actionLogin() {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        $rememberMe = $request->getParams()['rememberMe'];

        if (User::auth($login, $pass, $rememberMe)) {
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else {
            die("Не верный логин пароль.");
        }

    }
    public function actionLogout() {
        $session = new \app\engine\Session();
        $session->regenerateSession();
        $session->destroySession();
        //session_destroy();
        header("Location:" . $_SERVER['HTTP_REFERER']);
        die();
    }


}