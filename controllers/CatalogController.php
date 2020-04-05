<?php


namespace app\controllers;

use app\model\Product;

class CatalogController extends Controller
{
    public $productCount = 5;

    public function actionSelf() {
        echo $this->render('catalog', [
            'catalog' => Product::getLimit(0, $this->productCount)
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        Product::updateViews($id);
        echo $this->render('card', [
            'product' => Product::getOne($id)
        ]);
    }


}