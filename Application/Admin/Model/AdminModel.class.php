<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:09
 */

namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('Admin');
    }

    public function getAdminByName($username){
        $res = $this -> _db -> where('adminName="' . $username .'"') -> find();
        return $res;
    }
}