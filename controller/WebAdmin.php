<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

class WebAdminController extends WebController{

    protected $user_model;
    protected $report_model;
    protected $usergroup_model;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->user_model = new UserModel($app->db_admin);
        $this->report_model = new ReportModel($app->db_admin);
        $this->usergroup_model = new UserGroupModel($app->db_admin);

    }

    public function login_action()
    {
        $email = $this->_app->request()->post("email");
        $password = $this->_app->request()->post("password");
        $ip = $this->_app->request()->getIp();

        if($email && $password){
            if(!strpos($email, "@ku6.com")){
                $_SESSION['errmsg'] = '请使用全帐号(eg:username@ku6.com)';
                return $this->_app->redirect(SITE_PREFIX . 'login');
            }
            if($this->login($email, $password, $ip)){
                $this->_app->redirect(SITE_PREFIX . 'admin/welcome');
            } else {
                $_SESSION['errmsg'] = '登录失败';
                $this->_app->redirect(SITE_PREFIX . 'login');
            }
        }

        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);
        $this->render('登录', 'login.php', ['error' => $msg]);
    }

    public function logout_action(){
        $this->_app->deleteCookie(session_name());
        session_unset();			//清空session
        session_destroy();			//删除session文件
        if (isset($_SESSION)) {
            unset($_SESSION);	//注销$_SESSION
        }
        $this->_app->redirect(SITE_PREFIX . 'login');
    }

    protected function login($email, $password, $ip){
        if(App::ldap_auth($email, $password)){
            //get & update last_login information
            list($username,$domain) = explode('@', $email);
            $user_id = $this->user_model->get_update_login_info($username, $ip);
            if($user_id == 0){
                unset($_SESSION['username']);
                unset($_SESSION['token']);
                unset($_SESSION['report_ids']);
                unset($_SESSION['url']);
            }
            $report_ids = $this->user_model->get_privilege($user_id);
            $urls = $this->user_model->get_privilege_url($user_id);
            $token = $this->gen_token();

            //store session
            $_SESSION['uid'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['token'] = $token;
            $_SESSION['report_ids'] = $report_ids;
            $_SESSION['url'] = $urls;

            return true;

            $res = array('username' => $username, 'user_id' => $user_id, 'token' => $token, 'report_id' => $report_ids);
            $meta = array('status' => 200, 'msg' => 'ok');
            $response = array('meta' => $meta, 'response' => $res);
            $response = json_encode($response);
            return $response;
        } else {

            unset($_SESSION['username']);
            unset($_SESSION['token']);
            unset($_SESSION['report_ids']);
            unset($_SESSION['url']);
            return false;

            return $this->login_error();
        }
    }

    private function gen_token(){
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // I think (10+26+26)^16 is long enough. :)
        $length = 16;
        $token = '';
        for($i = 0 ; $i < $length ; $i++){
            $token .= $chars[mt_rand(0, strlen($chars)-1)];
        }
        return $token;
    }

    public function welcome_action(){
        $this->render('欢迎', 'welcome.php');
    }


    public function reports_list_action(){
        $reports = $this->report_model->get_report_list();
        $top_level = array();
        // 清理出顶级分类
        for($i = 0; $i < count($reports); $i++){
            $r = $reports[$i];
            if(intval($r['pid']) > 0){
                for($j = 0; $j < count($top_level); $j++){
                    $item = $top_level[$j]['node'];
                    if(intval($item['id']) == intval($r['pid'])){
                        array_push($top_level[$j]['subitems'], $r);
                    }
                }
            } else {
                $item = array();
                $item['node'] = $r;
                $item['subitems'] = array();
                array_push($top_level, $item);
            }
        }
        $this->render('报表管理', 'admin/reportslist.php', array('list' => $top_level));
    }

    public function delreport_action(){
        $keys = array('id' => 0);
        $val = $this->get($keys);
        $pid = $val['id'];
        $this->report_model->rm_reports($pid);
        return $this->_app->redirect(SITE_PREFIX . "admin/reportsmanager");
    }

    public function newreport_action(){
        $keys = array('reportname' => '', 'parent_group' => 0, 'code' => '');
        $val = $this->post($keys);
        $row = array('name' => $val['reportname'], 'code' => $val['code'], 'pid' => $val['parent_group']);

        $this->report_model->newreport($row);
        return $this->_app->redirect(SITE_PREFIX . "admin/reportsmanager");
    }


    public function usergroupmanager_action(){

        $list = $this->usergroup_model->list_group();
        for($i = 0; $i < count($list); $i++){
            $item = $list[$i];
            $val = '出错';
            switch($item['level']){
                case 1: {$val = '监控人员';};break;
                case 2: {$val = '系统管理人员';};break;
                case 3: {$val = '高层';};break;
            }
            $list[$i]['level'] = $val;
        }
        $this->render('用户组管理', 'admin/usergrouplist.php', array('list' => $list));
    }


    public function add_usergroup_action(){
        $keys = array('groupname' => '', 'grouplevel' => 0);
        $val = $this->post($keys);
        $row = array(
                'groupname' => $val['groupname'],
                'level' => $val['grouplevel']
            );
        $this->usergroup_model->add_group($row);
        return $this->_app->redirect(SITE_PREFIX . "admin/usergroupmanager");
    }

    public function del_usergroup() {
        $keys = array('gid' => 0);
        $val = $this->get($keys);
        $this->usergroup_model->del_group($val['gid']);
        return $this->_app->redirect(SITE_PREFIX . "admin/usergroupmanager");
    }


    public function usermanager_action(){

        $list = $this->user_model->get_user_list();
 
        $this->render('用户管理', 'admin/userlist.php', array('list' => $list));
    }


    public function newuser_action(){

        $keys = array('username' => '', 'nickname' => '', 'email' => '', 'grouplevel' => 0);
        $val = $this->post($keys);
        $this->user_model->add_user($val['username'], $val['nickname'], $val['email'], $val['grouplevel']);
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }


    public function deluser_action(){
        $keys = array('id' => '0');
        $val = $this->get($keys);
        $uid = $val['id'];

        $this->user_model->delete_user($uid);
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }

    public function modifyuser_action($id){
        $uid = $id;
        $reports = $this->report_model->get_report_list();
        $ps = $this->user_model->get_privilege($uid);
        $ugs = $this->usergroup_model->list_group();
        $ui = $this->user_model->get_user_by_id($uid);
        $top_level = array();
        // 清理出顶级分类
        for($i = 0; $i < count($reports); $i++){
            $r = $reports[$i];
            if(intval($r['pid']) > 0){
                for($j = 0; $j < count($top_level); $j++){
                    $item = $top_level[$j]['node'];
                    if(intval($item['id']) == intval($r['pid'])){
                        array_push($top_level[$j]['subitems'], $r);
                    }
                }
            } else {
                $item = array();
                $item['node'] = $r;
                $item['subitems'] = array();
                array_push($top_level, $item);
            }
        }
        $list = array('reports' => $top_level, 'privates' => $ps, 'groups' => $ugs, 'uid' => $uid, 'uinfo' => $ui);
        $this->render('权限列表', 'admin/userdetail.php', array('list' => $list));
    }

    public function updateuser_action(){
        if(!isset($_POST['privates'])) {
            
            $privates = array();
        } else {
            $privates = $_POST['privates'];
        }
        $keys = array('uid' => '', 'grouplevel' => 3);
        $val = $this->post($keys);
        $uid = $val['uid'];
        // 
        if(!$uid) return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
        for($i = 0; $i < count($privates); $i++){
            $privates[$i] = mysql_real_escape_string($privates[$i]);
        }

        if(!$this->user_model->delete_privilege($uid))die("del");

        if(count($privates)) $this->user_model->add_privilege($uid, $privates);
        $row = array('gid' => $val['grouplevel']);
        $this->user_model->updateuser($row, $uid);
        //更新自己的SESSION
        if($_SESSION['uid'] == $uid){
            $report_ids = $this->user_model->get_privilege($uid);
            $urls = $this->user_model->get_privilege_url($uid);
            $_SESSION['report_ids'] = $report_ids;
            $_SESSION['url'] = $urls;
        }
        
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }

}
