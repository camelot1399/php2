<?php

namespace app\engine;

class Cookie
{
    public static function cookieStart($login)
    {   
        setcookie("login", $login, time() + 60*60*24*30, '/', false, false);
    }

    public static function cookieDelete($login)
    {   
        setcookie("login", $login, time() - 60*60*24*30, '/', false, false);
    }
}