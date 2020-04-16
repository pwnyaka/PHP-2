<?php


namespace app\model\entities;


use app\model\Model;

class Basket extends Model
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


}