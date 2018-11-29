<?php

use yii\db\Migration;

/**
 * Class m181128_144422_table_project_upd
 */
class m181128_144422_table_project_upd extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('project', 'active', $this->boolean()->after('description'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('project', 'active');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181128_144422_table_project_upd cannot be reverted.\n";

        return false;
    }
    */
}
