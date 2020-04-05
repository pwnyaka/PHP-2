<?php

namespace app\model;


use app\engine\Db;

class Product extends DbModel
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

    public static function getTableName()
    {
        return "goods";
    }

    public static function updateViews($id)
    {
        $sql = "UPDATE goods SET views = views + 1 WHERE id = :id";
        Db::getInstance()->execute($sql, ["id" => $id]);
    }

}