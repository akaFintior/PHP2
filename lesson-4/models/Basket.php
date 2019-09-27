<?php


namespace app\models;


class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    public static function getTableName() {
        return 'basket';
    }

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'session_id':
                return $this->session_id;
            case 'product_id':
                return $this->product_id;
        }
    }

    public function setSession_id($session_id) 
    {
        $this->session_id = $session_id;
        $this->state['session_id'] = true;
    }
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;
        $this->state['product_id'] = true;
    }


    public $state = [
        'session_id' => false,
        'product_id' => false,
    ];
}