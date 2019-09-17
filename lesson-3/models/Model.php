<?php
namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    

    public function insert() {
        $tableName = $this->getTableName();
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'db') {
                $params["$key"] = $value;
                $keys[] = $key;
            }
        }
        $keysString = implode(", ",$keys);  //login, pass
        $valuesString = implode(", :",$keys);   //placeholders - login, :pass
        $sql = "INSERT INTO {$tableName} ({$keysString}) VALUES (:{$valuesString});";
        // var_dump($sql, $params);
        $this->db->execute($sql, $params);
    }

    public function delete() {

    }
    public function update() {

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}