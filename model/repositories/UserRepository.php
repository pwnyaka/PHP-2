<?php


namespace app\model\repositories;


use app\engine\Db;
use app\engine\Session;
use app\model\entities\User;
use app\model\Repository;

class UserRepository extends Repository
{
    public function getTableName()
    {
        return "users";
    }

    public function getEntityClass()
    {
        return User::class;
    }

    public function updateHash()
    {
        $hash = uniqid(rand(), true);
        $id = (int)Session::getSession('id');
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET `hash` = :hash WHERE `users`.`id` = :id";
        Db::getInstance()->execute($sql, ["hash" => $hash, "id" => $id]);
        setcookie("hash", $hash, time() + 36000, '/');
    }

    public function auth($login, $pass)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $passDb = Db::getInstance()->queryOne($sql, ["login" => $login]);
        if (password_verify($pass, $passDb['pass'])) {
            Session::setSession('login', $login);
            Session::setSession('id', $passDb['id']);
            Session::setSession('role', $passDb['role']);
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return (Session::getSession('role') == 1) ? true : false;
    }

    public function isAuth()
    {
        if (isset($_COOKIE["hash"]) && is_null($this->getUser())) {
            $hash = $_COOKIE["hash"];
            $sql = "SELECT * FROM `users` WHERE `hash`=:hash";
            $user = Db::getInstance()->queryOne($sql, ["hash" => $hash])['login'];
            if (!empty($user)) {
                Session::setSession('login', $user);
            }
        }
        return !is_null($this->getUser());
    }


    public function getUser()
    {
        return Session::getSession('login');

    }
}