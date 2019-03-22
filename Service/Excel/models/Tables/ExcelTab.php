<?php

namespace Service\Excel\Models\Tables;

use Yii;

/**
 * This is the model class for table "{{%excel_tab}}".
 *
 * @property int $id
 * @property int $tapId
 * @property int $exportTime
 */
class ExcelTab extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%excel_tab}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tapId', 'exportTime'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tapId' => 'Tap ID',
            'exportTime' => 'Export Time',
        ];
    }
}
