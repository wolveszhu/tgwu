<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:49
 */

namespace Admin\Controller;

class InvitationController extends CommonController {
    public function index(){
        $res = D('invitation') -> getInvitations();
        $this -> assign('invitations',$res);
        $this -> display();
    }
}