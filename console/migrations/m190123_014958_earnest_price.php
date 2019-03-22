<?php

use yii\db\Migration;

/**
 * Class m190123_014958_earnest_price
 */
class m190123_014958_earnest_price extends Migration
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
        $this->createTable('{{%earnest_price}}',[
            'id' => $this->primaryKey(11),
            'name' => $this->string(30),
            'cateId' => $this->integer(6),
            'earnest' => $this->decimal(10,2),
            'unit' => $this->string(20),
            'isDel' => $this->tinyInteger(1),
            'creater' => $this->string(24),
            'created' => $this->integer(11),
            'modifier' => $this->string(24),
            'modified' => $this->integer(24),
            'version' => $this->integer(11),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190123_014958_earnest_price cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190123_014958_earnest_price cannot be reverted.\n";

        return false;
    }
    */
}
