<?php

namespace app\models\entities;

use app\engine\Db;
use app\engine\Session;

class User extends DataEntity
{
    public $id;
    public $login;
    public $pass;



}