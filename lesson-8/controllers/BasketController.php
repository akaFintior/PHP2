<?php


namespace app\controllers;

use app\engine\App;

class BasketController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('basket', [
            'products' => App::call()->basketRepository->getBasket(App::call()->session->getId()),
            'summ' => App::call()->basketRepository->summBasket(App::call()->session->getId())]);
    }
}