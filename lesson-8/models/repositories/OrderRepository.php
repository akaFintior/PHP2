<?php

namespace app\models\repositories;


use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function process($id) {
        $sql = "UPDATE `orders` SET `is_processed`=:is_processed WHERE id=:id";
        return App::call()->db->execute($sql, ['is_processed' => 1, 'id' => $id]);
    }
    public function getOrderSession($id)
    {
        $sql = "SELECT `session_id` FROM `orders` WHERE `id`=:id";
        return App::call()->db->queryOne($sql, ['id' => $id]);
    }
    public function getTableName()
    {
        return 'orders';
    }
    public function getEntityClass()
    {
        return Order::class;
    }
}