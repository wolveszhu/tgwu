<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/13
 * Time: 16:00
 */

namespace Admin\Controller;
use Think\Controller;

class UserController extends CommonController {
    public function index(){
        $root = __ROOT__;
        $this -> assign('root',$root);
        $this -> display();
    }
}