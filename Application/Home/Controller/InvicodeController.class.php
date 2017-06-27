<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/1
 * Time: 13:36
 */
namespace Home\Controller;
use Think\Controller;

class InvicodeController extends Controller{
    public function index(){
        $this -> display();
    }

    public function auth(){
        $nonce = $_GET['nonce'];
        $token = 'missto';
        $timestamp = $_GET['timestamp'];
        $echostr = $_GET['echostr'];
        $signature = $_GET['signature'];

        $arr = array();
        $arr = array($nonce,$timestamp,$token);
        sort($arr);
        $str = sha1(implode($arr));
        if($str == $signature && $echostr){
            echo $echostr;
            exit;
        }
    }
}