<?php
$this->title = '审批流程设置';
$this->registerJs($this->render('js/_index_script.js'));
?>
<?php $this->beginBlock('content-header'); ?>
    <h1>
        <?= $this->title ?>  <span class="btnGroupBox">
            <a href="<?= Yii::$app->urlManager->createUrl('System/approval/create')?>" class="btn btn-orange btn-w82 ml5">新增</a>
        </span>
    </h1>
    <ol class="breadcrumb">
        <li>系统管理</li>
        <li class="active"><?= $this->title ?></li>
    </ol>
<?php $this->endBlock(); ?>
<div class="box box-solid no-mb">
        <div class="box-body no-padding tab-pane-list" data-url="<?= \yii\helpers\Url::toRoute('list')?>"></div>
</div>
