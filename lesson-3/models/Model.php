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

    

    public function insert() 
    {
        $tableName = $this->getTableName();
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'db') {
                $params["$key"] = $value;
                $keys[] = $key;
            }
        }
        $keysString = implode(", ",$keys);  //      simple string -   login, pass
        $valuesString = implode(", :",$keys);   //  placeholders -    login, :pass
        $sql = "INSERT INTO {$tableName} ({$keysString}) VALUES (:{$valuesString});";
        $this->db->execute($sql, $params);
    }

    public function delete($id = null) 
    {
        if (is_null($id)) {
            $id = $this->db->getLastId();
            var_dump($id);
        }
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        $this->db->execute($sql, ['id' => $id]);
    }
    public function update($newValues = [])     // new values come in array
    {
        $tableName = $this->getTableName();
        $setString = '';
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'db') {
            $keys[] = $key . "=:" . $key;       // format keys:  keyName=:keyName
            $allKeys[] = $key;
            }
        }
        $allKeys[] = 'id';                  // params['id'] has to be at last position
        for ($i=0; $i<count($newValues); $i++) {
            $params["$allKeys[$i]"] = $newValues[$i]; 
        }
        $setString = implode(", ", $keys);      // sql string after SET
        if (empty($params['id'])) {
            $params['id'] = $this->db->getLastId();
        }
        $sql = "UPDATE {$tableName} SET {$setString} WHERE id = :id";
        $this->db->execute($sql, $params);
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