<?php


namespace app\controllers;


use app\engine\App;

class AdminController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('admin', [
            'orders' => App::call()->orderRepository->getAll(),
            'username' => App::call()->userRepository->getName()]);
    }
    public function actionOrder()
    {
        echo $this->render('order', [
            'order' => App::call()->orderRepository->getOne(App::call()->request->getParams()['id']),
            'products' => App::call()->basketRepository->getBasket(App::call()->orderRepository->getOrderSession(App::call()->request->getParams()['id'])["session_id"]),
            'summ' => App::call()->basketRepository->summBasket(App::call()->orderRepository->getOrderSession(App::call()->request->getParams()['id'])["session_id"])
        ]);
    }
}