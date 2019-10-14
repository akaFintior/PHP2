<?php


namespace app\engine;


use app\traits\Tsingletone;

class Session
{
    public function __construct()
    {
        session_start();
    }
    public function getId()
    {
        return session_id();
    }

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

    public function sessionDestructor()
    {
        session_destroy();
    }

    public function regenerate()
    {
        session_regenerate_id();
    }
}