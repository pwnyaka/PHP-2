<?php


namespace app\model;


class Order extends Model
{
    public $id;
    public $name;
    public $phone;
    public $login;
    public $status;
    public $sum;
    public $session_id;

    public function __construct($name = null, $phone = null, $login = null, $status = null, $sum = null, $session_id = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->login = $login;
        $this->status = $status;
        $this->sum = $sum;
        $this->session_id = $session_id;
    }

    public function getTableName()
    {
        return "orders";
    }
}