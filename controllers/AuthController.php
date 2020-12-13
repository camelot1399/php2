<?php


namespace app\controllers;

use app\models\Auth;

class AuthController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }
    
    public function actionLogin() {
        //if (auth())
        echo "auth";
    } //?c=auth&a=login  //auth/login
    public function actionLogout() {}


}