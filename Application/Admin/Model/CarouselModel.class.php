<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:47
 */

namespace Admin\Model;
use Think\Model;

class CarouselModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('carousel');
    }
}