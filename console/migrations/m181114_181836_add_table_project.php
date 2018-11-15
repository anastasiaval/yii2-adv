<?php

use yii\db\Migration;

/**
 * Class m181114_181836_add_table_project
 */
class m181114_181836_add_table_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()
        ]);

        $this->addForeignKey('fx_project_user1', 'project', ['created_by'], 'user', ['id']);
        $this->addForeignKey('fx_project_user2', 'project', ['updated_by'], 'user', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('project');
        $this->dropForeignKey('fx_project_user1', 'project');
        $this->dropForeignKey('fx_project_user2', 'project');
    }

}
