<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/17
 * Time: 下午2:32
 */

namespace Service\System\Querys;

use Service\System\Models\ApprovalTypeModel;
use yii\db\ActiveQuery;

class ApprovalTypeQuery extends ActiveQuery
{
    public $tableName;
    public $isDel;

    public function notDel()
    {
        $this->isDel = ApprovalTypeModel::NO_DEL;
        return $this->andWhere([ApprovalTypeModel::tableName().'.isDel' => $this->isDel]);
    }

    public function isDel()
    {
        $this->isDel = ApprovalTypeModel::IS_DEL;
        return $this->andWhere([ApprovalTypeModel::tableName().'.isDel' => $this->isDel]);
    }
}