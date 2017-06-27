<?php
/**
 * Created by PhpStorm.
 * User: Administrator:stimmer
 * Date: 2017/6/6
 * Time: 11:11
 */
namespace Home\Controller;

use Think\Controller;
use Think\UserAgent;
use Think\Wechat;

class WechatController extends Controller {
    const OAUTH2_STATE_SALT = "ITSOAUTH2SALT";

    protected function getOAuth2State() {
        return md5(session_id() . self::OAUTH2_STATE_SALT);
    }

    public function signin($redirect_url = "http://xxx.xxx.com/") {

        $isWeixin = UserAgent::IS_WECHAT();
        if (!$isWeixin) {
            return $this->error("提示", "请在微信中打开链接");
        }
        $this->view->disable();

        $config = $this->config;
        $wxapp = $config->wechat->oauth2;

        $state = $this->getOAuth2State();
        $redirect_uri = "http://" . $wxapp->domain . "/wechat/callback?redirect_url=".$redirect_url;

        $url = Wechat::getOAuth2CodeUrl((object)array(
            'appid'         => $wxapp->appid,
            'scope'         => 'snsapi_base',
            'state'         => $state,
            'redirect_uri' => $redirect_uri,
        ));


//        $this->session->set("REDIRECT_URL", $redirect_url);
//        $this->response->redirect($url,true);
        session("REDIRECT_URL",$redirect_url);
        $this -> redirect($url);
    }

    /**
     * 有三种情况会回调这个Action：
     * 1. 桌面端snsapi_login
     * 2. 微信端snsapi_base
     * 3. 微信端snsapi_userinfo
     */
    public function callback() {
        //$this->view->disable();

        $config = $this->config;
        $isMobile = UserAgent::IS_MOBILE();
        $isWeixin = UserAgent::IS_WECHAT();

        //根据UserAgent来判断当前操作是 snsapi_login or snsapi_base, snsapi_userinfo
        //snsapi_login => 指桌面端扫描登录
        //snsapi_base  => 指微信端授权登录

        //        $callbackType = "oauth2";
        //        if ($isWeixin) {
        //            $wxapp = $config->wechat->oauth2;
        //        } else {
        //            $wxapp = $config->wechat->open;
        //            $callbackType = "open";
        //        }


        $callbackType = "oauth2";
        if ($isWeixin) {
            $wxapp = $config->wechat->oauth2;
        } else {
            $wxapp = $config->wechat->open;
            $callbackType = "open";
        }

        //检查参数
        //getQuery 获取GET方式传来的值
        $code = $this->request->getQuery("code");
        $state = $this->request->getQuery("state");


        if (empty($code))  { echo "code missing"; return false; }
        if (empty($state)) { echo "state missing"; return false; }

        if (!$this->checkOAuth2State($state)) {
            echo "state invalid";
            return false;
        }

        //根据 code 获取 access_token
        $raw = Wechat::getOAuth2AccessToken((object)array(
            'appid'     => $wxapp->appid,
            'appsecret' => $wxapp->appsecret,
            'code'      => $code
        ));


        if (empty($raw)) {
            echo "get access_token returns null";
            return false;
        }

        //echo $raw;
        /*
        {"access_token":"OezXcEiiBSKSxW0eoylIeGXB4XcKc5GK2EqEc12CUz7EYL25vDAyG0i4Zl9XSRgJqPlOuAJOEl61xZyIwYnPK284qxI1DwN_It3tyoIqEKQNsou7UO7mOHnreJewSA8PLoSkqEKrbtTJ-Zj7LUe_Jg",
        "expires_in":7200,
        "refresh_token":"OezXcEiiBSKSxW0eoylIeGXB4XcKc5GK2EqEc12CUz7EYL25vDAyG0i4Zl9XSRgJauIPsuDJ6RHizWJ1gnRHz3BAQW_FVHyZiY2T-FmtYp0eF13a_pNKo5ZP3HIQJ70fVtNtu3w0sKBFPvMMqhANlw",
        "openid":"oPhMiuDIggVuZNqbMdVRJlUzyqjM",
        "scope":"snsapi_base",
        "unionid":"o-PCHt2i1c7hJlKNm4fSPu8wp0es"}
        */
        $data = json_decode($raw);

        if (property_exists($data, 'errcode')) {
            echo "getOAuth2AccessToken : " . $raw;
            return false;
        }

        $scope = $data->scope;
        $refresh_token = $data->refresh_token;
        $access_token = $data->access_token;
        $openid = $data->openid;

        //记录跳转地址

        //TODO 根据unionid 判断用户是否存在


        $raw = Wechat::getUserInfo((object)array(
            'access_token'  => $access_token,
            'openid'        => $openid
        ));
        /*
        {"openid":"ojxeLs2CPeCieG0sIYtrCzwkPdLk",
        "nickname":"三七步","sex":1,"language":"zh_CN","city":"杭州","province":"浙江","country":"中国",
        "headimgurl":"http:\/\/wx.qlogo.cn\/mmopen\/vAYfZZmzbT3LKakm5ls0DzPRI5kHsxTIHXGEiaNPRNSicGnZaOKXDU9icPp9vibh3ONaLrHy8WVSxRIBaMh30WHHCtv5Jy1RdLSD\/0",
        "privilege":[],"unionid":"o-PCHt2i1c7hJlKNm4fSPu8wp0es"}
        */

        if (empty($raw)) {
            echo "get user info returns null";
            return false;
        }

        $data = json_decode($raw);
        $unionid = null;
        if(property_exists($data,'unionid')){
            $unionid = $data->unionid;
        }
        if (property_exists($data, 'errcode')) {
            //48001 在用户没有授权过时，使用snsapi_base获取的access_token无法操作userinfo，需要发起授权
            if (($data->errcode == 48001) && ($scope == "snsapi_base")) {
                Logger::debug("wechat:callback [48001] => redirect snsapi_userinfo");

                $this->redirectSnsApiUserInfo();
                return;
            } else {
                echo "wechat::callback getUserInfo => " . $raw;
            }
            return false;
        }

        //echo "OK === " . $raw;
        if(! $this->cacheDu->hexists($openid,"user")){
            $userweixin = Userweixin::findFirst(array(
                'weixinUnionId = :weixinUnionId: and orgId = 0',
                'bind' => array ( 'weixinUnionId' => $unionid ),
                'order' => 'userId asc'
            ));

            if (! $userweixin ) {
                $user = new User();
                $uid =$this->id->getNext("user");

                $user->id = $uid;
                $user->unionId = $unionid;
                if ($isWeixin) $user->openId = $openid;
                $user->username = $uid;
                $user->mail = $uid;
                $user->mobile = $uid;
                $user->nickName = $data->nickname;
                $user->sex = $data->sex;
                $user->createSide =UserAgent::IS_WECHAT();
                $user->createType =$user->CREATE_TYPE_MAIL;
                $user->createAddr =$_SERVER["REMOTE_ADDR"];
                $user->createAgent = $_SERVER['HTTP_USER_AGENT'];
                $user->userImage = $data->headimgurl;
                //$user->truename = $data->nickname;
                // $user->icon = $data->headimgurl;
                $user->createTime = new RawValue('now()');

                $userweixin = new Userweixin();
                $userweixin->weixinUnionId = $unionid;
                //$userweixin->appId = $wxapp->appid;
                $userweixin->weixinId = $openid;
                $userweixin->userId = $user->id;
            }
            else {
                $user = User::findFirst(array(
                    'id = :id: and orgId = 0',
                    'bind' => array( 'id' => $userweixin->userId )
                ));
                if(!$user){
                    $user = new User();
                    $uid =$this->id->getNext("user");

                    $user->id = $uid;
                    if ($isWeixin) $user->openId = $openid;
                    $user->username = $uid;
                    $user->mail = $uid;
                    $user->mobile = $uid;
                    $user->nickName = $data->nickname;
                    $user->sex = $data->sex;
                    $user->createSide =UserAgent::IS_WECHAT();
                    $user->createType =$user->CREATE_TYPE_MAIL;
                    $user->createAddr =$_SERVER["REMOTE_ADDR"];
                    $user->createAgent = $_SERVER['HTTP_USER_AGENT'];
                    $user->userImage = $data->headimgurl;
                    $user->createTime = new RawValue('now()');
                }

                $user->unionId = $unionid;
                if($scope != "snsapi_login")
                {
                    $user->openId = $openid;  //新老平台微信用户兼容，更新
                }
                $user->nickName = $data->nickname;
                $user->userImage = $data->headimgurl;
            }
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    echo (string) $message;
                }
                return;
            }

            $userweixin->weixinName = $data->nickname;
            $userweixin->weixinSex = $data->sex;
            $userweixin->weixinCountry = $data->country;
            $userweixin->weixinProvince = $data->province;
            $userweixin->weixinCity = $data->city;
            $userweixin->weixinImage = $data->headimgurl;
            $userweixin->weixinLanguage = $data->language;
            $userweixin->weixinPrivilege = json_encode($data->privilege);
            // $userweixin->save();

            if ($userweixin->save() == false) {
                foreach ($user->getMessages() as $message) {
                    echo (string) $message;
                }
                return false;
            }

            $this->cacheDu->hset($openid,"user",json_encode($userweixin));
            $this->cacheDu->hset("u_".$user->id,"user",json_encode($user));
            $this->cacheDu->expire($openid,86400);
            $this->cacheDu->expire("u_".$user->id,86400);
        }

        $userweixin = $this->cacheDu->hgetCache($openid,"user","OBJ");
        if(!$this->cacheDu->hexists("u_".$userweixin->userId,"user")){
            $user = User::findFirst(array(
                'id = :id:',
                'bind' => array( 'id' => $userweixin->userId )
            ));
            $this->cacheDu->hset($openid,"user",json_encode($userweixin));
            $this->cacheDu->hset("u_".$user->id,"user",json_encode($user));
            $this->cacheDu->expire($openid,86400);
            $this->cacheDu->expire("u_".$userweixin->userId,86400);
        }
        $user = $this->cacheDu->hgetCache("u_".$userweixin->userId,"user","OBJ");

        $this->session->set("orgId",0);
        $this->auth->login($user, null, 0, true, true);
        //$this->session->remove("REDIRECT_URL");
        $redirect_url = $this->session->get("REDIRECT_URL");
        $this->response->redirect($redirect_url);
        //$this->response->redirect();

        //echo $raw;
    }
}