<?php

use yii\db\Migration;

/**
 * Class m190318_134943_excel_tab
 */
class m190318_134943_excel_tab extends Migration
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
        $this->createTable('{{%excel_tab}}',[
            'id' => $this->primaryKey(11),
            'exportTime' => $this->integer(11),
            'tabName' => $this->string(20),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190318_134943_excel_tab cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190318_134943_excel_tab cannot be reverted.\n";

        return false;
    }
    */
}
