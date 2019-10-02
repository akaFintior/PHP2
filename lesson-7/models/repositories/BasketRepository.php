<?php


namespace app\models\repositories;


use app\engine\Db;
use app\models\entities\Basket;
use app\models\Repository;

class BasketRepository extends Repository
{

    public function getBasket($session)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.session_id FROM basket b,products p WHERE b.product_id=p.id AND session_id = :session";
        return $this->db->queryAll($sql, ['session' => $session]);
    }

    public function deleteBasket($id, $session)
    {
        $sql = "DELETE FROM basket WHERE id = :id AND session_id = :session";
        return $this->db->execute($sql, ['id' => $id, 'session' => $session]);
    }

    public function clearBasket($session)
    {
        $sql = "DELETE FROM basket WHERE session_id = :session";
        return $this->db->execute($sql, ['session' => $session]);
    }
    function summBasket($session) {
        $sql = "SELECT SUM(p.price) as summ FROM basket b, products p WHERE b.product_id=p.id AND `session_id` =:session";
        return $this->db->queryAll($sql, ['session' => $session])['summ'];
    }

    public function getTableName()
    {
        return 'basket';
    }
    public function getEntityClass()
    {
        return Basket::class;
    }
}