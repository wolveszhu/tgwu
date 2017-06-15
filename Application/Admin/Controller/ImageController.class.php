<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/15
 * Time: 15:55
 */

namespace Admin\Controller;
use Think\Controller;

class ImageController extends Controller{
    private $_uploadObj;

    public function __construct()
    {
    }

    public function ajaxUploadImage(){
        $upload = D('ImageUpload');
        $res = $upload -> uploadImage();
        if($res === false){
            return show(0,'上传失败');
        }else{
            return show(1,'上传成功');
        }
    }

    public function kindUpload(){
        $upload = D('ImageUpload');
        $res = $upload -> upload();
        if($res === false){
            return showKind(1,'上传失败');
        }else{
            return showKind(0,$res);
        }
    }
}