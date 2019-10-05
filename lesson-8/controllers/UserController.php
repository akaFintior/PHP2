<?php


namespace app\controllers;

use app\engine\Request;
use app\engine\Session;
use app\interfaces\IRenderer;
use app\models\repositories\UserRepository;
use app\models\User;

class UserController extends Controller
{

    public function actionLogin() {
        if (isset($this->request->getParams()['submit'])) {
            $login = $this->request->getParams()['login'];
            $pass = $this->request->getParams()['pass'];
            if (!(new UserRepository())->auth($login, $pass)) {
                Die("Не верный пароль!");
            } else {
                if (isset($this->request->getParams()['save'])) {
                    (new UserRepository())->makeHashAuth();
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