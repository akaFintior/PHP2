<?php

namespace app\controllers;

use app\models\Product;

class BasketController extends Controller
{


    public function actionBasket() {
        $catalog = Product::getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }

}