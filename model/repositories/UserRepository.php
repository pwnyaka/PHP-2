<?php


namespace app\model\repositories;


use app\engine\App;
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
        $id = (int)App::call()->session->getSession('id');
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET `hash` = :hash WHERE `users`.`id` = :id";
        App::call()->db->execute($sql, ["hash" => $hash, "id" => $id]);
        setcookie("hash", $hash, time() + 36000, '/');
    }

    public function auth($login, $pass)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $passDb = App::call()->db->queryOne($sql, ["login" => $login]);
        if (password_verify($pass, $passDb['pass'])) {
            App::call()->session->setSession('login', $login);
            App::call()->session->setSession('id', $passDb['id']);
            App::call()->session->setSession('role', $passDb['role']);
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        return (App::call()->session->getSession('role') == 1) ? true : false;
    }

    public function isAuth()
    {
        if (isset($_COOKIE["hash"]) && is_null($this->getUser())) {
            $hash = $_COOKIE["hash"];
            $sql = "SELECT * FROM `users` WHERE `hash`=:hash";
            $user = App::call()->db->queryOne($sql, ["hash" => $hash])['login'];
            if (!empty($user)) {
                App::call()->session->setSession('login', $user);
            }
        }
        return !is_null($this->getUser());
    }


    public function getUser()
    {
        return App::call()->session->getSession('login');

    }
}