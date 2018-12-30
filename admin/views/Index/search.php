<?php
use admin\Widgets\SearchActiveForm as ActiveForm;
use \yii\helpers\Url;
use kartik\select2\Select2;
use kartik\daterange\DateRangePicker;
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
                <div class="col-md-2">
                    <div class="form-group field-ordersn has-success">
                        <input type="text" id="ordersn" class="form-control" name="orderSn" placeholder="订单号">
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group field-ordersn has-success">
                       <?php
                      echo $form->field($searchModel, 'name')->widget(Select2::classname(), [
                           'data' => [2,3,4,5],
                           'options' => [
                               'multiple' => true,
                               'placeholder' => '这个恶意',
                           ],
                           'pluginOptions' => [
                               'allowClear' => true,
                           ],
                       ])->label(false)
                       ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group field-ordersn has-success">
                        <?php
                        echo $form->field($searchModel1, 'name')->widget(Select2::classname(), [
                            'data' => [1,2,3,4,5,6,7,8],
                            'options' => [
                                'multiple' => false,
                                'placeholder' => '这个恶意',
                            ],
                            'pluginOptions' => [
                                'allowClear' => false,
                            ],
                        ])->label(false)
                        ?>
                    </div>
                </div>

                <?= $form->fieldDateRage('date_range');?>
            </div>
            <div class="row">
                <div class="col-md-2">

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="submitButton" id="w1" class="btn btn-info mr5">开始搜索</button>
                    <a id="w2" class="btn btn-default btn-w82" href="/Orders/orders-engineering/index?type=reset"><sapn class="">重置</sapn></a>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
