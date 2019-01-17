<!-- 添加审批类型 -->
<div class="type_modal">
    <div class="modal type-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="关闭"><span
                                aria-hidden="true">×</span></button>
                    <h4 class="modal-title">添加审批类型</h4>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="类型名称" id="add_type_name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-w82 mr5" id="submit_add_type"
                            data-url="<?= \yii\helpers\Url::toRoute('/System/approval/add-type') ?>">提交
                    </button>
                    <button type="button" class="btn btn-default btn-w82 cancel">取消</button>
                </div>
            </div>
        </div>
    </div>
</div>