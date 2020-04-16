<?php


namespace app\controllers;

use app\engine\App;

class FeedbackController extends Controller
{
    public function actionSelf() {
        echo $this->render('feedback', [
            'feedback' => App::call()->feedbackRepository->getAll()
        ]);
    }
}