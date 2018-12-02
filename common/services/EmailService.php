<?php

namespace common\services;

use common\models\Project;
use common\models\User;
use yii\base\Component;
use yii\base\Event;
use yii\BaseYii;

class EmailService extends Component
{
    public function send($viewHTML, $viewText, $data, $email, $subj) {
        \Yii::$app->mailer->compose(
            ['html' => $viewHTML, 'text' => $viewText],
            $data
        )
            ->setFrom([
                \Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'
            ])
            ->setTo($email)
            ->setSubject($subj)
            ->send();
    }
}