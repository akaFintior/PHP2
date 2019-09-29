<?php

namespace app\controllers;


use app\engine\Request;
use app\models\Basket;

class ApiController extends Controller
{
    public function actionAddBasket() {

        (new Basket(session_id(), (new Request())->getParams()['id']))->save();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionDeleteBasket() {

        Basket::deleteBasket(((new Request())->getParams()['id']), session_id());

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionClearBasket() {

        Basket::clearBasket(session_id());

        $response = [
            'result' => 1,
            'count' => 0
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}