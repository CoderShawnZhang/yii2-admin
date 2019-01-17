<?php
use  \admin\components\widgets\SingleWidgets;
?>
<div class="box-header with-border">
    <h3 class="box-title">审批设置</h3>
    <button id="add_level" type="button" class="btn btn-info ml5">添加级别</button>
</div>
    <input type="hidden" id="level_id" value=<?= isset($approval_level) ? count($approval_level) : 1 ?>>
    <input type="hidden" id="row_id" value="row_1">
    <input type="hidden" id="del_id" name="del_id" value="">
<div class="box box-solid">
    <div class="box-body no-padding">
        <table class="table table-bordered" id="level_table">
            <tr>
                <th class="th-w50">级别</th>
                <th class="th-w200">级别名称</th>
                <th>审批人</th>
                <th class="th-w500">抄送人&nbsp;</th>
                <th class="th-w80">操作</th>
            </tr>
            <tbody>
            <?php if (isset($approval_level) && is_array($approval_level) && !empty($approval_level)) {
                foreach ($approval_level as $key => $val) {
                    ?>
                    <tr id="row_<?= $val['level'] ?>">
                        <td class="level_id">
                            <?= $val['level'] ?>
                        </td>
                        <td>
                            <input class="form-control" name="sub_process[level_name][<?=$key?>][]" value="<?= $val['level_name'] ?>">
                            <input type="hidden" name="sub_process[id][<?=$key?>][]" value="<?=$val['id'];?>">
                        </td>
                        <td class="approver_td">
                            <?= SingleWidgets::select2(array_column($user,'username','id'),'sub_process[approve_person]['.$key.'][]',['options'=>['placeholder'=>'审批人']],explode(',',$val['approve_person'])) ?>
                        </td>
                        <td class="cc_td">
                            <?= SingleWidgets::select2(array_column($user,'username','id'),'sub_process[carbon_copy]['.$key.'][]',['options'=>['placeholder'=>'抄送人']],explode(',',$val['carbon_copy'])) ?>
                        </td>
                        <td>
                            <?php echo $key == 0 ? '' : '<a href="#" data-id="<?= $val[\'id\'] ?>" class="del_level">[删除]</a>'?>
                        </td>
                    </tr>
            <?php }} else { ?>
                <tr id="row_1">
                    <td class="level_id">1</td>
                    <td>
                        <input type="text" class="form-control" name="sub_process[level_name][0][]" value="第一级审批">
                    </td>
                    <td class="approver_td">
                        <?= SingleWidgets::select2(array_column($user,'username','id'),'sub_process[approve_person][0][]',['options'=>['placeholder'=>'审批人']]) ?>
                    </td>
                    <td class="cc_td">
                        <?= SingleWidgets::select2(array_column($user,'username','id'),'sub_process[carbon_copy][0][]',['options'=>['placeholder'=>'抄送人']]) ?>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="box-footer p10">
    <div class="col-lg-9">
        <div class="form-group">
            <div class="col-md-offset-1 col-md-4">
                <?= SingleWidgets::submitButton($model); ?>
                <a class="btn btn-default btn-w82" href="<?= Yii::$app->urlManager->createUrl('System/approval/index') ?>">取消</a>
            </div>
        </div>
    </div>
</div>