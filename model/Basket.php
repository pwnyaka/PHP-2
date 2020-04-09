<?php


namespace app\model;


use app\engine\Db;

class Basket extends DbModel
{
    protected $id;
    protected $session_id;
    protected $good_id;
    protected $quantity;
    protected $cost;

    protected $props = [
        'session_id' => false,
        'good_id' => false,
        'quantity' => false,
        'cost' => false
    ];

    public function __construct($cost = null, $session_id = null, $good_id = null, $quantity = 1)
    {
        $this->cost = $cost;
        $this->session_id = $session_id;
        $this->good_id = $good_id;
        $this->quantity = $quantity;
    }

    public static function getBasket($session)
    {
        $sql = "SELECT g.id id_prod, b.id id_basket, g.prodName, g.description, g.cost FROM basket b, goods g
 WHERE b.good_id=g.id AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    public static function getTableName()
    {
        return "basket";
    }
}