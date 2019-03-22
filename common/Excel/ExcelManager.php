<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 2019/3/4
 * Time: 下午4:08
 */
namespace common\Excel;

use yii\helpers\FileHelper;

class ExcelManager
{
    public static $fileType = 'xlsx';

    public static $_object = null;

    //Excel导入文件存放目录
    public static function get_path()
    {
        return \Yii::getAlias('@admin/runtime') . '/tmp/';
    }

    public static function getClass($condition = [])
    {
        return new ExcelOrder();
    }
    /**
     * 上传导入的Excel文件
     *
     * @param $name
     * @param $prefix
     * @return string
     * @throws \yii\base\Exception
     */
    public static function uploadFile($name = 'myFile',$prefix)
    {
        $tmp_ext = explode(".",$_FILES[$name]['name']);
        $excelName = $tmp_ext[0];
        $tmp_ext = $tmp_ext[count($tmp_ext)-1];
        $ext = strtolower($tmp_ext);
        if($ext != self::$fileType){
            echo '格式不对';die;
        }
//        $fileName = $prefix . '-' . uniqid() . '.' . self::$fileType;
        $fileName = $excelName . '.' . self::$fileType;
        $filePath = self::get_path() . $fileName;
        if(!is_dir(self::get_path())){
            FileHelper::createDirectory(self::get_path());
        }
        move_uploaded_file($_FILES[$name]['tmp_name'],$filePath);
        return [$fileName,$filePath];
    }

    /**
     * 封装运行导入入口调用处
     *
     * @param $path
     * @param array $condition
     * @return array
     */
    public static function runImport($path,$condition = [])
    {
        $c = self::getClass($condition);
        if(empty($c)){
            return ['error' => '404', 'msg' => '数据出错'];
        }
        self::$_object = $c;
        return $c->import($path);
    }

    /**
     * 封装运行导出入口调用处
     *
     * @param $list
     * @param array $condition
     * @return bool
     */
    public static function runExport($list,$condition = [])
    {
        $c = self::getClass($condition);
        if(empty($c)){
            return false;
        }
        self::$_object = $c;
        return $c->export($list);
    }
}