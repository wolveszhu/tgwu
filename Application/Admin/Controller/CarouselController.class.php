<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:45
 */

namespace Admin\Controller;

class CarouselController extends CommonController {
    public function index(){
        $carousels = D('carousel') -> getCarousels();
        $this -> assign('carousels',$carousels);
        $this -> display();
    }

    public function edit(){
        $carouselId = $_GET['id'];

        if(!$carouselId){
            $this -> redirect('index');
        }
        $carousel = D('carousel') -> getCarouselById($carouselId);

        if(!$carousel){
            $this -> redirect('index');
        }

        $this -> assign('carousel',$carousel);
        $this -> display();
    }

    public function add(){
        if($_POST){
            if(!isset($_POST['desc']) || !$_POST['desc']){
                return show(0,'描述不存在');
            }
            if(!isset($_POST['carousort']) || !$_POST['carousort']){
                return show(0,'自主排序不存在');
            }
            if(!isset($_POST['carouskip']) || !$_POST['carouskip']){
                return show(0,'跳转地址不存在');
            }

            $carouselId = D('carousel') -> insert($_POST);
            if($carouselId){
                return show(1,'新增成功');
            }else{
                return show(0,'新增失败');
            }
        } else {
            $this -> display();
        }
    }
}