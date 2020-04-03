<?php


namespace app\controllers;


use app\model\Product;

class ApiController extends Controller
{
    public function actionShow() {
        $postData = file_get_contents('php://input');
        $data = json_decode($postData, true);
        echo json_encode(Product::getLimit($data["startFrom"], 3));
        die();
    }
}