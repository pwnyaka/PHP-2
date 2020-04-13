<?php


namespace app\controllers;

use app\model\repositories\FeedbackRepository;

class FeedbackController extends Controller
{
    public function actionSelf() {
        echo $this->render('feedback', [
            'feedback' => (new FeedbackRepository())->getAll()
        ]);
    }
}