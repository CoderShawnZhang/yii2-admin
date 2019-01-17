<?php
use yii\widgets\ActiveForm;
$this->title = '审批流程创建';
$this->registerJs($this->render('js/_index_script.js'), yii\web\View::POS_END);
?>
<?php $this->beginBlock('content-header'); ?>
<h1>
    <?= $this->title ?>
</h1>
<ol class="breadcrumb">
    <li>系统管理</li>
    <li class="active"><?= $this->title ?></li>
</ol>
<?php $this->endBlock(); ?>
<?php $form = ActiveForm::begin(['id' => 'ApprovalProcessButton', 'options' => ['class' => 'form-horizontal']]); ?>
<div class="box box-solid no-mb">
    <?= $this->render('Templates/baseinfo',['model'=>$model,'typeList' => $typeList]) ?>
    <?= $this->render('Templates/seting',['model'=>$model,'user'=>$user,'approval_level'=>$approval_level]) ?>
</div>
<?php ActiveForm::end(); ?>
<?= $this->render('Templates/add-type-modal',['addModal' => $model]) ?>
<?= $this->render('Templates/cloneHtml',['user'=>$user]) ?>
