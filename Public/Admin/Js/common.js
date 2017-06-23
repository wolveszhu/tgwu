/**
 * 添加按钮操作
 */
$("#button-add").click(function () {
    var url = SCOPE.add_url;
    window.location.href = url;
});

/**
 * 提交form表单操作
 */
$("#singcms-button-submit").click(function(){
    var data = $("#singcms-form").serializeArray();
    var postData = {};
    $(data).each(function(i){
        postData[this.name] = this.value;
    });
    // console.log(postData);
    // 将获取到的数据post给服务器
    var url = SCOPE.save_url;
    var jump_url = SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            return dialog.success(result.message,jump_url);
        }else if(result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
    },"JSON");
});

/**
 * 提交form表单操作
 */
var status = 1;
var numVal = '';
$('#inviNum').keyup(function () {
    numVal = $(this).val();
});


$("#singcms-button-submitradio").click(function () {

    // var data = $("#singcms-form").serializeArray();
    // var postData = {};
    // $(data).each(function(i){
    //    postData[this.name] = this.value;
    // });
    // console.log(postData);
    var data = $('.form-group').find('input[type=radio]');
    var radioVal = '';
    data.each(function () {
        if ($(this).prop('checked') === true) {
            if ($(this).attr('id') === 'termOfValidity4') {
                radioVal = $('#termOfValidity5').val();
                $('#termOfValidity5').keyup(function () {
                    radioVal = $(this).val();
                });
            } else {
                radioVal = $(this).val();
            }
        }
    });

    var postData = {
        inviNum: numVal,
        termOfValidity: radioVal
    };

    console.log(postData);
    //将获取到的数据post给服务器
    var url = SCOPE.save_url;
    var jump_url = SCOPE.jump_url;
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message, jump_url);

        } else if (result.status == 0) {
            // 失败
            return dialog.error(result.message);
        }
    }, "JSON");
});
/*
 编辑模型
 */
$('.singcms-table #singcms-edit').on('click', function () {
    var id = $(this).attr('attr-id');
    var url = SCOPE.edit_url + '?id=' + id;
    window.location.href = url;
});


/**
 * 删除操作JS
 */
$('.singcms-table #singcms-delete').on('click', function () {
    var id = $(this).attr('attr-id');
    var a = $(this).attr("attr-a");
    var message = $(this).attr("attr-message");
    var url = SCOPE.delete_url;

    var data = {};
    data['id'] = id;

    layer.open({
        type: 0,
        title: '提示信息',
        btn: ['yes', 'no'],
        icon: 3,
        closeBtn: 2,
        content: "是否确定" + message,
        scrollbar: true,
        yes: function () {
            // 执行相关跳转
            todelete(url, data);
        },

    });

});
function todelete(url, data) {
    $.post(
        url,
        data,
        function (s) {
            if (s.status == 1) {
                return dialog.success(s.message, '');
                // 跳转到相关页面
            } else {
                return dialog.error(s.message);
            }
        }
        , "JSON");
}

/**
 * 排序操作
 */
$('#button-listorder').click(function () {
    // 获取 listorder内容
    var data = $("#singcms-listorder").serializeArray();
    var postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    // console.log(data);
    var url = SCOPE.listorder_url;
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message, result['data']['jump_url']);
        } else if (result.status == 0) {
            // 失败
            return dialog.error(result.message, result['data']['jump_url']);
        }
    }, "JSON");
});

/**
 * 修改状态
 */
$('.singcms-table #singcms-on-off').on('click', function () {

    var id = $(this).attr('attr-id');
    var status = $(this).attr("attr-status");
    var url = SCOPE.set_status_url;

    var data = {};
    data['id'] = id;
    data['status'] = status;

    layer.open({
        type: 0,
        title: '提示信息',
        btn: ['yes', 'no'],
        icon: 3,
        closeBtn: 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function () {
            // 执行相关跳转
            todelete(url, data);
        },

    });

});


/*$('.search #name-search').on('click',function () {
 var name = $('#nameSearch').val();
 var data = {};
 data['nickName'] = name;
 var url = SCOPE.namesearch_url;
 // console.log(data);
 $.post(url,data,function (result) {

 },'json');
 });*/
