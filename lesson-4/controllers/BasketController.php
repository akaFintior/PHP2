<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }

}