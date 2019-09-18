<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;

    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        parent::__construct();
    }

    public function getTableName() {
        return 'users';
    }


}