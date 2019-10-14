<?php

namespace app\controllers;


use app\engine\App;
use app\models\entities\Basket;
use app\models\entities\Order;


class ApiController extends Controller
{

    public function actionAddBasket() {

        App::call()->basketRepository->save(new Basket(
            App::call()->session->getId(),
            App::call()->request->getParams()['id'])
        );

        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', App::call()->session->getId())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionDeleteBasket() {

        App::call()->basketRepository->deleteBasket((App::call()->request->getParams()['id']), App::call()->session->getId());

        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', App::call()->session->getId()),
            'summ' => App::call()->basketRepository->summBasket(App::call()->session->getId())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionClearBasket() {

        App::call()->basketRepository->clearBasket(App::call()->session->getId());

        $response = [
            'result' => 1,
            'count' => 0
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    public function actionProcessOrder() {

        App::call()->orderRepository->process(App::call()->request->getParams()['id']);

        $response = [
            'result' => 1,
            'processed' => 'Да'
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}