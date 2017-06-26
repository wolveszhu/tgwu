<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/26
 * Time: 13:58
 */

namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('User');
    }

    public function getUserById($userId){
        return $this -> _db -> where('id = ' . $userId) -> find();
    }
}