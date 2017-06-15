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
            'id' => 'desc',
            'status' => 'desc'
        ];
        return $this -> _db -> order($data) -> select();
    }

    public function getCarouselById($id){
        return $this -> _db -> where('id='.$id) -> find();
    }

    public function insert($data = array()){
        if(!$data || !is_array($data)){
            return 0;
        }

        return $this -> _db -> add($data);
    }

    public function updateCarouselById($id,$data){
        if(!$id || !is_numeric($id)){
            E('ID不合法');
        }
        if(!$data || !is_array($data)){
            E('更新数据不合法');
        }

        return $this -> _db -> where('id=' . $id) -> save($data);
    }

    public function deleteCarouselById($id){
        if(!$id || !is_numeric($id)){
            E('ID不合法');
        }

        return $resId = $this -> _db -> where('id=' . $id) -> delete();
    }

    public function updateCarouselStatusById($id,$data){
        if(!$id || !is_numeric($id)){
            E('ID不合法');
        }

        if(!$data || !is_array($data)){
            E('更新数据不合法');
        }

        return $this -> _db -> where('id='.$id) -> save($data);
    }

    public function updateCarouselSortById($id,$carouselSort){
        if(!$id || !is_numeric($id)){
            E('ID不合法');
        }
        $data = array('carouselSort' => intval($carouselSort));

        return $this -> _db -> where('id=' . $id) -> save($data);
    }
}