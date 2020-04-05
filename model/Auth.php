<?php


namespace app\model;

use app\engine\Db;
use http\Encoding\Stream\Debrotli;


class Auth extends DbModel
{
    public static function getTableName()
    {
        return "users";
    }

    public static function updateHash()
    {
        $hash = uniqid(rand(), true);
        $id = (int)$_SESSION['id'];
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET `hash` = :hash WHERE `users`.`id` = :id";
        Db::getInstance()->execute($sql, ["hash" => $hash, "id" => $id]);
        setcookie("hash", $hash, time() + 36000, '/');
    }

    public static function auth($login, $pass)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $passDb = Db::getInstance()->queryOne($sql, ["login" => $login]);
        if (password_verify($pass, $passDb['pass'])) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $passDb['id'];
            $_SESSION['role'] = $passDb['role'];
            return true;
        }
        return false;
    }

//    public function is_admin()
//    {
//        return ($_SESSION['role'] == 1) ? true : false;
//    }

    public static function is_auth()
    {
        if (isset($_COOKIE["hash"]) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE["hash"];
            $sql = "SELECT * FROM `users` WHERE `hash`=:hash";
            $user = Db::getInstance()->queryOne($sql, ["hash" => $hash])['login'];
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }
        return isset($_SESSION['login']);
    }


    public static function get_user()
    {
        return $_SESSION['login'];

    }
}