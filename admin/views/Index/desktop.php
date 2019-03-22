<?php
use \yii\helpers\Url;
use \yii\helpers\ArrayHelper;
$opts = \yii\helpers\Json::htmlEncode([
   'defaultTab' => 0,
]);
$asset = \admin\assets\AppAsset::register($this);

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

<?php
$columns = [
    [
        'class' => 'yii\grid\CheckboxColumn',
        'headerOptions' => ['width' => '30'],
        'name' => 'id',
        'checkboxOptions' => function ($model, $key, $index, $column) {
            return ['value' => $model->id];
        },
    ],
    [
        'attribute' => 'id',
        'header'=>'用户编1号',
        'format' => 'raw',
        'headerOptions' => ['width' => '100'],
        'value' => function($model){
            return $model->id;
        },
        'filter' => \kartik\select2\Select2::widget([
            'model' => $searchModel,
            'attribute' =>'id',
            'data' => [''=>'无',1=>1,2=>2,3=>3]
        ])
    ],
    [
        'attribute' => 'name',
        'header' => '名称',
        'headerOptions' => ['width' => '150'],
        'value' => function($model){
            return $model->name;
        }
    ],
    [
        'attribute' => 'name',
        'header' => '加盟商',
        'headerOptions' => ['width' => '180'],
        'value' => function(){
            return '广东惠州惠东县级店';
        }
    ],
    [
        'attribute' => 'name',
        'header' => '加盟商',
        'value' => function(){
            return '广东惠州惠东县级店';
        }
    ],
    [
        'class' => 'kartik\grid\EditableColumn',
        'attribute' => 'name',
        'filter' => false,
        'header' => '接单员备注',
        'headerOptions' => ['class' => 'th-w200'],
        'editableOptions' => [
            'size' => 'md',
            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
            'formOptions' => ['action' => 'edit-name'],
            'placement' => \kartik\popover\PopoverX::ALIGN_BOTTOM_RIGHT,
            'showButtonLabels' => true,
            'submitButton' => [
                'icon' => '<i class="fa fa-save"></i>',
                'label' => '保存',
                'class' => 'btn btn-sm btn-primary',
            ],
        ],
    ],
    [
        'attribute' => 'name',
        'header' => '订单类型',
        'headerOptions' => ['width' => '180'],
        'format' => 'raw',
        'value' => function(){
            return \yii\helpers\Html::tag('span','售后订单',['class'=>'label label-bg-blue label-tag']);
        }
    ],
];

$columns1 = [
    [
        'class' => 'yii\grid\CheckboxColumn',
        'headerOptions' => ['width' => '30'],
        'name' => 'id',
        'checkboxOptions' => function ($model, $key, $index, $column) {
            return ['value' => $model->id];
        },
    ],
    [
        'attribute' => 'id',
        'header'=>'用户编1号',
        'format' => 'raw',
        'headerOptions' => ['width' => '100'],
        'value' => function($model){
            return $model->id;
        },
        'filter' => \kartik\select2\Select2::widget([
            'model' => $searchModel,
            'attribute' =>'id',
            'data' => [''=>'无',1=>1,2=>2,3=>3]
        ])
    ],
    [
        'attribute' => 'name',
        'header' => '名称',
        'headerOptions' => ['width' => '150'],
        'value' => function($model){
            return $model->name;
        }
    ]
];

?>
<?=\anlewo\tabgridview\TabGridViewWidget::widget([
    'tabArray' => [
        [
            'title'=>'自定义标题1',
            'columns' => $columns,
            'searchClass' => 'admin\Modules\Index\models\SearchOrder'
        ],
        [
            'title'=>'自定义标题2',
            'columns' => $columns1,
            'searchClass' => 'admin\Modules\Index\models\SearchOrder1'
        ],
    ]
]);?>

