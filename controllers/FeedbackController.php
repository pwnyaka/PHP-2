<?php


namespace app\controllers;

use app\model\Feedback;

class FeedbackController extends Controller
{
    public function actionSelf() {
        echo $this->render('feedback', [
            'feedback' => Feedback::getAll()
        ]);
    }
}