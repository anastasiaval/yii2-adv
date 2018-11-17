<?php

namespace common\modules\chat\controllers;

use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use yii\console\Controller;
use Ratchet\Server\IoServer;
use common\modules\chat\components\Chat;

/**
 * Default controller for the `chat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new Chat()
                )
            ),
            8080
        );
        echo 'start';
        $server->run();

    }
}
