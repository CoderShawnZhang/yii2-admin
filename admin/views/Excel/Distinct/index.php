<?php
$this->title = 'Excel操作';
$opts = \yii\helpers\Json::htmlEncode([
    'defaultTab' => $tabActive,
]);
$exprotUrl = \yii\helpers\Url::toRoute('/Excel/distinct/export');
$js = <<<JS
var _opt = {$opts};
JS;
$this->registerJs($js);
$this->registerJs($this->render('js/_index_script.js'));
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
<style>
    .priceInput-file {
        position: relative;
        width: 112px;
        background-color: #fff;
        font-weight: 600;
        border: 1px solid #8f8cd6;
        padding: 6px 12px;
        margin-left: 10px;
        color: #8f8cd6;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }
    .priceInput-file #myFile {
        background-color: transparent;
        border-radius: 0px;
        border: medium none;
        opacity: 0;
        filler: alpha(opacity=0);
        cursor: pointer;
        position: absolute;
        top: 0px;
        left: 0px;
    }
    .closeTab{
        position: absolute;
        top: 2px;
        right: 10px;
        z-index: 99;
        cursor: pointer;
        display: none;
    }
</style>
<div class="rules-explain-box">
    <form id="importForm" method="post" enctype="multipart/form-data" action="/Excel/distinct/import">
        <div class="price-file-box clearfix">
            <label class="priceInput-file">选择上传文件
                <input class="form-control" type="file" id="myFile" name="myFile">
            </label>
            <button type="button" id="import" class="btn btn-info">导入Excel</button>
            <button type="button" id="export" class="btn btn-info">导出Excel</button>
        </div>
    </form>
</div>
<div class="box box-solid no-mb">
    <ul class="nav nav-tabs" id="navTabs">
        <?php foreach($tabList as $key => $val){ ?>
            <li>
                <span class="closeTab">x</span>
                <a href="<?= \yii\helpers\Url::toRoute(\yii\helpers\ArrayHelper::merge(['list', 'pichNo' => $val['exportTime']],Yii::$app->request->get()))?>" data-target="#tab_<?=$key;?>">&nbsp;&nbsp;&nbsp;<?=$val['tabName']?>&nbsp;&nbsp;&nbsp;</a>
            </li>
        <?php } ?>
    </ul>
    <div class="tab-content">
        <?php foreach($tabList as $key => $val){ ?>
            <div class="tab-pane" id="tab_<?=$key;?>"><?=$key;?></div>
        <?php } ?>
    </div>
</div>