<?php
// 示例函数
if (! function_exists('p')) {
    function p(Array $arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
}

if(! function_exists('dd')) {
    function dd($s) {
        echo '<pre>';
        print_r($s);
        echo '</pre>';
    }
}