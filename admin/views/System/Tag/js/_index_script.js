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
            var url = $(this).attr('data-url');
            Modal.confirm('确定要删除吗？').on(function(e){
                if(!e) return;
                $.AJAX({url:url,type:"GET",success:function (res) {
                    if(res.success){
                        Modal.alert('删除成功！','success').on(function(){
                           window.location.reload();
                        });
                    }
                }});
            });
        });
    });
}

$(function(){
    var selector = $('.tab-pane');
    var url = selector.data('url');
    getListHtml(url,selector);
});

