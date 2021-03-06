<div class="box-header with-border">
    <h3 class="box-title">基本信息</h3>
</div>
<div class="box-body">
    <div class="col-lg-9">
        <input type="hidden" class="form-control" id="id" name="ApprovalProcess[id]" value="<?= $model->id ?>">
        <div class="row">
            <label class="col-md-2 control-label"><span class="start-icon">*</span>流程类型：</label>
            <div class="col-md-8">
                <div class="form-group">
                    <?=\admin\components\widgets\SingleWidgets::select2(array_column($typeList,'type_name','id'),'ApprovalProcess[type_id]',['options'=>['multiple'=>false]],$model->type_id); ?>
                </div>
            </div>
            <span></span>
            <a type="button" class="col-md-2" id="add_type" href="#">[添加类型]</a>
        </div>
        <div class="row">
            <label class="col-md-2 control-label"><span class="start-icon">*</span>流程名称：</label>
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" class="form-control" id="process_name" name="ApprovalProcess[process_name]" value="<?= trim($model->process_name) ?>">
                </div>
            </div>
            <span></span>
        </div>
        <div class="row">
            <label class="col-md-2 control-label">流程说明：</label>
            <div class="col-md-8">
                <div class="form-group">
                     <textarea rows="5" class="form-control" placeholder="这里可以注明流程规范" id="process_desc" name="ApprovalProcess[process_desc]"><?= $model->process_desc ?></textarea>
                </div>
            </div>
            <span></span>
        </div>
    </div>
</div>