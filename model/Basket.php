<?php


namespace app\model;


class Basket extends DbModel
{
    protected $id;
    protected $session_id;
    protected $good_id;
    protected $quantity;

    protected $props = [
        'session_id' => false,
        'good_id' => false,
        'quantity' => false
    ];

    public function __construct($session_id = null, $good_id = null, $quantity = null)
    {
        $this->session_id = $session_id;
        $this->good_id = $good_id;
        $this->quantity = $quantity;
    }

    public static function getTableName()
    {
        return "basket";
    }
}