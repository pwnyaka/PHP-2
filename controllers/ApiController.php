<?php


namespace app\controllers;


use app\engine\App;
use app\model\entities\Basket;

class ApiController extends Controller
{
    public function actionShow()
    {
        $startFrom = App::call()->request->getParams()['startFrom'];
        echo json_encode(App::call()->productRepository->getLimit($startFrom, 3));
        die();
    }

    public function actionBuy()
    {
        $id = (int)App::call()->request->getParams()['id'];
        $cost = (int)App::call()->request->getParams()['cost'];
        $basket = new Basket($cost, session_id(), $id);
        App::call()->basketRepository->save($basket);
        echo json_encode([
            'status' => 'OK',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ]);
        die();
    }

    public function actionDelete()
    {
        $id = (int)App::call()->request->getParams()['id'];
        $session = session_id();
        $basket = App::call()->basketRepository->getOne($id);
        if ($session == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        }
        echo json_encode([
            'status' => 'OK',
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id()),
            'sum' => App::call()->basketRepository->getSumWhere('session_id', session_id())
        ]);
        die();
    }

    public function actionFilter()
    {
        if (!App::call()->usersRepository->isAdmin()) {
            die('Нет прав!!!');
        } else {
            $status = (int)App::call()->request->getParams()['status'];
            if ($status == 4) {
                echo json_encode([
                    'status' => 'OK',
                    'list' => App::call()->orderRepository->getAll()
                ]);
                die();
            } else {
                echo json_encode([
                    'status' => 'OK',
                    'list' => App::call()->orderRepository->getAllWhere('status', $status)
                ]);
                die();
            }
        }
    }

    public function actionControl()
    {
        if (!App::call()->usersRepository->isAdmin()) {
            die('Нет прав!!!');
        } else {
            $id = (int)App::call()->request->getParams()['id'];
            $newStatus = (int)App::call()->request->getParams()['status'] + 1;
            App::call()->orderRepository->changeOrderStatus($id, $newStatus);
            echo json_encode([
                'message' => 'Статус заказа обновлен!',
                'status' => App::call()->orderRepository->getOrderStatus($id)
            ]);
            die();

        }
    }
}