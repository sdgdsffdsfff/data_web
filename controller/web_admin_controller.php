<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
$models = array('usergroups', 'api_user', 'report');
for($i = 0; $i < count($models); $i++){
    require_once(CODE_BASE . "model/" . $models[$i] . ".php");
}

class WebReportsController extends WebController{

    public function __construct($app)
    {
        parent::__construct($app);
        
    }

    public function reports_list(){
        $rm = new ReportManagerModel($this->_app->config('mysql_db'));
        $reports = $rm->get_report_list();
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
        echo $this->gene_default_display($this->LANG['reports_list'], 'reports_list.tpl', array('list' => $top_level));
    }

    public function groupmanager(){
        $gmm = new UserGroupModel($this->_app->config('mysql_db'));
        $list = $gmm->list_group();
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
        echo $this->gene_default_display($this->LANG['usergroupmanager'], 'usergrouplist.tpl', array('list' => $list));
    }


    public function add_usergroup(){
        $keys = array('groupname' => '', 'grouplevel' => 0);
        $val = $this->get_param_from_post($keys);
        $groupModel = new UserGroupModel($this->_app->config('mysql_db'));
        $row = array(
                'groupname' => $val['groupname'],
                'level' => $val['grouplevel']
            );
        $groupModel->add_group($row);
        return $this->_app->redirect(SITE_PREFIX . "admin/usergroupmanager");
    }

    public function del_usergroup() {
        $keys = array('gid' => 0);
        $val = $this->get_param_from_get($keys);
        $groupModel = new UserGroupModel($this->_app->config('mysql_db'));
        $groupModel->del_group($val['gid']);
        return $this->_app->redirect(SITE_PREFIX . "admin/usergroupmanager");
    }


    public function usermanager(){
        $gmm = new UserModel($this->_app->config('mysql_db'));
        $list = $gmm->get_user_list();
 
        echo $this->gene_default_display($this->LANG['usergroupmanager'], 'userlist.tpl', array('list' => $list));
    }

    public function delreport(){
        $keys = array('id' => 0);
        $val = $this->get_param_from_get($keys);
        $pid = $val['id'];
        $rm = new ReportManagerModel($this->_app->config('mysql_db'));
        $reports = $rm->rm_reports($pid);
        return $this->_app->redirect(SITE_PREFIX . "admin/reportsmanager");
    }

    public function newreport(){
        $keys = array('reportname' => '', 'parent_group' => 0, 'code' => '');
        $val = $this->get_param_from_post($keys);
        $row = array('name' => $val['reportname'], 'code' => $val['code'], 'pid' => $val['parent_group']);
        $rm = new ReportManagerModel($this->_app->config('mysql_db'));
        $reports = $rm->newreport($row);
        return $this->_app->redirect(SITE_PREFIX . "admin/reportsmanager");
    }


    public function newuser(){
        //$keys = array('username' => '', 'grouplevel' => 0);
        $keys = array('username' => '', 'nickname' => '', 'email' => '', 'grouplevel' => 0);
        $val = $this->get_param_from_post($keys);
        $row = array('name' => $val['username'], 'gid' => $val['grouplevel']);
        $um = new UserModel($this->_app->config('mysql_db'));
        //$um->add_user($val['username'], 0, $val['grouplevel']);
        $um->add_user($val['username'], $val['nickname'], $val['email'], $val['grouplevel']);
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }


    public function deluser(){
        $keys = array('id' => '0');
        $val = $this->get_param_from_get($keys);
        $uid = $val['id'];
        $um = new UserModel($this->_app->config('mysql_db'));
        $um->delete_user($uid);
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }
    public function moduser($id){
        $uid = $id;
        $um = new UserModel($this->_app->config('mysql_db'));
        $rm = new ReportManagerModel($this->_app->config('mysql_db'));
        $ugm = new UserGroupModel($this->_app->config('mysql_db'));
        $reports = $rm->get_report_list();
        $ps = $um->get_privilege($uid);
        $ugs = $ugm->list_group();
        $ui = $um->get_user_by_id($uid);
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
        echo $this->gene_default_display($this->LANG['user_modify'], 'userdetail.tpl', array('list' => $list));
    }
    
    //todo 更新session
    public function updateuser(){
        if(!isset($_POST['privates'])) {
            
            $privates = array();
        } else {
            $privates = $_POST['privates'];
        }
        $keys = array('uid' => '', 'grouplevel' => 3);
        $val = $this->get_param_from_post($keys);
        $uid = $val['uid'];
        // 
        if(!$uid) return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
        for($i = 0; $i < count($privates); $i++){
            $privates[$i] = $this->_db->db_escape_string($privates[$i]);
        }
        $um = new UserModel($this->_app->config('mysql_db'));
        if(!$um->delete_privilege($uid))die("del");
        
        if(count($privates)) $um->add_privilege($uid, $privates);
        $row = array('gid' => $val['grouplevel']);
        $um->updateuser($row, $uid);
        //更新SESSION
        $report_ids = $um->get_privilege($uid);
        $urls = $um->get_privilege_url($uid);
        $_SESSION['report_ids'] = $report_ids;
        $_SESSION['url'] = $urls;
        
        return $this->_app->redirect(SITE_PREFIX . "admin/usersmanager");
    }

    public function welcome(){
        echo $this->gene_default_display($this->LANG['welcome'], 'welcome.tpl');
    }

    public function listmonitor(){
        $gmm = new DataMonitorModel($this->_app->config('oracle_db'), $this->_app->config('mysql_db'));
        $list = $gmm->pure_table_info();
        echo $this->gene_default_display($this->LANG['monitor'], 'monitorlist.tpl', array('list' => $list));
    }


    public function addmonitor(){
        $keys = array('rid' => '', 'query_sql' => '', 'cinterval' => 0, 'month_day' => 0, 'week_day' => 0, 'hour' => 0, 'minute' => 0);
        $val = $this->get_param_from_post($keys);
        $gmm = new DataMonitorModel($this->_app->config('oracle_db'), $this->_app->config('mysql_db'));
        if($val['rid'] != '' || $val['query_sql'] != '' || $val['intval'] != 0){
            $gmm->add_monitor($val);
        }
        $this->app->redirect(SITE_PREFIX . 'admin/monitor');
    }


    public function delmonitor($id){
        $gmm = new DataMonitorModel($this->_app->config('oracle_db'), $this->_app->config('mysql_db'));
        $gmm->delete($id);
        $this->app->redirect(SITE_PREFIX . 'admin/monitor');
    }
}
