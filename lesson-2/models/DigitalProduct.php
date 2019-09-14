<?php

namespace app\models;

final class DigitalProduct extends Product
{
    public $price;

    public function calculatePrice()
    {
        return $this->price = $price / 2;
    }
}