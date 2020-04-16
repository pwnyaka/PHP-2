<?php


namespace app\model\repositories;


use app\engine\App;
use app\model\entities\Basket;
use app\model\Repository;

class BasketRepository extends Repository
{
    public function getTableName()
    {
        return "basket";
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

    public function getBasket($session)
    {
        $sql = "SELECT g.id id_prod, b.id id_basket, g.prodName, g.cost, g.imgName FROM basket b, goods g
 WHERE b.good_id=g.id AND session_id = :session";
        return App::call()->db->queryAll($sql, ['session' => $session]);
    }
}