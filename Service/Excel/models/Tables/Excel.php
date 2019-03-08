<?php

namespace Service\Excel\Models\Tables;

use Yii;

/**
 * This is the model class for table "{{%excel}}".
 *
 * @property int $id
 * @property int $number
 * @property string $title
 * @property int $age
 * @property int $importTime
 */
class Excel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%excel}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'age', 'importTime'], 'integer'],
            [['title'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'title' => 'Title',
            'age' => 'Age',
            'importTime' => 'Import Time',
        ];
    }
}
