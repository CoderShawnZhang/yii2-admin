<?php
use admin\Widgets\SearchActiveForm as ActiveForm;
use \yii\helpers\Url;
?>
<div class="box search-box" id="searchBox">
    <!-- 搜索表单开始 -->
    <div class="box-body">
        <?php
        $form = ActiveForm::begin([
           'id' => 'orderSearch',
           'method' => 'get',
           'searchModel' => $searchModel,
           'action' => Url::toRoute(['index'])
        ]);
        ?>
            <div class="row">
                <?=$form->fieldText('name');?>
                <?= $form->fieldCate();?>
                <?= $form->fieldCate1();?>
                <?= $form->fieldDateRage('date_range');?>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?=$form->buttonSubmit()?>
                    <?=$form->buttonReset()?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
