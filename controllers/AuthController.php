<?php


namespace app\controllers;

use app\model\repositories\UserRepository;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (isset($this->request->getParams()['send'])) {
            $login = $this->request->getParams()['login'];
            $pass = $this->request->getParams()['pass'];
            if (!(new UserRepository())->auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($this->request->getParams()['save'])) {
                    (new UserRepository())->updateHash();
                }
                header("Location:" . $this->request->getReferer());
            }
        }
    }

    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location:/");
    }
}