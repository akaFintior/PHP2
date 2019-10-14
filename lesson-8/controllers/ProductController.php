<?php

namespace app\controllers;

use app\engine\App;


class ProductController extends Controller
{


    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $catalog = App::call()->productRepository->getAll();
        echo $this->render('catalog', ['catalog' => $catalog]);
    }


    public function actionCard() {
        $id = App::call()->request->getParams()['id'];
        $product = App::call()->productRepository->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }



}