<?php

namespace common\services;

use common\models\Project;
use common\models\Task;
use common\models\User;
use common\models\ProjectUser;
use yii\base\Component;

class TaskService extends Component
{
    /**
     * @param Project $project
     * @param User $user
     * @return bool
     */
    public function canManage(Project $project, User $user) {
        return \Yii::$app->projectService->hasRole($project, $user, ProjectUser::ROLE_MANAGER);
    }

    /**
     * @param Task $task
     * @param User $user
     * @return bool
     */
    public function canTake(Task $task, User $user) {
        if (is_null($task->executor_id)) {
            return \Yii::$app->projectService->hasRole($task->project, $user, ProjectUser::ROLE_DEVELOPER);
        }
    }

    /**
     * @param Task $task
     * @param User $user
     * @return bool
     */
    public function canComplete(Task $task, User $user) {
        if ($user->id == $task->executor_id && is_null($task->completed_at)) {
            return true;
        }
    }

    /**
     * @param Task $task
     * @param User $user
     */
    public function takeTask(Task $task, User $user) {
        $task->executor_id = $user->id;
        $task->started_at = time();

        if ($task->save()) {
            \Yii::$app->session->setFlash('success', 'Успешно взяли');
        }
    }

    /**
     * @param Task $task
     */
    public function completeTask(Task $task) {
        $task->completed_at = time();

        if ($task->save()) {
            \Yii::$app->session->setFlash('success', 'Успешно завершили');
        }
    }

}