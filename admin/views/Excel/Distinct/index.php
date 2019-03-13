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
                <span class="closeTab" data-tabId = "<?=$val['exportTime']?>">x</span>
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