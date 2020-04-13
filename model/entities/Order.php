<?php


namespace app\model\entities;


use app\model\Model;

class Order extends Model
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
        'sum' => false,
        'session_id' => false
    ];

    public function __construct($name = null, $phone = null, $sum = null, $session_id = null, $login = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->sum = $sum;
        $this->session_id = $session_id;
        $this->login = $login;
    }
}