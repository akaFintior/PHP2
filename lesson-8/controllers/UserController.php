<?php


namespace app\controllers;

use app\engine\App;

class UserController extends Controller
{

    public function actionLogin() {
        if (isset(App::call()->request->getParams()['submit'])) {
            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            if (!(App::call()->userRepository->auth($login, $pass))) {
                Die("Не верный пароль!");
            } else {
                if (isset(App::call()->request->getParams()['save'])) {
                    App::call()->userRepository->makeHashAuth();
                }
            }
            header("Location: /");
            exit();
        }
    }
    public function actionLogout() {
        App::call()->session->sessionDestructor();
        setcookie("hash", "", time() - 3600, "/");
        header("Location: /");
        exit();
    }
}