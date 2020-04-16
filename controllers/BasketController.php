<?php

namespace app\controllers;

use app\engine\App;

class BasketController extends Controller
{
    public function actionSelf()
    {
        $basket = App::call()->basketRepository->getBasket(session_id());
        echo $this->render('basket', [
            'products' => $basket,
            'sum' => App::call()->basketRepository->getSumWhere('session_id', session_id())
        ]);
    }

    public function actionOrder() {
        $sum = App::call()->basketRepository->getSumWhere('session_id', session_id());
        $name = App::call()->request->getParams()['name'];
        $phone = App::call()->request->getParams()['phone'];
        App::call()->orderRepository->makeOrder($name, $phone, $sum);
    }
}