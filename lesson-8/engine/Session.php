<?php


namespace app\engine;


use app\traits\Tsingletone;

class Session
{
    public function __construct()
    {
        session_start();
    }

    use Tsingletone;

    public function getSession()
    {
        return $_SESSION;
    }

    public function getCookie()
    {
        return $_COOKIE;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

}