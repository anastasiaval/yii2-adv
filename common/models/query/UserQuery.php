<?php

namespace common\models\query;

use common\models\User;

/**
 * This is the ActiveQuery class for [[\common\models\User]].
 *
 * @see \common\models\User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /**
     * @return array
     */
    public function onlyActive()
    {
        return $this->select('username')->andWhere(['status' => User::STATUS_ACTIVE])->column();
    }
}
