<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{

    public function getWere($name, $value) {

    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($this as $key => $value) {
            if ($key === "id" || $key === "state") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

//INSERT INTO `products`(`id`, `name`, `description`, `price`) VALUES (:name, ,[value-4])

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }
    public function update() {
        $tableName = static::getTableName();
        $setString = '';
        foreach ($this as $key => $value) {
            if ($key !== 'id' && $key !== 'state' && $this->state["$key"]) {
            $keys[] = $key . "=:" . $key;       // format keys:  keyName=:keyName
            $allKeys[] = $key;
            }
        }
        
        for ($i=0; $i<count($allKeys); $i++) {
            $changedValue = $allKeys[$i];
            $params["$allKeys[$i]"] = $this->getValue($changedValue);
        }
        $setString = implode(", ", $keys);      // sql string after SET
        $params['id'] = $this->id;
        $sql = "UPDATE {$tableName} SET {$setString} WHERE id = :id";
        Db::getInstance()->execute($sql, $params);
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }

    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getLimit($limit){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE 1 LIMIT ?";
        return Db::getInstance()->executeLimit($sql, $limit);
    }

}