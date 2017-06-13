<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/13
 * Time: 9:36
 */

namespace Admin\Controller;
use Think\Controller;
use Common\Model;

class LoginController extends Controller{
    public function index(){
        $this -> display();
    }

    public function check(){
        $username = $_POST['username'];
        $pwd = $_POST['password'];

        if(!trim($username)){
            return show(0,'用户名不能为空');
        }

        if(!trim($pwd)){
            return show(0,'密码不能为空');
        }

        $res = D('user') -> getDetailByNickName($username);

        if(!$res || $res['status'] != 1){
            return show(0,'用户不存在');
        }

        if($res['password'] != getMd5Password($pwd)){
            return show(0,'密码不正确');
        }

        session('adminUser',$res);
        return show(1,'登录成功!');
    }
}