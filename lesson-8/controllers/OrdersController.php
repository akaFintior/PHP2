<?php


namespace app\controllers;


use app\engine\App;
use app\models\entities\Order;

class OrdersController extends Controller
{
    public function actionPlaceOrder() {
        if (isset(App::call()->request->getParams()['send'])) {
            App::call()->orderRepository->save(new Order(
                App::call()->request->getParams()['name'],
                App::call()->request->getParams()['phone'],
                App::call()->request->getParams()['adress'],
                App::call()->session->getId())
            );
            header("Location: /");
            App::call()->session->regenerate();
            exit;
        }
    }
}