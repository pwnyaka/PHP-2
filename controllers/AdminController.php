<?php


namespace app\controllers;


use app\model\repositories\OrderRepository;
use app\model\repositories\UserRepository;

class AdminController extends Controller
{
    public function actionSelf()
    {
        if (!(new UserRepository())->isAdmin()) {
            die('Нет прав!!!');
        } else {
            echo $this->render('orders', [
                'orderList' => (new OrderRepository())->getAll()
            ]);
        }
    }
}