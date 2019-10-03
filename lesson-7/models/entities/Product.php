<?php

namespace app\models\entities;

class Product extends DataEntity
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];

    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


}