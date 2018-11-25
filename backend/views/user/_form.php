<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form \yii\bootstrap\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2'
            ]
        ],
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'status')->dropDownList(\common\models\User::STATUS_LABELS) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image\*'])
        ->label(Html::img($model->getThumbUploadUrl('avatar', \common\models\User::AVATAR_PREVIEW))) ?>

    <div class="form-group row">
        <div class="col-sm-offset-2">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
