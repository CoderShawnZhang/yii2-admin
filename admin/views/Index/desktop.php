<?php
    $this->registerJs($this->render('js/_index_script.js'));
?>
<!--Header-->
<?php $this->beginBlock('content-header'); ?>
    <h1><span>订单管理</span></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
    </ol>
<?php $this->endBlock(); ?>
<!--Search-->
<?php echo $this->render('search',['searchModel'=>$searchModel]); ?>
<!--List-->
<?php echo $this->render('list',['searchModel'=>$searchModel,'dataProvider'=>$dataProvider]); ?>
