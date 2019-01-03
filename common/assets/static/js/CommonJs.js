
(function(){
    $.Guid = function(){
        var guid = '';
        for(var i = 1;i <= 32; i++){
            var n = Math.floor(Math.random()*16.0).toString(16);
            guid += n;
            if((i==8) || (i==12) || (i==16) || (i==20)) guid += "-";
        }
        return guid;
    }

    $.LOADING=function(picClassName,desc){
        var load_id = $.Guid()+picClassName;
        var modal = $("#"+load_id);
        if(modal.length == 0){
            modal =  $('<div class="modal fade in search-modal" style="display:none;" id="'+load_id+'">'+
                '<div class="admin-loading">'+
                '<div class="'+picClassName+'"></div>'+
                '<div class="admin-loading-text">'+desc+'</div>'+
                '</div>'+
                '</div>');
            modal.appendTo("body");
        }
        return {
            "show":function(){
                modal.show();
            },
            "hide":function(){
                modal.hide();
            },
            "remove":function(){
                modal.remove();
            }
        }
    }

    $.AJAX=function(opts){
        var hideImg = opts.hideImg||false,
            loadDesc = opts.loadDes||"努力加载中<admin>...</admin>",
            loadObj = $.LOADING(!hideImg?"admin-loading-pic":"",loadDesc);
        opts = $.extend(true,{
            beforeSend:loadObj.show,
            complete:loadObj.hide,
            error:function(){
                alert(111);
            },
            success:function(){}
        },opts);
        return $.ajax({
            url:opts.url,
            data:opts.data,
            type:opts.type||'GET',
            beforeSend:opts.beforeSend
        })
            .success(opts.success)
            .fail(opts.error)
            .always(opts.complete)
    }
    
    $.GET=function(url,callback){
        return $.AJAX({
            url:url,
            success:callback,
            type:"GET"
        });
    }
})($);