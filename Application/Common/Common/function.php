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