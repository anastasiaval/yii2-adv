<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel frontend\models\search\TaskSearch */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                //'attribute' => common\models\Task::RELATION_PROJECT.' title',
                'attribute' => 'projectTitle',
                //'filter' => ,
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->project->title, ['view', 'id' => $model->id]);
                },
                'format' => 'html',
            ],
            'title',
            'description:ntext',
            'estimation',
            'executor_id',
            'started_at:datetime',
            'completed_at:datetime',
            [
                'attribute' => 'createdBy',
                'filter' => \common\models\User::find()->onlyActive(),
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->createdBy->username, ['user/view', 'id' => $model->createdBy->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updatedBy',
                'filter' => \common\models\User::find()->onlyActive(),
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->updatedBy->username, ['user/view', 'id' => $model->updatedBy->id]);
                },
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {take} {complete}',
                'buttons' => [
                    'take' => function ($url, \common\models\Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('hand-right');
                        return Html::a($icon, ['task/take', 'id' => $model->id], ['data' => [
                            'confirm' => 'Берёте задачу?',
                            'method' => 'post',
                        ],]);
                    },
                    'complete' => function ($url, \common\models\Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('ok');
                        return Html::a($icon, ['task/complete', 'id' => $model->id], ['data' => [
                            'confirm' => 'Хотите завершить задачу?',
                            'method' => 'post',
                        ],]);
                    },
                ],
                'visibleButtons' => [
                    'update' => function (\common\models\Task $model, $key, $index){
                        return Yii::$app->taskService->canManage($model->project, Yii::$app->user->identity);
                    },
                    'delete' => function (\common\models\Task $model, $key, $index){
                        return Yii::$app->taskService->canManage($model->project, Yii::$app->user->identity);
                    },
                    'take' => function (\common\models\Task $model, $key, $index){
                        return Yii::$app->taskService->canTake($model, Yii::$app->user->identity);
                    },
                    'complete' => function (\common\models\Task $model, $key, $index){
                        return Yii::$app->taskService->canComplete($model, Yii::$app->user->identity);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
