<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $waresCount = D('Wares') -> getWaresCount();
        $waresMaxBrowse = D('Wares') -> getMaxWaresBrowse();
        $this -> assign('waresCount',$waresCount);
        $this -> assign('maxBrowse',$waresMaxBrowse);
        $this -> display();
    }

}