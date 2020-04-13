<?php


namespace app\controllers;


use app\model\entities\Basket;
use app\model\repositories\BasketRepository;
use app\model\repositories\ProductRepository;

class ApiController extends Controller
{
    public function actionShow() {
        $startFrom = $this->request->getParams()['startFrom'];
        echo json_encode((new ProductRepository())->getLimit($startFrom, 3));
        die();
    }

    public function actionBuy() {
        $id = (int) $this->request->getParams()['id'];
        $cost = (int) $this->request->getParams()['cost'];
        $basket = new Basket($cost, session_id(), $id);
        (new BasketRepository())->save($basket);
        echo json_encode([
            'status' => 'OK',
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
        ]);
        die();
    }

    public function actionDelete() {
        $id = (int) $this->request->getParams()['id'];
        $session = session_id();
        $basket = (new BasketRepository())->getOne($id);
        if ($session == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        }
        echo json_encode([
            'status' => 'OK',
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id()),
            'sum' => (new BasketRepository())->getSumWhere('session_id', session_id())
        ]);
        die();
    }
}