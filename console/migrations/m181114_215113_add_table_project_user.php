<?php

use yii\db\Migration;

/**
 * Class m181114_215113_add_table_project_user
 */
class m181114_215113_add_table_project_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project_user', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => 'ENUM("manager", "developer", "tester")'
        ]);

        $this->addForeignKey('fx_projectuser_user1', 'project_user', ['user_id'], 'user', ['id']);
        $this->addForeignKey('fx_projectuser_user2', 'project_user', ['project_id'], 'project', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project_user');
        $this->dropForeignKey('fx_projectuser_user1', 'project_user');
        $this->dropForeignKey('fx_projectuser_user2', 'project_user');
    }

}
