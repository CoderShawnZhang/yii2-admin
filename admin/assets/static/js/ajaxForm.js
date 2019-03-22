
var ajaxFormBeforeSubmit = function () {
  alert('ajaxFormBeforeSubmit');
};

var ajaxFormSuccess = function (response) {
    if (response.success) {
        Modal.alert(response.message ? response.message : '操作成功', 'success').on(function(e){
            location.href = response.url ? response.url : '';
        });
    } else {
        Modal.alert(response.message ? response.message : '操作失败', 'error');
        $(":submit, .confirm-submit").removeAttr('disabled');
    }
};

var ajaxFormError = function () {
  alert('ajaxFormError');
};
