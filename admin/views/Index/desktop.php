<?php
use \yii\helpers\Url;
use \yii\helpers\ArrayHelper;
$opts = \yii\helpers\Json::htmlEncode([
   'defaultTab' => 0,
]);
$asset = \admin\assets\AppAsset::register($this);
$js = <<<JS
var _opt = {$opts};
JS;
$this->registerJs($js);
$this->registerJs($this->render('js/test.js'));
$this->registerJs($this->render('js/_index_script.js'));
?>
<!--Header-->
<?php $this->beginBlock('content-header'); ?>
    <h1>
        <span>订单管理</span>
        <span class="btnGroupBox">
            <a type="Button" id="w0" class="btn btn-info mr5" href="/Orders/orders-material/add" target="_blank"><sapn class="">新建</sapn></a>
        </span>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
    </ol>
<?php $this->endBlock(); ?>
<!--Search-->
<?php echo $this->render('search',['searchModel'=>$searchModel,'searchModel1'=>$searchModel1]); ?>
<div class="box box-solid no-mb">
    <ul class="nav nav-tabs" id="navTabs">
        <?php foreach ($count as $key => $val): ?>
            <li>
                <a href="<?= Url::toRoute(ArrayHelper::merge(['list', 'tabId' => $key],Yii::$app->request->get()))?>" data-target="#tab_<?= $key ?>">待确认收款(<?=$key?>)</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content">
        <?php foreach ($stateList as $key => $val): ?>
            <div class="tab-pane" id="tab_<?= $key ?>"></div>
        <?php endforeach; ?>
    </div>
</div>
