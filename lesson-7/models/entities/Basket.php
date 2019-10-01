<?php


namespace app\models\entities;



class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;

    public function __construct($session_id, $product_id)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }

}