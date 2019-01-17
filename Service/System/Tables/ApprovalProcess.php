<?php

namespace Service\System\Tables;

use Service\Base\ActiveRecord;
use Yii;

/**
 * This is the model class for table "approval_process".
 *
 * @property int $id
 * @property int $type_id
 * @property string $process_name
 * @property string $process_desc
 * @property string $carbon_copy
 * @property string $creater
 * @property string $modifier
 * @property int $created
 * @property int $modified
 * @property int $isDel
 */
class ApprovalProcess extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%approval_process}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'created', 'modified','isDel'], 'integer'],
            [['process_name'], 'required'],
            [['process_desc', 'carbon_copy'], 'string'],
            [['process_name'], 'string', 'max' => 64],
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
            'type_id' => '类型Id',
            'process_name' => '流程名称',
            'process_desc' => '流程说明',
            'carbon_copy' => '抄送用户',
            'creater' => '创建人',
            'modifier' => '修改人',
            'created' => '创建时间',
            'modified' => '修改时间',
            'isDel' => '是否删除',
        ];
    }
}
