<?php


namespace app\model\repositories;


use app\engine\Db;
use app\engine\Session;
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

    function makeOrder($name, $phone, $sum)
    {
        $session = session_id();
        $login = Session::getSession('login');
        $sql = "INSERT INTO {$this->getTableName()} (`name`, `phone`, `session_id`, `login`, `sum`) VALUES (:name,
 :phone, :session_id, :login, :sum)";
        $params = [
            "name" => $name,
            "phone" => $phone,
            "session_id" => $session,
            "login" => $login,
            "sum" => $sum
        ];
        if (!(Db::getInstance()->execute($sql, $params)->rowCount())) throw new \Exception('Ошибка при добавлении заказа');
        header("Location: /ok");
        session_regenerate_id();
    }
}