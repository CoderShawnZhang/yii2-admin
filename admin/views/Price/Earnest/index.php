<?php
use yii\helpers\Url;
$this->registerJs($this->render('js/_index_script.js'));
?>
<?php $this->beginBlock('content-header'); ?>
<h1>
    定金管理
</h1>
<?php $this->endBlock(); ?>
<div class="box box-solid no-mb"><!--白色底-->
    <div class="box-header no-padding ml10 search-box">
        <p style="margin-left: 10px;">说明：</p>
        <p style="margin-left: 10px;">1.加盟商在主材包第一次付款时，系统会针对房门、卫生间门、厨房门、橱柜、淋浴房收取定金。</p>
        <p style="margin-left: 10px;">2.定金管理能够控制系统收取加盟商对房门、卫生间门、厨房门、橱柜、淋浴房定金的额度。</p>
        <p style="margin-left: 10px;">3.本设置只对尚未付款的支付单生效，包含付款被驳回后尚未付款的支付单。</p>
    </div>
</div>
<div class="box-body no-padding tab-pane" data-url="<?= Url::toRoute('list')?>"></div>