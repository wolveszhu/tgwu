<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $carousels = D('Carousel') -> getCarouselstatus();
        $this -> assign('carousels',$carousels);
        $this -> display();
    }
}