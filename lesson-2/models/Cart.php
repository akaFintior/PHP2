<?php

namespace app\models;

class Cart extends Model
{
    public $id;
    public $products = [];
    public $totalPrice;
    public $isOrdered = false;

    public function getTableName()
    {
        return 'cart';
    }
   
    public function cartTotal($products){

    }
    public function cartOrder($id){
        $this->isOrdered = true;
    } 

}