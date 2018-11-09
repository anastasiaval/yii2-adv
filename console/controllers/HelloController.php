<?php
namespace console\controllers;
use yii\console\Controller;
use yii\console\ExitCode;
/**
 * This command echoes the first argument that you have entered.
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'Hello, world')
    {
        echo $message . "\n";
        return ExitCode::OK;
    }
}