<?php

namespace app\models;

class Product extends DbModel
{
    public $id;
    public $name;
    public $description;
    public $price;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
    public function setName($name)
    {
        $this->name = $name;
        $this->state['name'] = true;
    }

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'name':
                return $this->name;
            case 'description':
                return $this->description;
            case 'price':
                return $this->price;
        }
    }
    public function setDescription($description)
    {
        $this->description = $description;
        $this->state['description'] = true;
    }
    public function setPrice($price)
    {
        $this->price = $price;
        $this->state['price'] = true;
    }
    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];

    public static function getTableName()
    {
        return 'products';
    }




}