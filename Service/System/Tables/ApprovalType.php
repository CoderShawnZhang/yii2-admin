<?php

namespace Service\System\Tables;

use Service\Base\ActiveRecord;
use Yii;

/**
 * This is the model class for table "approval_type".
 *
 * @property int $id
 * @property string $type_name
 * @property string $creater
 * @property string $modifier
 * @property int $created
 * @property int $modified
 * @property int $isDel
 */
class ApprovalType extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%approval_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'modified', 'isDel'], 'integer'],
            [['type_name'], 'string', 'max' => 64],
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
            'type_name' => 'Type Name',
            'creater' => 'Creater',
            'modifier' => 'Modifier',
            'created' => 'Created',
            'modified' => 'Modified',
            'isDel' => 'Is Del',
        ];
    }
}
