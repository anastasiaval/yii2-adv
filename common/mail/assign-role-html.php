<?php

use yii\helpers\Html;

/* @var $user common\models\User */
/* @var $project common\models\Project */
/* @var $role string */

?>
<b> Hello <?=$user->username ?></b>
<p>New role in project <?= $project->title ?> is <?= $role ?>.</p>