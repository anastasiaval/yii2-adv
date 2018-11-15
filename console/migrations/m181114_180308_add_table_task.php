<?php

use yii\db\Migration;

/**
 * Class m181114_180308_add_table_task
 */
class m181114_180308_add_table_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'estimation' => $this->integer()->notNull(),
            'executor_id' => $this->integer(),
            'started_at' => $this->integer(),
            'completed_at' => $this->integer(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fx_task_user1', 'task', ['executor_id'], 'user', ['id']);
        $this->addForeignKey('fx_task_user2', 'task', ['created_by'], 'user', ['id']);
        $this->addForeignKey('fx_task_user3', 'task', ['updated_by'], 'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('task');
        $this->dropForeignKey('fx_task_user1', 'task');
        $this->dropForeignKey('fx_task_user2', 'task');
        $this->dropForeignKey('fx_task_user3', 'task');
    }

}
