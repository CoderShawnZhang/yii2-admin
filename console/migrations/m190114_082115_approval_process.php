<?php

use yii\db\Migration;

/**
 * Class m190114_082115_approval_table
 */
class m190114_082115_approval_process extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%approval_process}}',[
            'id' => $this->primaryKey(11),
            'type_id' => $this->integer(11),
            'process_name' => $this->string(64)->notNull(),
            'process_desc' => $this->text(),
            'carbon_copy' => $this->text(),
            'creater' => $this->char(24),
            'modifier' => $this->char(24),
            'created' => $this->integer(11),
            'modified' => $this->integer(11),
            'isDel' => $this->tinyInteger(1),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190114_082115_approval_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_082115_approval_table cannot be reverted.\n";

        return false;
    }
    */
}
