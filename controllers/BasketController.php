<?php

namespace app\controllers;

use app\model\repositories\{BasketRepository, OrderRepository};

class BasketController extends Controller
{
    public function actionSelf()
    {
        $basket = (new BasketRepository())->getBasket(session_id());
        echo $this->render('basket', [
            'products' => $basket,
            'sum' => (new BasketRepository())->getSumWhere('session_id', session_id())
        ]);
    }

    public function actionOrder() {
        $sum = (new BasketRepository())->getSumWhere('session_id', session_id());
        $name = $this->request->getParams()['name'];
        $phone = $this->request->getParams()['phone'];
        (new OrderRepository())->makeOrder($name, $phone, $sum);
    }
}