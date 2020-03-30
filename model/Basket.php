<?php


namespace app\model;


class Basket extends Model
{
    public $id;
    public $session_id;
    public $good_id;
    public $quantity;

    public function __construct($session_id = null, $good_id = null, $quantity = null)
    {
        $this->session_id = $session_id;
        $this->good_id = $good_id;
        $this->quantity = $quantity;
    }

    public function getTableName()
    {
        return "basket";
    }
}