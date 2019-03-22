<!--添加级别模板 -->
<table id="cloneHtml" style="display: none;">
    <tr id="row_1">
        <td class="level_id">1</td>
        <td><input class="form-control level_name" name="sub_process[level_name][]" value=""></td>
        <td class="approver_td">
            <select name="sub_process[approve_person][]" multiple="multiple" data-placeholder="审批人" class="form-control approve_person">
                <?php if (!empty($user)) {
                    foreach ($user as $key => $val) { ?>
                        <option value="<?= $val['id'] ?>"><?= $val['username'] ?></option>
                    <?php }
                } ?>
            </select>
        </td>
        <td class="cc_td">
            <select name="sub_process[carbon_copy][]" multiple="multiple" data-placeholder="抄送人" class="form-control carbon_copy">
                <?php if (!empty($user)) {
                    foreach ($user as $key => $val) { ?>
                        <option value="<?= $val['id'] ?>"><?= $val['username'] ?></option>
                    <?php }
                } ?>
            </select>
        </td>
        <td><a href="#" data-id="0" class="del_level">[删除]</a></td>
    </tr>
</table>