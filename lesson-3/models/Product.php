<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description =$description;
        $this->price = $price;
        parent::__construct();
    }

    public function getTableName()
    {
        return 'products';
    }

    public function update($name, $description, $price, $id = null) 
    {
        if (is_null($id)) {
            $id = $this->db->getLastId();
            var_dump($id);
        }
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET name = :name, description = :description, price = :price WHERE id = :id";
        $this->db->execute($sql, ['name' => $name, 'description' => $description, 'price' => $price, 'id' => $id]);
    }


}