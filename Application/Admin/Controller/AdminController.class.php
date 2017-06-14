<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:07
 */

namespace Admin\Controller;


class AdminController extends CommonController {
    public function personal(){
        $res = $this -> getLoginUser();
        $admin = D('Admin') -> getAdminByName($res['adminname']);
        $this -> assign('admin',$admin);
        $this -> display();
    }

    public function save(){
        echo 'fsd';
    }
}