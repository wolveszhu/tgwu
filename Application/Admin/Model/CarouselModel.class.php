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

    public function getCarousels(){
        $data = [
            'carouselStatus' => 'desc',
            'carouselId' => 'desc'
        ];
        return $this -> _db -> order($data) -> select();
    }

    public function getCarouselById($id){
        return $this -> _db -> where('carouselId='.$id) -> find();
    }

    public function insert($data = array()){
        if(!data || !is_array($data)){
            return 0;
        }

        return $this -> _db ->add($data);
    }
}