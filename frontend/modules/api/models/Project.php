<?php

namespace frontend\modules\api\models;

class Project extends \common\models\Project
{
    public function fields()
    {
        return [
            'title',
            'description'
        ];
    }

    public function extraFields()
    {
        return ['createdBy'];
    }
}