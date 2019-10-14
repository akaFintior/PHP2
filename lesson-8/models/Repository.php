<?php
namespace app\models;

use app\engine\App;


/**
 * Class Model
 * @package app\models
 */

abstract class Repository extends Models
{


    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getLimit($from, $to) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return App::call()->db->queryLimit($sql, $from, $to);
}

    public function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:field";
        return App::call()->db->queryObject($sql, ["field"=>$value], static::class);
    }

    public function insert($entity) {
        $params = [];
        $columns = [];
        $tableName = $this->getTableName();
        foreach ($entity as $key => $value) {
            if ($key === "id" || $key === "state") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }

    public function delete($entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }
    public function update($entity) {
        $tableName = $this->getTableName();
        $allKeys = [];
        $setString = '';
        foreach ($entity as $key => $value) {
            if ($key !== 'id' && $key !== 'state' && $entity->state["$key"]) {
                $keys[] = $key . "=:" . $key;       // format keys:  keyName=:keyName
                $allKeys[] = $key;
            }
        }
        foreach ($allKeys as $someKey ) {
            $changedValue = $someKey;
            $params["$someKey"] = $entity->getValue($changedValue);
        }
        $setString = implode(", ", $keys);      // sql string after SET
        $params['id'] = $entity->id;
        $sql = "UPDATE {$tableName} SET {$setString} WHERE id = :id";
        App::call()->db->execute($sql, $params);
    }

    public function save($entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], static::class);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }

}