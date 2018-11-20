<?php

namespace frontend\modules\api\controllers;

use frontend\modules\api\models\Project;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;
//
/**
 * Default controller for the `api` module
 */
class ProjectController extends Controller
{
    public function actionIndex(){
        return new ActiveDataProvider([
            'query' => Project::find()
        ]);
    }

    public function actionView($id){
        return Project::findOne($id);
    }
    ///**
    // * Renders the index view for the module
    // * @return string
    // */
    //public function actionIndex()
    //{
    //    return $this->render('index');
    //}
}
