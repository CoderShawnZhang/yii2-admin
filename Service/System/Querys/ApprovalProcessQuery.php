<?php

namespace Service\System\Querys;
use Service\System\Models\ApprovalProcessModel;

/**
 * This is the ActiveQuery class for [[ApprovalProcess]].
 *
 * @see ApprovalProcess
 */
class ApprovalProcessQuery extends \yii\db\ActiveQuery
{
    public $tableName;
    public $isDel;

    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ApprovalProcess[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ApprovalProcess|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function notDel()
    {
        $this->isDel = 1;
        return $this->andWhere([ApprovalProcessModel::tableName().'.isDel' => $this->isDel]);
    }

    public function isDel()
    {

    }
}
