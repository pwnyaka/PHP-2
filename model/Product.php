<?php

namespace app\model;


class Product extends Model
{
    public $id;
    public $prodName;
    public $description;
    public $cost;

    public function __construct($prodName = null, $description = null, $cost = null)
    {
        $this->prodName = $prodName;
        $this->description = $description;
        $this->cost = $cost;
    }

    public function getTableName()
    {
        return "goods";
    }

}