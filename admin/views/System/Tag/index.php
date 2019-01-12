<?php
use yii\helpers\Url;
$this->registerJs($this->render('js/_index_script.js'));
?>
<?php $this->beginBlock('content-header'); ?>
<h1>
    标签管理
    <span class="btnGroupBox">
        <?= $this->render('templates/add-modal',['addModal'=>$searchModel]); ?>
    </span>
</h1>
<?php $this->endBlock(); ?>
<div class="box box-solid no-mb">
    <div class="box-body no-padding tab-pane" data-url="<?= Url::toRoute('list')?>"></div>
</div>