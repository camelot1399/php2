<?php


namespace app\controllers;

use app\models\Auth;

class AuthController extends Controller
{
    public function actionLogin() {
        //if (auth())

        echo $this->render('auth');
    } //?c=auth&a=login  //auth/login
    public function actionLogout() {}


}