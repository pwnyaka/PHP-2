<?php


namespace app\controllers;


class IndexController extends Controller
{
    public function actionSelf() {
        echo $this->render('index');
    }
}