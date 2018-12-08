<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Project;

/* @var $this yii\web\View */
/* @var $model common\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'active',
                'value' => Project::STATUS_LABELS[$model->active],
            ],
            [
                'attribute' => 'createdBy',
                'value' => $model->createdBy->username
            ],
            [
                'attribute' => 'updatedBy',
                'value' => $model->updatedBy->username
            ],
            //[
            //    'attribute' => 'Workers',
            //    'value' => implode(', ', array_map(function ($user) {
            //        return $user->username;
            //    }, $model->users))
            //],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <?php echo \yii2mod\comments\widgets\Comment::widget([
        'model' => $model,
    ]); ?>

</div>
