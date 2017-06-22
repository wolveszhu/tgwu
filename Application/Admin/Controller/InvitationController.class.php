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
        $code = trim($_GET['code']);
        if(!$code){
            $this -> redirect('index');
        }
        $res = D('Invitation') -> getInvitationByCode($code);
        if(!$res){
            $this -> redirect('index');
        }else{
            $this -> assign('invitation',$res);
            $this -> display();
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

    public function nameSearch(){
        $name = trim($_GET['invitationName']);
        if(!$name){
            $this -> redirect('index');
        }
        $res = D('Invitation') -> getInvitationByName($name);
        if(!$res){
            $this -> redirect('index');
        }else{
            $this -> assign('invitations',$res);
            $this -> display();
        }
    }

    public function save(){
        if($_POST){
            $num = $_POST['inviNum'];
            $termOfValidity = $_POST['termOfValidity'];
            if(!$num){
                return show(0,"生成数量没有填入");
            }
            if(!$termOfValidity){
                return show(0,"有效期没有选择");
            }
            $inviCodes = $this -> getInviCodes($num);

        }
        return show(0,"没有提交任何数据");
    }

    /**
     * @param int $num 生成邀请码的数量
     * @return array $codes 返回生成的邀请码和创建时间的二维数组
     */
    public function getInviCodes($num){

    }
}