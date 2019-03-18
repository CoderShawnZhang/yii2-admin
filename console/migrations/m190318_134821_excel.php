<?php

use yii\db\Migration;

/**
 * Class m190318_134821_excel
 */
class m190318_134821_excel extends Migration
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
        $this->createTable('{{%excel}}',[
            'id' => $this->primaryKey(11),
            'number' => $this->integer(10),
            'title' => $this->string(20),
            'age' => $this->integer(11),
            'importTime' => $this->integer(11),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190318_134821_excel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190318_134821_excel cannot be reverted.\n";

        return false;
    }
    */
}
