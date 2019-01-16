<?php

namespace Service\System\Tables;

use Yii;

/**
 * This is the model class for table "approval_process".
 *
 * @property int $id
 * @property int $type_id
 * @property string $type_name
 * @property string $process_name
 * @property string $process_desc
 * @property string $carbon_copy
 * @property string $creater
 * @property string $modifiler
 * @property int $created
 * @property int $modified
 * @property int $isDel
 */
class ApprovalProcess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_process';
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
            [['type_name', 'process_name'], 'string', 'max' => 64],
            [['creater', 'modifiler'], 'string', 'max' => 24],
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
            'type_name' => '类型名称',
            'process_name' => '流程名称',
            'process_desc' => '流程说明',
            'carbon_copy' => '抄送用户',
            'creater' => '创建人',
            'modifiler' => '修改人',
            'created' => '创建时间',
            'modified' => '修改时间',
            'isDel' => '是否删除',
        ];
    }
}
