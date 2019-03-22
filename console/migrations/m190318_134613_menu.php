<?php

use yii\db\Migration;

/**
 * Class m190318_134613_menu
 */
class m190318_134613_menu extends Migration
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
        $this->createTable('{{%menu}}',[
            'id' => $this->primaryKey(11),
            'name' => $this->string(128),
            'parent' => $this->integer(11),
            'route' => $this->string(225),
            'order' => $this->integer(11),
            'data' => $this->text(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190318_134613_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190318_134613_menu cannot be reverted.\n";

        return false;
    }
    */
}
