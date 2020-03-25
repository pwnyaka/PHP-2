<?php


namespace app\model;


class Basket extends Model
{
    public $id;
    public $session_id;
    public $good_id;
    public $quantity;

    public function getTableName()
    {
        return "basket";
    }
}