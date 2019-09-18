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

    public function update($login, $pass, $id = null) 
    {
        if (is_null($id)) {
            $id = $this->db->getLastId();
            var_dump($id);
        }
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET login = :login, pass = :pass WHERE id = :id";
        $this->db->execute($sql, ['login' => $login, 'pass' => $pass, 'id' => $id]);
    }

}