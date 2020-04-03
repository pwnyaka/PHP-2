<?php

namespace app\model;


class Product extends DbModel
{
    public $id;
    protected $prodName;
    protected $imgName;
    protected $description;
    protected $cost;

    protected $params = [
        'prodName' => false,
        'description' => false,
        'cost' => false
    ];

    public function __construct($prodName = null, $description = null, $cost = null, $imgName = 'default.jpg')
    {
        $this->prodName = $prodName;
        $this->description = $description;
        $this->cost = $cost;
        $this->imgName = $imgName;
    }

    public static function getTableName()
    {
        return "goods";
    }

}