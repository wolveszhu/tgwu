<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $carousels = D('Carousel') -> getCarouselstatusOne();
        $this -> assign('carousels',$carousels);

        $cars = D('Carousel') -> getCarouselstatus();
        $this -> assign('cars',$cars);

        $categorys = D('Category') -> getCategorys();
        $this -> assign('categorys',$categorys);

        $wares = D('Wares') -> getWares();
        $this -> assign('wares',$wares);
        $this -> display();
    }
}