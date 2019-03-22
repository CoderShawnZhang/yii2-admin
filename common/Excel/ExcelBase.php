<?php
/**
 * 操作Excel导入/导出--基类
 */

namespace common\Excel;


class ExcelBase
{
    //Excel 版本
    protected $_excel_type = 'Excel2007';

    //Excel 对象
    protected $_objectExcel = null;

    //Excel 工作表
    protected $_objectSheet = null;

    //Excel 模版路径
    protected $_temp_path = '';

    //Excel 导出默认模版文件名称
    protected $_temp_file_name = 'export_default';

    //Excel 前部分公用字段
    protected $_fixed_prefix = [];

    /** 子类配置的数据 */
    protected $_input_format = array();
    protected $_input_format_sheet = array();

    public function __construct()
    {
        //设置Excel导入的内容占用内存分配的上限
        ini_set('memory_limit', '256M');

        //默认Excel导入的路径
        $this->_temp_path = \Yii::getAlias('@common') . '/Excel/Files/';
    }

    public function export(&$data)
    {
        $this->loadData();
        $this->build($data);
        return $this->save();
    }

    public function import($filePath)
    {
        $this->loadData($filePath);
        $data = $this->readData();
        return $data;
    }

    public function loadData($inputFileName = '')
    {
        if ($inputFileName == '') {
            $inputFileName = $this->_temp_path . $this->_temp_file_name . '.' . ExcelManager::$fileType;
        }
        $this->_objectExcel  = \PHPExcel_IOFactory::load($inputFileName);
        $this->_objectSheet = $this->_objectExcel->getSheet(0);
    }

    /**
     * 数据load到ExcelSheet里后
     * 从ExcelSheet对象里读取出来存入数组
     */
    public function readData()
    {
        $count = $this->_objectExcel->getSheetCount();
        $length = count($this->_input_format_sheet);
        if($length > $count){
            $length = $count;
        }
        $data = ['error' => 0];
        for($i = 0; $i < $length; $i++){
            $this->_objectExcel->setActiveSheetIndex($i);
            $this->_objectSheet = $this->_objectExcel->getActiveSheet();

            //获取子类配置的行数
            $row = $this->_input_format_sheet[$i]['start_row'];
            //获取子类配置的从第几列开始导入
            $start_col = $this->_input_format_sheet[$i]['start_col'];
            //子类设置默认的填充key-value
            if(isset($this->_input_format_sheet[$i]['key'])){
                $key = $this->_input_format_sheet[$i]['key'];
                $value = $this->_input_format_sheet[$i]['value'];
            } else {
                $key = '';
                $value = '';
            }
            //总行数
            $totalRow = $this->_objectSheet->getHighestRow();
            //子类导入需要进行格式化/数据处理的数组
            $format_one_array = &$this->_input_format[$i];
            //返回的数据
            $returnList = [];
            $curValue = '';
            for(;$row <= $totalRow; ++$row) {
                //数据是空的，忽略跳过
                if($this->readVal(0,$row) == ''){
                    continue;
                }
                $col = $start_col;
                $arr_value = [];
                foreach($format_one_array as $f_key => &$f_val){
                    if(isset($f_val['im-func']) && $f_val['im-func'] != '' && method_exists($this,$f_val['im-func'])){
                        $curValue = call_user_func([$this,$f_val['im-func']],$col,$row);
                    } else {
                        $curValue = $this->readVal($col,$row);
                    }
                    //验证字段不为空，则需要验证
                    if(isset($f_val['v-func']) && $f_val['v-func'] != ''){
                        $func_array = explode('|',$f_val['v-func']);
                        $func_length = count($func_array);
                        for($func_i = 0;$func_i < $func_length;++$func_i){
                            if(method_exists($this,$func_array[$func_i])){
                                $validate = call_user_func([$this,$func_array[$func_i]],$curValue);
                                if($validate['error'] != 0){
                                    return $this->getErrorInfo($validate,$col,$row,$f_val['title']);
                                }
                            }
                        }
                    }
                    $arr_value[$f_key] = $curValue;
                    $col += 1;
                }

                if($key != ''){
                    $arr_value[$key] = $value;
                }
                array_push($returnList,$arr_value);
            }
            $data['list'][] = $returnList;
        }
        $this->_objectExcel->setActiveSheetIndex(0);
        return $data;
    }

    public function build(&$data)
    {
        $count = $this->_objectExcel->getSheetCount();
        $len = count($this->_input_format_sheet);
        if($len > $count){
            $len = $count;
        }
        for($i = 0; $i < $len; $i++){
            $this->_objectExcel->setActiveSheetIndex($i);//指向当前工作表
            $this->_objectSheet = $this->_objectExcel->getActiveSheet();

            if(isset($this->_input_format_sheet[$i]['title']) && $this->_input_format_sheet[$i]['title'] != ''){
                $this->_objectSheet->setTitle($this->_input_format_sheet[$i]['title']);//标题名称
            }
            //开始行
            $row = $this->_input_format_sheet[$i]['start_row'];
            //开始列
            $start_col = $this->_input_format_sheet[$i]['start_col'];
            if(isset($this->_input_format_sheet[$i]['key'])){
                $key = $this->_input_format_sheet[$i]['key'];
                $val = $this->_input_format_sheet[$i]['val'];
            } else {
                $key = '';
                $val = '1';
            }
            $format_one_arr = &$this->_input_format[$i];
            $index = 0;
            if(is_array($data)){
                foreach($data as &$v){
                    $v = $v->toArray();
                    if(!is_array($v)){
                        continue;
                    }
                    if($key == '' || $v[$key] == $val){
                        $col = $start_col;
                        $index +=1;
                        $v['i'] = $index;
                        foreach($format_one_arr as $key_key => &$key_val){
                            !isset($v[$key_key]) && $v[$key_key] = '';
                            if(isset($key_val['ex-func']) && $key_val['ex-func'] != '' && method_exists($this,$key_val['ex-func'])){
                                call_user_func([$this,$key_val['ex-func']],$col,$row,$v[$key_key]);
                            } else {
                                $this->setVal($col,$row,$v[$key_key]);
                            }
                            $col += 1;
                        }
                        $row += 1;
                    }
                }
            }
        }
        $this->_objectExcel->setActiveSheetIndex(0);
    }

    public function readVal($col,$row)
    {
        $val = trim($this->_objectSheet->getCellByColumnAndRow($col,$row)->getValue());
        $result = $this->isNumeric($val);
        if($result['error'] != 0){
            return $val;
        } else {
            return sprintf("%.4f",$val);
        }
    }

    public function setVal($col, $row, $val)
    {
        $this->setCellValue($this->getChar($col).$row, $val);
    }

    public function setCellValue($key, $val)
    {
        $this->_objectSheet->setCellValue($key,$val);
    }

    /**
     * 导入的Excel数据组装成写入数据库的SQL语句
     *
     * @param $table
     * @param $sql_val
     * @param $pichNo
     * @throws \yii\db\Exception
     */
    public function ExcelDataToInsertExcel($table,$sql_val,$pichNo)
    {
        $sql = '';
        $sql .= 'insert into ' . $table . ' (';
        $columns = ExcelManager::$_object->getExcelColumns();
        array_push($columns,'importTime');
        $sql_val .= ','.$pichNo;
        foreach($columns as $key => $val){
            $sql .= $val . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ') values';
        \Yii::$app->db->createCommand($sql . ' ('.$sql_val.')')->execute();
    }

    public function ExcelDataToInsertTab($table,$pichNo,$tabName)
    {
        $sql = '';$sql_val = "";
        $sql .= 'insert into ' . $table . ' (';
        $columns = ExcelManager::$_object->getExcelTabColumns();
        $sql_val .= $pichNo . "," . "'" .$tabName . "'";
        foreach($columns as $key => $val){
            $sql .= $val . ',';
        }
        $sql = rtrim($sql, ',');
        $sql .= ') values';
        \Yii::$app->db->createCommand($sql . ' ('.$sql_val.')')->execute();
    }

    /**
     * 保存到本地，导出Excel
     *
     * @throws \PHPExcel_Reader_Exception
     * @throws \PHPExcel_Writer_Exception
     */
    public function save()
    {
        $outputFileName = $this->_temp_file_name . '' . date('Ymd_His') . '.' . ExcelManager::$fileType;
        header('Content-Type : application/vnd.ms-excel');
        header('Content-Disposition:attachment;filename="' . $outputFileName);
        $objWriter = \PHPExcel_IOFactory::createWriter($this->_objectExcel, $this->_excel_type);
        $objWriter->save('php://output');
        exit;
    }


    //////////
    public function isNumeric($val)
    {
        if(!is_numeric($val)){
            return ['error' => '-1','msg' => '有非数字'];
        }
        return ['error' => '0'];
    }

    /**
     * 舍弃保留三位小数
     * @param $col
     * @param $row
     * @return string
     */
    public function number_format_3($col, $row)
    {
        $val = $this->readVal($col, $row);
        $result = $this->isNumeric($val);
        if ($result['error'] != 0) {
            return $val;
        }
        return bcmul($val,1,3);
    }

    /**
     * 判断是否为空
     * @param $val
     * @return array
     */
    public function isEmpty($val)
    {
        if ($val !== 0 && empty($val)) {
            return array('error' => '-1', 'msg' => '数据为空');
        }

        return array('error' => '0');
    }

    public function getChar($r)
    {
        $out = '';
        if($r >= 26){
            $s = intval($r / 26);
            $s -= 1;
            $out = $this->getChar($s);
            $ss = $r % 26;
            $out .= chr($ss + 65);
        } else {
            $out = chr($r + 65);
        }
        return $out;
    }
}