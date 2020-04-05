<?php


namespace app\model;


class Order extends DbModel
{
    protected $id;
    protected $name;
    protected $phone;
    protected $login;
    protected $status;
    protected $sum;
    protected $session_id;

    protected $props = [
        'name' => false,
        'phone' => false,
        'login' => false,
        'status' => false,
        'sum' => false,
        'session_id' => false
    ];

    public function __construct($name = null, $phone = null, $login = null, $status = null, $sum = null, $session_id = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->login = $login;
        $this->status = $status;
        $this->sum = $sum;
        $this->session_id = $session_id;
    }

    public static function getTableName()
    {
        return "orders";
    }
}