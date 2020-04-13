<?php


namespace app\controllers;

use app\model\repositories\ProductRepository;

class CatalogController extends Controller
{
    public $productCount = 5;

    public function actionSelf() {
        echo $this->render('catalog', [
            'catalog' => (new ProductRepository())->getLimit(0, $this->productCount)
        ]);
    }

    public function actionCard($id) {

        (new ProductRepository())->updateViews($id);
        echo $this->render('card', [
            'product' => (new ProductRepository())->getOne($id)
        ]);
    }
}