<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/1/16
 * Time: 下午5:32
 */

namespace Service\System\Modules;

use Service\System\Models\ApprovalProcessLevelModel;

class ApprovalProcessLevelModule
{
    public function getList($condition = [])
    {
        return ApprovalProcessLevelModel::getList($condition);
    }

    /**
     * @param $data
     * @param $processId
     * @throws \Service\Base\Exception
     */
    public function add($data,$processId)
    {
        if(!empty($data) && is_array($data)){
             foreach($data['sub_process']['level_name'] as $key => $val){
                $ApprovalProcessLevel = [
                    'process_id' => $processId,
                    'level_name' => $data['sub_process']['level_name'][$key],
                    'level' => $key+1,
                    'approve_person' => $data['sub_process']['approve_person'][$key],
                    'carbon_copy' => $data['sub_process']['carbon_copy'][$key]
                ];
                ApprovalProcessLevelModel::insertData($ApprovalProcessLevel);
            }
        }
    }

    /**
     * @param $data
     * @param $processId
     * @throws \Service\Base\Exception
     */
    public function update($data,$processId){
        if(!empty($data) && is_array($data)) {
           if(isset($data['sub_process']['id'])){
               $idArray = tow_array_one($data['sub_process']['id']);
               $this->delete(['and',['not in','id',$idArray],['process_id'=>$processId]]);
           }
            foreach ($data['sub_process']['level_name'] as $key => $val) {
                $ApprovalProcessLevel = [
                    'process_id' => $processId,
                    'level_name' => $data['sub_process']['level_name'][$key][0],
                    'level' => $key + 1,
                    'approve_person' => $data['sub_process']['approve_person'][$key],
                    'carbon_copy' => $data['sub_process']['carbon_copy'][$key]
                ];
                if(!isset($data['sub_process']['id'][$key])){
                    ApprovalProcessLevelModel::insertData($ApprovalProcessLevel);
                }else{
                    ApprovalProcessLevelModel::updateData(['id'=>$data['sub_process']['id'][$key][0]],$ApprovalProcessLevel);
                }
            }
        }
    }

    public function delete($condition = [])
    {
        return ApprovalProcessLevelModel::deleteData($condition);
    }
}