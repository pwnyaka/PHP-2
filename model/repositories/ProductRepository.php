<?php


namespace app\model\repositories;


use app\engine\App;
use app\engine\Db;
use app\model\entities\Product;
use app\model\Repository;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "goods";

    }

    public function getEntityClass()
    {
        return Product::class;
    }

    public function updateViews($id)
    {
        $sql = "UPDATE goods SET views = views + 1 WHERE id = :id";
        if (!(App::call()->db->execute($sql, ["id" => $id])->rowCount())) throw new \Exception('Продукт не найден');
    }
}