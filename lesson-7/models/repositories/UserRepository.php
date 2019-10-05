<?php


namespace app\models\repositories;


use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName()
    {
        return 'users';
    }


    public function makeHashAuth()
    {
        $hash = uniqid(rand(), true);
        $id = $this->session->getSession()['id'];
        $sql = "UPDATE `users` SET `hash` = :hash WHERE `users`.`id` = :id";
        $this->db->execute($sql, ['hash' => $hash, 'id' => $id]);
        setcookie("hash", $hash, time() + 3600, "/");
    }

    public function auth($login, $pass) {
        $user = $this->getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $this->session->setSession('login', $login);
            $this->session->setSession('id', $user->id);
            return true;
        }
        return false;
    }

    public function isAuth() {
        if (isset($this->session->getCookie()["hash"])) {
            $hash = $this->session->getCookie()["hash"];
            $user = $this->getWhere('hash', $hash);
            $login = $user->login;
            if (!empty($login)) {
                $this->session->setSession('login', $login);
            }
        }
        return isset($this->session->getSession()["login"]) ? true: false;
    }

    public function getName() {
        return $this->isAuth() ? $this->session->getSession()['login'] : "Guest";
    }

    public function getEntityClass()
    {
        return User::class;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        $this->state['login'] = true;
    }
    public function setPass($pass)
    {
        $this->pass = password_hash($pass, PASSWORD_DEFAULT);
        $this->state['pass'] = true;
    }

    public function getValue($valueOf)
    {
        switch ($valueOf) {
            case 'login':
                return $this->login;
            case 'pass':
                return $this->pass;
        }
    }
}