<?php
namespace app\model\example;

abstract class Product
{
    public $name;
    public $quantity;
    public $cost;


    public function __construct($name = null, $quantity = null, $cost = null)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->cost = $cost;
    }

    public abstract function getSum();

}