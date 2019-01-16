<?php

use yii\db\Migration;

/**
 * Class m190114_094034_approval_type
 */
class m190114_094034_approval_type extends Migration
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

        $this->createTable('{{%approval_type}}',[
            'id' => $this->primaryKey(11),
            'type_name' => $this->string(64),
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
        echo "m190114_094034_approval_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190114_094034_approval_type cannot be reverted.\n";

        return false;
    }
    */
}
