<?php


namespace app\controllers;


use app\model\Basket;

class BasketController extends Controller
{
    public function actionSelf()
    {
        $basket = Basket::getBasket(session_id());
        echo $this->render('basket', [
            'products' => $basket,
            'summ' => Basket::getSummWhere('session_id', session_id())
        ]);
    }
}