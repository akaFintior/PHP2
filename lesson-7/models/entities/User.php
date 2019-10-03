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
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
    }



}