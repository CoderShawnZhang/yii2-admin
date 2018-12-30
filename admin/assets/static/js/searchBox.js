var paramts={
    searchBtnPosition: '.content-header h1',    //搜索开关按钮位置
    btnGroup:' .btnGroupBox',                   //按钮组
    boxTarget:'.box.box-default',                //事件标记
    sessionKey:(location.href).split('?')[0],
    openText:'打开搜索',
    closeText:'收起搜索'
}
/**
 * 控制搜索面板
 * @param {Object} options
 */
function searchSWitch(options) {
    var op = $.extend({
        btn: paramts.searchBtnPosition,
        btnGroup: paramts.btnGroup,
        box: paramts.boxTarget,
        show: sessionStorage.getItem(paramts.sessionKey),
        openText: paramts.openText,
        closeText: paramts.closeText
    }, options);
    // 判断是否是按按钮组
    if ($(op.btn + op.btnGroup).length == 0) {
        $(op.btn).append('<button type="button" class="btn btn-info" id="openSearch">' + (op.show === 'none' ? op.openText : op.closeText) + '</button>');
    } else {
        $(op.btn + op.btnGroup).prepend('<button type="button" class="btn btn-info" id="openSearch">' + (op.show === 'none' ? op.openText : op.closeText) + '</button>');
    };
    var $searchBox = $(op.box);
    $searchBox.css('display', op.show);
    $('#openSearch').on('click', function () {
        if ($searchBox.is(':hidden')) {
            $(this).text(op.closeText);
            $searchBox.show();
            sessionStorage.setItem(op.sessionKey, 'block');
        }
        else {
            $(this).text(op.openText);
            $searchBox.hide();
            sessionStorage.setItem(op.sessionKey, 'none');
        }
    });
};
