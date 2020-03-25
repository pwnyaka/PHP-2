<?php


namespace app\model;


class Order extends Model
{
    public $id;
    public $name;
    public $phone;
    public $login;
    public $status;

    public function getTableName()
    {
        return "orders";
    }
}