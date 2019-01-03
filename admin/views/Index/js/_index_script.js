$(function(){
    searchSWitch({box:"#searchBox"});
});

$('#navTabs a').on('click',function (e) {
    e.preventDefault();
    $(this).tab('show');
});
$('#navTabs').on('show.bs.tab',function(e){
    var url = $(e.target).attr('href');
    if(url != '#') {
        getListHtml(url,$(e.target).attr('data-target'));
        $(e.target).attr('href','#');
    }
});
function getListHtml(url,selector) {
    $.GET(url,function(res){
        $(selector).html(res);
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
