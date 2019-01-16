<!-- 添加审批类型 -->
<?php
use \admin\Widgets\Modal;
use \common\widgets\DetailActiveForm;
use \common\widgets\Button;
Modal::begin([
    'header' => '<h4 class="modal-title">添加审批类型</h4>',
    'toggleButton' => ['label' => '添加类型','class' => 'btn btn-orange btn-w82 ml5'],
    'options' => ['tabindex' => false]
]);
$form = DetailActiveForm::begin(['detailModel' => $addModal, 'id' => 'tagForm', 'action' => ['add-type'],'type' => DetailActiveForm::TYPE_HORIZONTAL,'formConfig' => ['labelSpan' => 3, 'deviceSize' => DetailActiveForm::SIZE_SMALL]]);
?>
<table class="table table-bordered">
    <tbody>
    <tr>
        <td><input type="text" class="form-control" name="type_name" placeholder="类型名称" id="add_type_name"></td>
    </tr>
    </tbody>
</table>
<div class="modal-footer">
    <?= Button::submitButton()?>
    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
</div>
<?php DetailActiveForm::end() ?>
<?php Modal::end(); ?>
