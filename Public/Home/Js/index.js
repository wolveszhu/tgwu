/**
 * Created by Administrator on 2017/6/2.
 */

/**
 * 收藏商品操作
 */
$(document).ready(function () {
    $(".shoucang .ware-detail").click(function(){
        var id = $(this).attr('attr-id');
        console.log(id)
        alert(id);
        // 将获取到的数据post给服务器
        var url = SCOPE.coll_url;
        var data = {};
        data['id'] = id;
        $.post(url,data,function(result){
            if(result.status == 1) {
                //成功
                return dialog.success(result.message);
            }else if(result.status == 0) {
                // 失败
                return dialog.error(result.message);
            }
        },"JSON");
    });
});

/*
$('.shoucang #ware-detail').on('click', function () {
    var id = $(this).attr('attr-id');
    console.log(id);
});*/
