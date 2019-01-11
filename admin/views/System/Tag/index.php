<?php
use Service\System\Tag as TagService;
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
    <div class="box-body no-padding">
        <?php
        $columns = TagService::tagColumns();
        $item = [
            'dataProvider' => $dataProvider,
            'columns' => $columns
        ];
        echo \admin\Widgets\GridView::indexWidget($item);
        ?>
    </div>
</div>