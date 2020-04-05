<?php


namespace app\controllers;

use app\model\Auth;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (isset($_POST['send'])) {
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!Auth::auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    Auth::updateHash();
                }
                header("Location:" . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function actionLogout()
    {
        session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location: /");
    }
}