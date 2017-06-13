<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/8
 * Time: 15:09
 */
namespace Home\Controller;
use Think\Controller;

class TestController extends Controller{
    public function index(){
        $this -> display();
    }
}