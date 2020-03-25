<?php


namespace app\model\example;


class WeightProduct extends Product
{
    public $weight;
    static $discount;


    public function __construct($name = null, $weight = null, $cost = null)
    {
        $this->weight = $weight;
        $this->name = $name;
        $this->cost = $cost;
    }


    public function getSum()
    {
        switch ($this->weight) {
            case ($this->weight < 1):
                static::$discount = 0;
                break;

            case ($this->weight < 10 && $this->weight >= 1):
                static::$discount = 15;
                break;

            case ($this->weight < 100 && $this->weight >= 10):
                static::$discount = 30;
                break;

            case ($this->weight > 100):
                static::$discount = 40;
                break;
        }
        return "Стоимость товара {$this->name} за {$this->weight} кг составляет:" .
            $this->cost * $this->weight * (1 - static::$discount / 100) . " руб. Cкидка:" . static::$discount . "%";
    }
}