<?php


namespace app\models\entities;



class Basket extends DataEntity
{
    public $id;
    public $session_id;
    public $product_id;
    public $state = [
        'session_id' => false,
        'product_id' => false
    ];

    public function __construct($session_id, $product_id)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
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

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'session_id':
                return $this->session_id;
            case 'product_id':
                return $this->product_id;
        }
    }
}