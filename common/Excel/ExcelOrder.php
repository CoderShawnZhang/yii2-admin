<?php
/**
 * Excel--订单
 */
namespace common\Excel;

class ExcelOrder extends ExcelData
{
    public function __construct()
    {
        parent::__construct();
        $this->_temp_file_name = '悦驰订单Excel';

        $this->_input_format_sheet = [
            [
                'start_row' => '2',
                'start_col' => '0',
            ],
        ];
        $this->_input_format = [
            [
                'number' => ['title' => '编号', 'v-func' => 'egt0', 'im-func' => 'number_format_3'],
                'title' => ['title' => '姓名'],
                'age' => ['title' => '年龄', 'v-func' => 'egt0', 'im-func' => 'number_format_3'],
            ],
        ];

        $this->addFixedPrefix();
    }
}