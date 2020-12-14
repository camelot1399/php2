<?php

namespace app\engine;

class Session {
    protected $id;
    protected $login;

    public function __construct($id = null, $login = null)
    {
        $this->id = $id;
        $this->login = $login;

    }

    public function getSessionLogin()
    {
        return $this->login;
    }

}