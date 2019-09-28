<?php

namespace app\models;

use app\engine\Db;
use app\engine\Session;

class User extends DbModel
{
    public $id;
    public $login;
    public $pass;


    public static function getTableName() {
        return 'users';
    }
    public static function makeHashAuth() {
        $hash = uniqid(rand(), true);
        $session = Session::getInstance();
        $id = $session->getSession()['id'];
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `users`.`id` = :id";
        Db::getInstance()->execute($sql, ['hash' => $hash, 'id' => $id]);
        setcookie("hash", $hash, time() + 3600, "/");
    }

    public static function auth($login, $pass) {
        $user = static::getWhere('login', $login);
        if ($pass == $user->pass) {
            $session = Session::getInstance();
            $session->setSession('login', $login);
            $session->setSession('id', $user->id);
            return true;
        }
        return false;
    }

    public static function isAuth() {
        $session = Session::getInstance();
        if (isset($session->getCookie()["hash"])) {
            $hash = $session->getCookie()["hash"];
            $user = static::getWhere('hash', $hash);
            $login = $user->login;
            if (!empty($login)) {
                $session->setSession('login', $login);
            }
        }
        return isset($session->getSession()["login"]) ? true: false;
    }

    public static function getName() {
        $session = Session::getInstance();
        return static::isAuth() ? $session->getSession()['login'] : "Guest";
    }

}