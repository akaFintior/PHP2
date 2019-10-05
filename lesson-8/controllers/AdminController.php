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
}