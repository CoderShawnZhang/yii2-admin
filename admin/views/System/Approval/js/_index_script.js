

function getListHtml(url,selector) {
    $.GET(url,function(res){
        $(selector).html(res);
        $('.pagination a').on('click',function(i){
            i.preventDefault();
            var url = $(this).attr('href');
            getListHtml(url,$(this).parents('.tab-pane'));
        });
        $('.action-del').on('click',function (i) {
            i.preventDefault();
            var that = $(this);
            var url = that.attr('data-url');
            var id = that.attr('data-id');
            Modal.confirm('确定要删除吗？').on(function(e){
                if(!e) return;
                $.AJAX({url:url,data:{'id':id},type:"GET",success:function (res) {
                        if(res.success){
                            that.parents('tr').remove();
                            Modal.alert('删除成功！','success');
                        }
                    }});
            });
        });
    });
}

$(function(){
    var selector = $('.tab-pane-list');
    var url = selector.data('url');
    getListHtml(url,selector);
});


/*添加审批类型弹窗*/
$('#add_type').click(function () {
    $('.type-box').show();
});


//添加级别
$('#add_level').click(function () {
    var level_id = parseInt($('#level_id').val()) + 1;
    var index = $('#level_table tbody tr').length - 1;
    $('#level_id').val(level_id);
    var html = $('#cloneHtml tr').clone(true);
    $('#level_table tbody:eq(1)').append(html);
    $('#level_table tbody tr:last').find('select').select2({'allowClear': true});
    $('#level_table tbody tr:last').find('.select2').removeClass('select2-container--default').addClass('select2-container--krajee');
    $('#level_table tbody tr:last').find('.approve_person').attr('name', 'sub_process[approve_person][' + index + '][]');
    $('#level_table tbody tr:last').find('.carbon_copy').attr('name', 'sub_process[carbon_copy][' + index + '][]');
    $('#level_table tbody tr:last').find('.level_name').attr('name', 'sub_process[level_name][' + index + '][]');
    $('.level_id').eq(index).html(level_id);
});

/*删除级别*/
$('#level_table').on('click', '.del_level', function () {
    $(this).parent().parent().remove();
    var level_id = parseInt($('#level_id').val()) - 1;
    $('#level_id').val(level_id);
    $('#level_table .level_id').each(function (i) {
        i++;
        $(this).text(i);
        $(this).parent().attr('id', 'row_' + i);
    });
    //记录删除id
    if ($(this).attr('data-id') !== undefined) {
        var del_id = $('#del_id').val();
        if (del_id == '') {
            $('#del_id').val($(this).attr('data-id'));
        } else {
            $('#del_id').val(del_id + ',' + $(this).attr('data-id'));
        }
    }
});


/*添加审批类型弹窗*/
$('#add_type').click(function () {
    $('.type-box').show();
});

/*关闭弹窗*/
$('.modal-header button').click(function () {
    $('div.modal').hide();
});

/*取消*/
$('.modal-footer .cancel').click(function () {
    $('div.modal').hide();
});

/*审批类型提交*/
$('#submit_add_type').click(function () {
    var type_name = $('#add_type_name').val(), url = $(this).attr('data-url');
    $.post(
        url,
        {
            type_name: type_name,
            _csrf: yii.getCsrfToken()
        },
        function (data) //回传函数
        {
            if (data) {
                $('#type_id').prepend("<option value='" + data + "' selected='selected'>" + type_name + "</option>");
                $('#type_name').val(type_name);
                $('.type-box').hide();
                Modal.alert('添加成功！', 'success').on(function(){
                    window.location.reload();
                });
            } else {
                Modal.alert('添加失败！', 'error');
            }
        });
})