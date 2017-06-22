<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/13
 * Time: 9:30
 */

function  show($status, $message,$data=array()) {
    $reuslt = array(
        'status' => $status,
        'message' => $message,
        'data' => $data,
    );

    exit(json_encode($reuslt));
}

function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}

function status($status) {
    if($status == 0) {
        $str = '关闭';
    }elseif($status == 1) {
        $str = '正常';
    }elseif($status == -1) {
        $str = '删除';
    }
    return $str;
}

function ishotnew($status){
    if($status == 1){
        $str = "是";
    }else{
        $str = "否";
    }
    return $str;
}

function isreduce($status){
    if($status == -1){
        $str = "否";
    }else{
        $str = "是";
    }
    return $str;
}

function isCarousel($carousel) {
    if($carousel) {
        return '<span style="color:red">有</span>';
    }
    return '无';
}

function showKind($status,$data) {
    header('Content-type:application/json;charset=UTF-8');
    if($status==0) {
        exit(json_encode(array('error'=>0,'url'=>$data)));
    }
    exit(json_encode(array('error'=>1,'message'=>'上传失败')));
}

function getLoginUsername() {
    return $_SESSION['adminUser']['adminname'] ? $_SESSION['adminUser']['adminname']: '';
}