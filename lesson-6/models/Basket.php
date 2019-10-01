<?php


namespace app\models;


use app\engine\Db;

class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;

    /**
     * Basket constructor.
     * @param $session_id
     * @param $product_id
     */
    public function __construct($session_id, $product_id)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
    }


    public static function getTableName()
    {
        return 'basket';
    }


    public static function getBasket($session)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.session_id FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
    public static function deleteBasket($id, $session)
    {
        $sql = "DELETE FROM basket WHERE id = :id AND session_id = :session";
        return Db::getInstance()->execute($sql, ['id' => $id, 'session' => $session]);
    }
    public static function clearBasket($session)
    {
        $sql = "DELETE FROM basket WHERE session_id = :session";
        return Db::getInstance()->execute($sql, ['session' => $session]);
    }
}