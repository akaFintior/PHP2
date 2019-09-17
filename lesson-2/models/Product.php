<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $unitPrice;
    public $quantity;
    public $price;

    public function getTableName()
    {
        return 'product';
    }

    public function calculatePrice()
    {
        return $this->price = $unitPrice * $quantity;
    }

}