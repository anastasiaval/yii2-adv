<?php
namespace backend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class TestController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return 'Hello, world';
    }

}
