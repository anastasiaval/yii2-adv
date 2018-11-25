<?php

use yii\db\Migration;

/**
 * Class m181125_084727_table_task_upd
 */
class m181125_084727_table_task_upd extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('task', 'project_id', $this->integer()->notNull()->after('estimation'));
        $this->addForeignKey('fx_task_project', 'task', ['project_id'], 'project', ['id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('task', 'project_id');
        $this->dropForeignKey('fx_task_project', 'task');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181125_084727_table_task_upd cannot be reverted.\n";

        return false;
    }
    */
}
