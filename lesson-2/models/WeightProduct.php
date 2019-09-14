<?php

namespace app\models;

final class WeightProduct extends Product
{
    public $weight;
    public $priceForKg;

    public function calculatePrice()
    {
        return $this->price = $priceForKg * $weight;
    }
}