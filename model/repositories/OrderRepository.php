<?php


namespace app\model\repositories;


use app\engine\App;
use app\model\entities\Order;
use app\model\Repository;

class OrderRepository extends Repository
{
    public function getTableName()
    {
        return "orders";
    }

    public function getEntityClass()
    {
        return Order::class;
    }

    public function makeOrder($name, $phone, $sum)
    {
        $session = session_id();
        $login = App::call()->session->getSession('login');
        $sql = "INSERT INTO {$this->getTableName()} (`name`, `phone`, `session_id`, `login`, `sum`) VALUES (:name,
 :phone, :session_id, :login, :sum)";
        $params = [
            "name" => $name,
            "phone" => $phone,
            "session_id" => $session,
            "login" => $login,
            "sum" => $sum
        ];
        if (!(App::call()->db->execute($sql, $params)->rowCount())) throw new \Exception('Ошибка при добавлении заказа');
        header("Location: /ok");
        App::call()->session->regenerateSession();
    }

    public function getOrderDetails($id)
    {
        $sql = "SELECT b.cost, g.prodName, g.imgName, g.id FROM goods g, basket b, orders o WHERE o.id = :id AND o.session_id = b.session_id AND b.good_id = g.id";
        return App::call()->db->queryAll($sql, ['id' =>$id]);
    }

    public function changeOrderStatus($id, $status) {
        $sql = "UPDATE `{$this->getTableName()}` SET `status` = :status WHERE `id` = :id";
        App::call()->db->execute($sql, ["id" => $id, "status" => $status]);
    }

    public function getOrderStatus($id) {
        $sql = "SELECT status FROM {$this->getTableName()} WHERE id=:id";
        return App::call()->db->queryOne($sql, ["id" => $id])['status'];
    }
}