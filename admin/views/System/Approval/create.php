<?php
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
<div class="box box-solid no-mb">
    <?= $this->render('Templates/baseinfo',['model'=>$model,'typeList' => $typeList]) ?>
    <?= $this->render('Templates/seting',['model'=>$model,'user'=>$user]) ?>
</div>
