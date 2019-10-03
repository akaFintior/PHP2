<?php


namespace app\models\repositories;


use app\models\entities\Product;
use app\models\Repository;

class ProductRepository extends Repository
{
    public function setName($name)
    {
        $this->name = $name;
        $this->state['name'] = true;
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

    public function getTableName()
    {
        return 'products';
    }

    public function getEntityClass()
    {
        return Product::class;
    }
}