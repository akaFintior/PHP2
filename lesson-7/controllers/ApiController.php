<?php

namespace app\controllers;


use app\engine\Request;
use app\interfaces\IRenderer;
use app\models\entities\Basket;
use app\models\repositories\BasketRepository;

class ApiController extends Controller
{

    public function actionAddBasket() {

        (new BasketRepository())->save(new Basket(session_id(), $this->request->getParams()['id']));

        $response = [
            'result' => 1,
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionDeleteBasket() {

        (new BasketRepository())->deleteBasket(($this->request->getParams()['id']), session_id());

        $response = [
            'result' => 1,
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
            'summ' => (new BasketRepository())->summBasket(session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionClearBasket() {

        (new BasketRepository())->clearBasket(session_id());

        $response = [
            'result' => 1,
            'count' => 0
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}