<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/5
 * Time: 上午9:16
 */

namespace common\Excel;


class ExcelData extends ExcelBase
{
    /**
     * 加上固定表头前部分
     */
    public function addFixedPrefix()
    {
        foreach($this->_input_format as &$item){
            $item = array_merge($this->_fixed_prefix,$item);
        }
    }

    public function getExcelColumns()
    {
        return array_keys($this->_input_format[0]);
    }

    public function getExcelTabColumns()
    {
        return ['exportTime','tabName'];
    }
}