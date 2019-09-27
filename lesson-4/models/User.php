<?php

namespace app\models;

class User extends DbModel
{
    public $id;
    public $login;
    public $pass;

    public static function getTableName() {
        return 'users';
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


    public $state = [
        'login' => false,
        'pass' => false,
    ];
}