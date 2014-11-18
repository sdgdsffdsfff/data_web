<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
require_once(CODE_BASE . 'libs/auth.php');
require_once(CODE_BASE . 'model/api_user.php');

//check ladp
//check privalege
//store session, return username, token, reprot_id s

class UserController extends BaseController
{
    const UNKOWN = 0;
    const WRONG_USERNAME = 1;
    const WRONG_PASSWORD = 2;
    const NEED_ADMIN_ADD = 3;
    private $mysql;
    private $user_model;

    public function __construct($app){
        parent::__construct($app);
        $this->mysql = $this->_app->config('mysql_db');
        $this->user_model = new UserModel($this->mysql);
    }
    
    protected function login_error($type = self::UNKOWN){
        //$resp = $this->_app->config('resp');
        //$ERROR_MATRIX = $this->_app->config('errs');
        $resp['meta']['status'] = 403;
        $err_msg = "";
        if($type == self::UNKOWN){
            $err_msg = "wrong username or password"; 
        }
        else if($type == self::WRONG_USERNAME){
            $err_msg = "wrong username"; 
        }
        else if($type == self::WRONG_PASSWORD){
            $err_msg = "wrong passord"; 
        }
        else if($type == self::NEED_ADMIN_ADD){
            $err_msg = "need administrator to add you account";
        }
        else{
            $err_msg = "unkown error";
        }

        $resp['meta']['msg'] = $err_msg;
        return json_encode($resp);
    }
    
    public function web_login(){
        // TODO: 这里我没校验两个值是否有注入的风险，SDO啊，都靠你们了啊 :P
        // 靠我们吧, 依赖basecontroller
        $username = $this->_app->request()->post("username");
        $password = $this->_app->request()->post("password");
        if(!$username || !$password) return $this->_app->redirect(SITE_PREFIX . "login");
        
        $realip = $this->_app->request()->getIp();
        if(!strpos($username, "@")){
            $_SESSION['errmsg'] = '请使用全帐号(eg:yangsong01@snda.com)';
            return $this->_app->redirect(SITE_PREFIX . 'login');
        }
        $login_as_snda = 0;
        $names = explode('@', $username);
        if(trim($names[1]) == "ku6.com"){
            $login_as_snda = 1;
        }
        if($this->login($names[0], $password, $realip, 1, $login_as_snda)){
            $this->_app->redirect(SITE_PREFIX . 'admin/welcome');
        } else {
            $_SESSION['errmsg'] = '登录失败';
            $this->_app->redirect(SITE_PREFIX . 'login');
        }
    }
    
    public function web_logout(){
        $this->logout();
        $this->_app->redirect(SITE_PREFIX . 'login');
    }
    
    public function api_login( $web = 0, $snda = 0){
        $params = array('username' => '', 'password' => '', 'param_ip' => '');
        $params = $this->get_param_from_all($params);
        return $this->login($params['username'], $params['password'], $params['param_ip'], $web, $snda);
    }
    
    public function login($username, $password, $ip, $web = 0, $snda = 0){
        if(ldap_auth($username, $password, $snda)){
            //get & update last_login information
            $user_id = $this->user_model->get_update_login_info($username, $ip);
            if($user_id == 0){ 
                unset($_SESSION['username']);
                unset($_SESSION['token']);
                unset($_SESSION['report_ids']);
                unset($_SESSION['url']);
                return $this->login_error(self::NEED_ADMIN_ADD);
            }
            $report_ids = $this->get_privilege($user_id);
            $urls = $this->get_privilege_url($user_id);
            $token = $this->gen_token();
            //store session
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['username'] = $username;
            $_SESSION['token'] = $token;
            $_SESSION['report_ids'] = $report_ids;
            $_SESSION['url'] = $urls;

            if($web == 1){
                return true;
            }
            $res = array('username' => $username, 'user_id' => $user_id, 'token' => $token, 'report_id' => $report_ids);
            $meta = array('status' => 200, 'msg' => 'ok');
            $response = array('meta' => $meta, 'response' => $res);
            $response = json_encode($response);
            return $response;
            //return username, user_id, token, report_id list
        }
        else{
            //var_dump($_SESSION);
            unset($_SESSION['username']);
            unset($_SESSION['token']);
            unset($_SESSION['report_ids']);
            unset($_SESSION['url']);
            if($web == 1){
                return false;
            }
            return $this->login_error();
        }
    }
    public function logout(){
        $this->_app->deleteCookie(session_name());
        session_unset();			//清空session
        session_destroy();			//删除session文件
        if (isset($_SESSION)) {
          unset($_SESSION);	//注销$_SESSION
        }
        return true;
    }
    public function register($username, $password){
    }
    
    public function gen_token(){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // I think (10+26+26)^16 is long enough. :)
        $length = 16;
        $token = '';
        for($i = 0 ; $i < $length ; $i++){
            $token .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $token;
    }

    //增加权限
    public function add_privilege($user_id, $report_id){
        return $this->user_model->add_privilege($user_id, $report_id);
    }
    //修改权限
    public function modify_privilege($user_id, $report_id){
    }
    //获取权限列表
    public function get_privilege($user_id){
        return $this->user_model->get_privilege($user_id);
    }

    //获取url列表
    public function get_privilege_url($user_id){
        return $this->user_model->get_privilege_url($user_id);
    }

} 
