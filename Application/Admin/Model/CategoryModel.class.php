<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:56
 */

namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model {
    private $_db = '';

    public function __construct(){
        $this -> _db = M('category');
    }
}