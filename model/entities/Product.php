<?php

namespace app\model\entities;


use app\model\Model;

class Product extends Model
{
    protected $id;
    protected $prodName;
    protected $imgName;
    protected $description;
    protected $cost;
    protected $views;

    protected $props = [
        'prodName' => false,
        'description' => false,
        'cost' => false,
        'imgName' => false
    ];

    public function __construct($prodName = null, $description = null, $cost = null, $imgName = 'default.jpg')
    {
        $this->prodName = $prodName;
        $this->description = $description;
        $this->cost = $cost;
        $this->imgName = $imgName;
    }
}