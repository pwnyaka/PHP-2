<?php


namespace app\model\example;


class RealProduct extends Product
{
    public function getSum()
    {
        return "Товар {$this->name} в кол-ве {$this->quantity} шт стоит " . $this->cost * $this->quantity . ' руб';
    }
}