<?php
use \admin\Widgets\Modal;
use \common\widgets\DetailActiveForm;
Modal::begin([
   'header' => '<h4 class="modal-title">新建标签</h4>',
   'toggleButton' => ['label' => '新增','class' => 'btn btn-orange btn-w82 ml5'],
   'options' => ['tabindex' => false]
]);
$form = DetailActiveForm::begin(['detailModel' => $addModal, 'id' => 'tagForm', 'action' => ['add']]); ?>
<table class="table table-bordered">
    <tbody>
        <tr>
            <td><?= $form->fieldInput('name') ?></td>
        </tr>
        <tr>
            <td><?= $form->fieldColor('color',[],['options' => ['readOnly' => true]]) ?></td>
        </tr>
        <tr>
            <td><?= $form->fieldSelect2('objectsArray',[],[
                    'data' => [1,2,3,4],
                    'options' => [
                        'multiple' => true,
                        'placeholder' => '请选择'
                    ]
                ]) ?></td>
        </tr>
        <tr>
            <td><?= $form->fieldTextArea('desc')?></td>
        </tr>
    </tbody>
</table>
<div class="modal-footer">
    <?= \common\widgets\Button::submitButton()?>
    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
</div>
<?php DetailActiveForm::end() ?>
<?php Modal::end(); ?>