<?php

namespace Service\Price\Models\Tables;

use Service\Base\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%earnest_price}}".
 *
 * @property int $id
 * @property string $name
 * @property int $cateId
 * @property string $earnest
 * @property string $unit
 * @property int $isDel
 * @property string $creater
 * @property int $created
 * @property string $modifier
 * @property int $modified
 * @property int $version
 */
class EarnestPrice extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%earnest_price}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cateId', 'isDel', 'created', 'modified', 'version'], 'integer'],
            [['earnest'], 'number'],
            [['name'], 'string', 'max' => 30],
            [['unit'], 'string', 'max' => 20],
            [['creater', 'modifier'], 'string', 'max' => 24],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'cateId' => 'Cate ID',
            'earnest' => 'Earnest',
            'unit' => 'Unit',
            'isDel' => 'Is Del',
            'creater' => 'Creater',
            'created' => 'Created',
            'modifier' => 'Modifier',
            'modified' => 'Modified',
            'version' => 'Version',
        ];
    }
}
