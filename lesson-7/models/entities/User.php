<?php

namespace app\models\entities;

use app\engine\Db;
use app\engine\Session;

class User extends DataEntity
{
    public $id;
    public $login;
    public $pass;
    public $state = [
        'login' => false,
        'pass' => false
    ];

    public function __construct($login, $pass)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        $this->state['login'] = true;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
        $this->state['pass'] = true;
    }

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'login':
                return $this->login;
            case 'pass':
                return $this->pass;
        }
    }

}