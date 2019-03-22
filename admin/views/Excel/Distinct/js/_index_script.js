$(function(){
    //导入Excel
    $("#import").on('click',function(){
        var file = $("#myFile").val();
        if(file === ""){
            Modal.alert("请选择文件","error");
            return false;
        }
        $("#importForm").submit();
    });
    //导出Excel
    $("#export").on('click',function(){
        location.href = "export?gcId=1";
    });
});

$('#navTabs a').on('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
    $(this).prev('.closeTab').css('display','block');
    $(this).parents('li').siblings('li').find('span').css('display','none');
});

$('#navTabs').on('show.bs.tab',function(e){
    var url = $(e.target).attr('href');
    if(url != '#') {
        getListHtml(url,$(e.target).attr('data-target'));
        $(e.target).attr('href','#');
    }
});

$('.closeTab').on('click',function(){
    var tabId = $(this).data('tabId');
    $.AJAX({url:'delete',data:{'tabId':tabId},type:"POST",success:function (res) {
        console.log(res);
   }});
});

function getListHtml(url,selector) {
    $.GET(url,function(res){
        $(selector).html(res);
        $('.pagination a').unbind('click').on('click',function(i){
            i.preventDefault();
            var url = $(this).attr('href');
            getListHtml(url,$(this).parents('.tab-pane'));
        });
        $(".table.table-fixed").FixedHead({
            bgColor: "#fff",
            parentBox: ".tab-pane.active ",
            bottomBox: ".box-footer.clearfix",
            adjustHeight: "1",
            minHeight: "200"
        });
    });
}

$('#navTabs a:eq(' + _opt.defaultTab + ')').triggerHandler('click');