/**
 * 图片上传功能
 */
$(function() {
    $('#file_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                $('#' + file.id).find('.data').html(' 上传完毕');

                obj.newdata = SCOPE.root + obj.data;
                $("#upload_org_code_img").attr("src",obj.newdata);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });

    $('#file_upload_mut').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传图片',
        'fileTypeDesc': 'Image Files',
        'fileObjName' : 'file',
        //允许上传的文件后缀
        'fileTypeExts': '*.gif; *.jpg; *.png',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象

                $('#' + file.id).find('.data').html(' 上传完毕');

                obj.newdata = SCOPE.root + obj.data;
                $("#upload_org_code_imgs").attr("src",obj.newdata);
                $("#file_upload_images").attr('value',obj.data);
                $("#upload_org_code_imgs").show();
            }else{
                alert('上传失败');
            }
        },
    });
});




