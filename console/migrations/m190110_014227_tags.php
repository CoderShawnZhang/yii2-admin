<?php

use yii\db\Migration;

/**
 * Class m190110_014227_tags
 */
class m190110_014227_tags extends Migration
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

        $this->createTable('{{%tags}}',[
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()->unique(),
            'color' => $this->string(10)->notNull(),
            'desc' => $this->string()->unique(),
            'objects' => $this->string(50)->notNull(),
            'status' => $this->integer()->notNull()->defaultValue(1),
            'creater' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull()
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190110_014227_tags cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190110_014227_tags cannot be reverted.\n";

        return false;
    }
    */
}
