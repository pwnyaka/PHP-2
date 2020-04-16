<?php


namespace app\controllers;


use app\engine\App;

class OrdersController extends Controller
{
    public function actionSelf()
    {
        if (!App::call()->usersRepository->isAdmin()) {
            die('Нет прав!!!');
        } else {
            echo $this->render('orders', [
                'orderList' => App::call()->orderRepository->getAll()
            ]);
        }
    }


    public function actionDetails($id)
    {
        if (!App::call()->usersRepository->isAdmin()) {
            die('Нет прав!!!');
        } else {
            echo $this->render('order-details', [
                'list' => App::call()->orderRepository->getOrderDetails($id),
                'order' => App::call()->orderRepository->getOne($id)
            ]);
        }
    }
}