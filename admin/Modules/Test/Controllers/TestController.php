<?php
namespace admin\Modules\Test\Controllers;

class TestController extends \yii\web\Controller
{
    public function actionTest()
    {
        return $this->render('test');
    }
}