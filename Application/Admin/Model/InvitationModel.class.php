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

}