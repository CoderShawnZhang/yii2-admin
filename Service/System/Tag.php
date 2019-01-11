<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:41
 */

namespace Service\System;

use Service\Exception\SaveException;
use Service\System\Models\TagModel;
use admin\components\widgets\EditableColumn;
use admin\Widgets\ActionColumn;
use yii\helpers\Url;
use Service\Base\Service;

class Tag extends Service
{
    /**
     * @return array
     */
    public static function tagColumns()
    {
        $deleteUrl = Url::toRoute(['delete']);
        $columns = [
            ActionColumn::deleteColumn($deleteUrl),
            EditableColumn::textColumn('name'),
            EditableColumn::colorColumn('color', ['options' => ['options' => ['readOnly' => true]]]),
            EditableColumn::textColumn('objects'),
            EditableColumn::textColumn('desc'),
        ];
        return $columns;
    }
    /**
     * @param $id
     * @param $data
     * @return mixed
     * @throws SaveException
     * @throws \Service\Exception\NotFoundException
     */
    public static function edit($id,$data)
    {
        $model = TagModel::findOneOrFailed(['id' => $id]);
        if(!$model->load($data,'') || !$model->save()) {
            throw new SaveException($model->getErrorStr());
        }
        return $model;
    }
}