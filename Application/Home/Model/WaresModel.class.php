<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 11:02
 */

namespace Home\Model;
use Think\Model;

class WaresModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('Wares');
    }

    public function getWares(){
        $data = [
            'wareSort' => 'desc',
        ];
        $where = [
            'isNew' => '1',
        ];
        return $this -> _db -> where($where) -> order($data) -> limit(0,6) -> select();
    }

    public function getWaresCount(){
        return $this -> _db -> count('id');
    }


    public function getWareById($id){
        return $this -> _db -> where('id = ' . $id) -> find();
    }

    public function getMaxWaresBrowse(){
        return $this -> _db -> distinct(true) -> field('wareName') -> group('browseTimes') -> order('browseTimes desc') -> limit(1) -> select();
    }

    public function getWaresKind($categoryId){
        $where = [
            'categoryId' => $categoryId,
            'status' => '1',
        ];

        $order = [
            'wareSort' => 'desc',
            'id' => 'desc'
        ];
        return $this -> _db -> where($where) -> order($order) -> select();
    }
}