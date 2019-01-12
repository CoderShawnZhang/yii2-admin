<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/11
 * Time: 下午3:41
 */

namespace Service\System;

use Service\Base\Exception;
use Service\Exception\SaveException;
use Service\System\Models\Search\TagSearch;
use Service\System\Models\TagModel;
use admin\components\widgets\EditableColumn;
use admin\Widgets\ActionColumn;
use ToastPack\Toast;
use yii\helpers\Url;
use Service\Base\Service;

class Tag extends Service
{
    public static $query;
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
            EditableColumn::select2Column('objectsArray',[1,2,3,4,5,6,7,8]),
            EditableColumn::textColumn('desc'),
            EditableColumn::dateColumn('created_at'),
        ];
        return $columns;
    }

    /**
     * @param array $condition
     * @return TagSearch
     * @throws Exception
     */
    public static function getList($condition = [])
    {
        try{
            $tagModel = new TagModel();
            return $tagModel->getSearchModel($condition);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }

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

    /**
     * @param $data
     * @return TagModel
     * @throws SaveException
     */
    public static function create($data)
    {
        $model = new TagModel();
        if(!$model->load($data,'') || !$model->save()){
            throw new SaveException($model->getErrorStr());
        }
        return $model;
    }
}