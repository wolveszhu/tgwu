<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 11:02
 */

namespace Admin\Model;
use Think\Model;

class WaresModel extends Model{
    private $_db = '';

    public function __construct(){
        $this -> _db = M('wares');
    }
}