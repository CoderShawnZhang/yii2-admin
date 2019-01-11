<?php
use \admin\Widgets\Modal;
use \common\widgets\DetailActiveForm;
Modal::begin([
   'header' => '<h4 class="modal-title">新建标签</h4>',
   'toggleButton' => ['label' => '新增','class' => 'btn btn-orange btn-w82 ml5'],
   'options' => ['tabindex' => false]
]);

$form = DetailActiveForm::begin(['detailModel' => '', 'id' => 'tagForm', 'action' => ['add']]);
?>
111111
<?php DetailActiveForm::end() ?>
<?php Modal::end(); ?>