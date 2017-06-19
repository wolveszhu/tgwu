<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/14
 * Time: 10:51
 */

namespace Admin\Model;
use Think\Model;

class InvitationModel extends Model {
    private $_db = '';
    public function __construct(){
        $this -> _db = M('invitation');
    }

    public function getInvitations(){
        $data = [
            'id' => 'desc',
        ];

        return $this -> _db -> order($data) -> select();
    }

    public function getInvitationPage($page,$pageSize){
        $data = [
            'id' => 'desc',
        ];

        $page = $page == 0 ? 1 : $page;
        $offset = ($page - 1) * $pageSize;

        return $this -> _db -> order($data) -> limit($offset,$pageSize) -> select();
    }

    public function getInvitationCount(){
        return $this -> _db -> count('id');
    }
}