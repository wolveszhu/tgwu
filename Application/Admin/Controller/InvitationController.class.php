<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:49
 */

namespace Admin\Controller;

use Think\Exception;
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

    public function add(){
        $this -> display();
    }

    public function search(){
        $invitationId = $_GET['Code'];
//        $this -> assign('inv',$invitationId);
        $res = D('Invitation') -> getInvitationByCode($invitationId);
        $jump_url = '{:U("search")}';
        if(!$res){
            return show(0,'用户不存在');
        }else{
            $this -> assign('invitation',$res);
            $this -> display();
            return show(1,'查找成功',array('jump_url' => $jump_url));
        }
    }

    public function delete(){
        try{
            if($_POST){
                $invitationId = $_POST['id'];
                if(!$invitationId){
                    return show(0,"ID不存在");
                }

                $res = D('Invitation') -> deleteInvitationById($invitationId);
                if(!$res){
                    return show(0,"删除失败");
                }else{
                    return show(1,"删除成功");
                }
            }
            return show(0,"没有提交任何内容");
        }catch (Exception $exception){
            return show(0,$exception -> getMessage());
        }
    }
}