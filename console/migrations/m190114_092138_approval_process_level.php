<?php

use yii\db\Migration;

/**
 * Class m190114_092138_approval_process_level
 */
class m190114_092138_approval_process_level extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%approval_process_level}}',[
            'id' => $this->primaryKey(11),
            'process_id' => $this->integer(11)->notNull(),
            'level_name' => $this->string(64)->notNull(),
            'level' => $this->integer(11)->notNull(),
            'approve_name' => $this->string(24),
            'approve_person' => $this->text(),//审批人
            'carbon_copy' => $this->text(),//抄送
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190114_092138_approval_process_level cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_092138_approval_process_level cannot be reverted.\n";

        return false;
    }
    */
}
