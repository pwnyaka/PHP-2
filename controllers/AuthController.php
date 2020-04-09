<?php


namespace app\controllers;

use app\model\Auth;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (isset($this->request->getParams()['send'])) {
            $login = $this->request->getParams()['login'];
            $pass = $this->request->getParams()['pass'];
            if (!Auth::auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($this->request->getParams()['save'])) {
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