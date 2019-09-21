<?php


namespace app\models;


class Basket extends Model
{
    public $id;
    public $session_id;
    public $product_id;

    public function __construct($login = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        parent::__construct();
    }

    public function getTableName() {
        return 'basket';
    }


}