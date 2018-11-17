<?php
namespace common\modules\chat\widgets;


use common\modules\chat\assets\ChatAsset;
use Yii;

class Chat extends \yii\bootstrap\Widget
{
    public $port = 8080;
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->view->registerJsVar('wsPort', $this->port);
        ChatAsset::register($this->view);
        return $this->render('chat');
    }
}
