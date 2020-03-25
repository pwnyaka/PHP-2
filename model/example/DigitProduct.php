<?php


namespace app\model\example;


class DigitProduct extends RealProduct
{
    public function getSum()
    {
        $this->cost = $this->cost / 2;
        return parent::getSum();
    }
}