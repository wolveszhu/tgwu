<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:49
 */

namespace Admin\Controller;

use Think\Page;

class InvitationController extends CommonController {
    public function index(){
        $p = $_GET['p'] ? $_GET['p'] : 1;
        $pageSize = 5;
        $invitations = D('Invitation') -> getInvitationPage($p,$pageSize);
        $invCount = D('Invitation') -> getInvitationCount();
        $res = new Page($invCount,$pageSize);
        $resPage = $res -> show();
        $this -> assign('page',$resPage);
        $this -> assign('invitations',$invitations);
        $this -> display();
    }
}