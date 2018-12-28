
/**
 * 控制搜索面板
 * @param {Object} options
 */
function searchBox(options) {
    var enableList = ["orders", "store-orders", "orders-abnormal", "orders-finance"];
    var currentUrl = (location.href).split('?')[0];
    var newSearchType = enableList.indexOf(options.type) != -1;
    var op = $.extend({
        btn: '.content-header h1',      //事件按钮
        btnGroup: ' .btnGroupBox',      //按钮组
        box: '.box.box-default',         //事件盒子
        show: sessionStorage.getItem(currentUrl) || (newSearchType ? "block" : 'none'), //是否显示搜索块
        btnName: '', //按钮名称
        type: '',
        searchField: []
    }, options);
    // 判断是否是按按钮组
    if ($(op.btn + op.btnGroup).length == 0) {
        $(op.btn).append('<button type="button" class="btn btn-info" id="openSearch">' + (op.show === 'none' ? '打开搜索' : '收起搜索') + '</button>');
    } else {
        $(op.btn + op.btnGroup).prepend('<button type="button" class="btn sbtn-info" id="openSearch">' + (op.show === 'none' ? '打开搜索' : '收起搜索') + '</button>');
    };
    var $searchBox = $(op.box);

    if (op.type == "") {
        $searchBox.css('display', op.show);
        $('#openSearch').on('click', function () {
            if ($searchBox.is(':hidden')) {
                $(this).text('收起搜索');
                $searchBox.show();
                sessionStorage.setItem(currentUrl, 'block');
            }
            else {
                $(this).text('打开搜索');
                $searchBox.hide();
                sessionStorage.setItem(currentUrl, 'none');

            }
        });
    }
};
