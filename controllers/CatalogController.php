<?php


namespace app\controllers;

use app\engine\App;

class CatalogController extends Controller
{
    public $productCount = 5;

    public function actionSelf() {
        echo $this->render('catalog', [
            'catalog' => App::call()->productRepository->getLimit(0, $this->productCount)
        ]);
    }

    public function actionCard($id) {

        App::call()->productRepository->updateViews($id);
        echo $this->render('card', [
            'product' => App::call()->productRepository->getOne($id)
        ]);
    }
}