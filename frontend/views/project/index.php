<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel frontend\models\search\ProjectSearch */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'title',
                'value' => function (Project $model) {
                    return Html::a($model->title, ['view', 'id' => $model->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => Project::RELATION_PROJECT_USERS.'.role',
                'value' => function (Project $model) {
                    return join(', ', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'active',
                'filter' => Project::STATUS_LABELS,
                'value' => function (Project $model) {
                    return Project::STATUS_LABELS[$model->active];
                }
            ],
            'description:ntext',
            [
                'attribute' => 'created_by',
                'value' => function (Project $model) {
                    return Html::a($model->createdBy->username,
                        ['user/view', 'id' => $model->createdBy->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updated_by',
                'value' => function (Project $model) {
                    return Html::a($model->updatedBy->username,
                        ['user/view', 'id' => $model->updatedBy->id]);
                },
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
