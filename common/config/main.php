<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'projectService' => [
            'class' => \common\services\ProjectService::class,
            'on '.\common\services\ProjectService::EVENT_ASSIGN_ROLE => function( \common\services\AssignRoleEvent $event) {
                $data = ['project' => $event->project, 'user' => $event->user, 'role' => $event->role];
                Yii::$app->emailService->send(
                    'assign-role-html',
                    'assign-role-text',
                    $data,
                    $event->user->email,
                    'Your role has been changed'
                );
            }
        ],
        'emailService' => [
            'class' => \common\services\EmailService::class
        ],
    ],
];
