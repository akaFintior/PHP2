<?php

namespace app\models;

use app\engine\Db;

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
        $id = $_SESSION['id'];
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `users`.`id` = :id";
        Db::getInstance()->execute($sql, ['hash' => $hash, 'id' => $id]);
        setcookie("hash", $hash, time() + 3600, "/");
    }

    public static function auth($login, $pass) {
        $user = static::getWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;
            return true;
        }
        return false;
    }

    public static function isAuth() {
        if (isset($_COOKIE["hash"])) {
            $hash = $_COOKIE["hash"];
            $user = static::getWhere('hash', $hash);
            $login = $user['login'];
            if (!empty($login)) {
                $_SESSION['login'] = $login;
            }
        }
        return isset($_SESSION['login']) ? true: false;
    }

    public static function getName() {
        return static::isAuth() ? $_SESSION['login'] : "Guest";
    }

}