<?php


namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin() {
        if (isset($_POST['submit'])) {
            $request = Request::getInstance();
            $login = $request->getParams()['login'];
            $pass = $request->getParams()['pass'];
            if (!User::auth($login, $pass)) {
                Die("Не верный пароль!");
            } else {
                if (isset($_POST['save'])) {
                    User::makeHashAuth();
                }
            }
            header("Location: /");
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        setcookie("hash", "", time() - 3600, "/");
        header("Location: /");
        exit();
    }
}