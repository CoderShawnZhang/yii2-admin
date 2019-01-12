var modalInfo = $('#modal-info');
var modalAlert = $('#modal-alert');
var modalConfirm = $('#modal-confirm');
var Modal = {
    info:function (message, type, desc) {
        modalInfo.find('modal-info').html(message);
        modalAlert.find('.modal-text').html(desc);
        if(type == '') {
            modalInfo.find('.modal-body i').hide();
        } else if(type == 'success') {
            modalInfo.find('modal-boy i').removeClass().addClass('fa fa-check-circle');
        } else if(type == 'error') {
            modalInfo.find('modal-boy i').removeClass().addClass('glyphicon glyphicon-remove-circle');
        }
        modalInfo.show();
        return {
            on:function(callback){
                if(callback && callback instanceof Function){
                    modalInfo.find('.ok').click(function(){
                       callback(true);
                    });
                }
            }
        }
    },
    alert:function (message, type, desc, isStatic) {
        modalAlert.find('.modal-info').html(message);
        modalAlert.find('.modal-text').html(desc);
        if(type == ''){
            modalAlert.find('.modal-body i').hide();
        } else if(type == 'success') {
            modalAlert.find('.modal-body i').removeClass().addClass('fa fa-check-circle');
        } else if(type == 'error') {
            modalAlert.find('.modal-body i').removeClass().addClass('glyphicon glyphicon-remove-circle');
        }
        if(isStatic) {
            modalAlert.modal({backdrop:'static',keyboard:false,show:true});
        } else {
            modalAlert.modal('show');
        }
        return {
            on: function (callback) {
                if(callback && callback instanceof Function) {
                    modalAlert.find('.ok').click(function(){
                       callback(true);
                    });
                }
            }
        }
    },
    confirm:function (message) {
        modalConfirm.find('.modal-info').html(message);
        modalConfirm.modal({backdrop:'static',keybord:true});
        modalConfirm.modal('show');
        return {
            on: function (callback) {
                if (callback && callback instanceof Function) {
                    modalConfirm.find('.ok').click(function () {
                        modalConfirm.find('.ok').unbind();
                        callback(true);
                    });
                    modalConfirm.find('.cancel').click(function () {
                        modalConfirm.find('.ok').unbind();
                        modalConfirm.find('.cancel').unbind();
                        callback(false);
                    });
                }
            }
        };
    }
}