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
 * @property string $approve_name
 * @property int $role
 * @property string $belong
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
            [['process_id', 'level_name', 'level', 'role'], 'required'],
            [['process_id', 'level', 'approve_person', 'role'], 'integer'],
            [['carbon_copy', 'approve_group'], 'string'],
            [['level_name'], 'string', 'max' => 64],
            [['approve_name'], 'string', 'max' => 24],
            [['belong'], 'string', 'max' => 36],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_id' => 'Process ID',
            'level_name' => 'Level Name',
            'level' => 'Level',
            'approve_person' => 'Approve Person',
            'approve_name' => 'Approve Name',
            'role' => 'Role',
            'belong' => 'Belong',
            'carbon_copy' => 'Carbon Copy',
            'approve_group' => 'Approve Group',
        ];
    }
}
