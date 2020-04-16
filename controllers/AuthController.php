<?php


namespace app\controllers;

use app\engine\App;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (isset(App::call()->request->getParams()['send'])) {
            $login = App::call()->request->getParams()['login'];
            $pass = App::call()->request->getParams()['pass'];
            if (!App::call()->usersRepository->auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset(App::call()->request->getParams()['save'])) {
                    App::call()->usersRepository->updateHash();
                }
                header("Location:" . App::call()->request->getReferer());
            }
        }
    }

    public function actionLogout()
    {
        App::call()->session->regenerateSession();
        App::call()->session->destroySession();
        setcookie("hash", "", time() - 36000, '/');
        header("Location:/");
    }
}