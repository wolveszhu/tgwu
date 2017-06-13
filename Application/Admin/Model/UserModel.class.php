<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/13
 * Time: 10:38
 */

namespace Common\Model;
use Think\Model;

class UserModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('user');
    }

    public function getDetailByNickName($nickName){
        $res = $this -> _db -> where('nickName="'.$nickName.'"') -> find();
        return $res;
    }
}