<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:45
 */

namespace Admin\Controller;

use Think\Exception;

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
            if(!isset($_POST['carouselDesc']) || !$_POST['carouselDesc']){
                return show(0,'描述不存在');
            }
            if(!isset($_POST['carouselPath']) || !$_POST['carouselPath']){
                return show(0,'跳转地址不存在');
            }

            if($_POST['id']){
                return $this -> save($_POST);
            }

            $carouselId = D('Carousel') -> insert($_POST);

            if($carouselId){
                return show(1,'新增成功');
            }else{
                return show(0,'新增失败');
            }
        } else {
            $this -> display();
        }
    }

    public function save($data){
        $carouselId = $data['id'];
        unset($data['id']);

        try{
            $carouselNewId = D('Carousel') -> updateCarouselById($carouselId,$data);
            if($carouselNewId === false){
                return show(0,'数据更新失败');
            }
            return show(1,'更新成功');
        }catch (Exception $exception){
            return show(0,$exception -> getMessage());
        }
    }

    public function setStatus(){
        try{
            if($_POST){
                $carouselId = $_POST['id'];
                unset($_POST['id']);

                if(!$carouselId){
                    return show(0,'ID不存在');
                }

                $res = D('Carousel') -> updateCarouselStatusById($carouselId,$_POST);
                if(!$res){
                    return show(0,'更新失败');
                }else{
                    return show(1,'更新成功');
                }
            }
            return show(0,'没有提交任何内容');
        }catch (Exception $exception){
            return show(0,$exception -> getMessage());
        }
    }

    public function delete(){
        try{
            if($_POST){
                $carouselId = $_POST['id'];
                if(!$carouselId){
                    return show(0,'ID不存在');
                }
                $res = D('Carousel') -> deleteCarouselById($carouselId);
                if(!$res){
                    return show(0,'删除失败');
                }else{
                    return show(1,'删除成功');
                }
            }
            return show('0','没有提交任何内容');
        }catch (Exception $exception){
            return show(0,$exception -> getMessage());
        }
    }

    public function listorder(){
        $carouselSort = $_POST['carouselsort'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = [];

        try{
            if($carouselSort){
                foreach ($carouselSort as $item => $value){
                    $id = D('Carousel') -> updateCarouselSortById($item,$value);
                    if($id === false){
                        $errors[] = $item;
                    }
                }
                if($errors){
                    return show(0,'排序失败-' . implode(',',$errors),array('jump_url' => $jumpUrl));
                }
                return show(1,'排序成功',array('jump_url' => $jumpUrl));
            }
        }catch (Exception $exception){
            return show(0,$exception -> getMessage());
        }
        return show(0,'数据排序失败',array('jump_url' => $jumpUrl));
    }
}