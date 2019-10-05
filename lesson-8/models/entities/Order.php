<?php


namespace app\models\entities;


class Order extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $adress;
    public $session_id;
    public $is_processed = false;
    public $state = [
        'name' => false,
        'phone' => false,
        'adress' => false,
        'session_id' => false
    ];


    public function __construct($name, $phone, $adress, $session_id)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->adress = $adress;
        $this->session_id = $session_id;
    }
}