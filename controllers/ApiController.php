<?php


namespace app\controllers;


use app\model\Basket;
use app\model\Product;

class ApiController extends Controller
{
    public function actionShow() {
        $startFrom = $this->request->getParams()['startFrom'];
        echo json_encode(Product::getLimit($startFrom, 3));
        die();
    }

    public function actionBuy() {
        $id = (int) $this->request->getParams()['id'];
        $cost = (int) $this->request->getParams()['cost'];
        (new Basket($cost, session_id(), $id))->save();
        echo json_encode([
            'status' => 'OK',
            'count' => Basket::getCountWhere('session_id', session_id())
        ]);
        die();
    }

    public function actionDelete() {
        $id = (int) $this->request->getParams()['id'];
        (Basket::getOne($id))->delete();
        echo json_encode([
            'status' => 'OK',
            'count' => Basket::getCountWhere('session_id', session_id()),
            'summ' => Basket::getSummWhere('session_id', session_id())
        ]);
        die();
    }
}