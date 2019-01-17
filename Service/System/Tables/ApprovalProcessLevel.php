<?php

namespace Service\System\Tables;

use Yii;

/**
 * This is the model class for table "approval_process_level".
 *
 * @property int $id
 * @property int $process_id
 * @property string $level_name
 * @property int $level
 * @property int $approve_person
 * @property string $carbon_copy
 * @property string $approve_group
 */
class ApprovalProcessLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approval_process_level';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_id', 'level_name', 'level'], 'required'],
            [['process_id', 'level'], 'integer'],
            [['carbon_copy', 'approve_person'], 'string'],
            [['level_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_id' => '审批流程Id',
            'level_name' => '审批界别名称',
            'level' => '审批级别',
            'approve_person' => '审批人ids',
            'carbon_copy' => '抄送',
        ];
    }
}
