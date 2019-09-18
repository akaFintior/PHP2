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

    public function update($session_id, $product_id, $id = null) 
    {
        if (is_null($id)) {
            $id = $this->db->getLastId();
            var_dump($id);
        }
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET session_id = :session_id, product_id = :product_id WHERE id = :id";
        $this->db->execute($sql, ['session_id' => $session_id, 'product_id' => $product_id, 'id' => $id]);
    }
}