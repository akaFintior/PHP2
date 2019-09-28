<?php


namespace app\engine;


use app\traits\Tsingletone;

class Session
{
    protected $session;
    protected $cookie;

    public function __construct()
    {
        $this->session = $_SESSION;
        $this->cookie = $_COOKIE;
    }

    use Tsingletone;

    public function getSession()
    {
        return $this->session;
    }

    public function getCookie()
    {
        return $this->cookie;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }
}