<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $products = [];
    public $totalPrice;
    public $name;
    public $adress;


    public function getTableName()
    {
        return 'orders';
    }

}