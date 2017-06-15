<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/15
 * Time: 16:00
 */

namespace Admin\Model;
use Think\Model;
use Think\Upload;

class ImageUploadModel extends Model{
    private $_uploadObj = '';
    private $_uploadImageData = '';

    const UPLOAD = 'upload';

    public function __construct(){
        $this -> _uploadObj = new Upload();

        $this -> _uploadObj -> rootPath = './' . self::UPLOAD . '/';
        $this -> _uploadObj -> subName = date(Y) . '/' . date(m) . '/' . date(d);
    }

    public function upload(){
        $res = $this -> _uploadObj -> upload();

        if($res){
            return '/' . self::UPLOAD . '/' . $res['imgFile']['savepath'] . $res['imgFile']['savename'];
        }else{
            return false;
        }
    }

    public function uploadImage(){
        $res = $this -> _uploadObj -> upload();

        if($res){
            return '/' . self::UPLOAD . '/' . $res['file']['savepath'] . $res['file']['savename'];
        }else{
            return false;
        }
    }
}