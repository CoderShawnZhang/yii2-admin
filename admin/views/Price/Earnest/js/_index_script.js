function getListHtml(url,selector) {
    $.GET(url,function(res){
        $(selector).html(res);
        $('.pagination a').on('click',function(i){
            i.preventDefault();
            var url = $(this).attr('href');
            getListHtml(url,$(this).parents('.tab-pane'));
        });
    });
}

$(function(){
    var selector = $('.tab-pane');
    var url = selector.data('url');
    getListHtml(url,selector);
});

