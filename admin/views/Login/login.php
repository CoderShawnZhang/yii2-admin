<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Yii2</b>--Admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">用户名：amdin，密码：admin</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => '用户名','value' => isset($_COOKIE['username']) ? $_COOKIE['username'] : '']) ?>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => '密码','value' => isset($_COOKIE['password']) ? $_COOKIE['password'] : '']) ?>
        <div class="row">
            <div class="col-xs-8"></div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('登  录', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
