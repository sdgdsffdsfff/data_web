<?php
abstract class BaseController
{
    protected $_app;
    protected $_db;

    public function __construct($app)
    {
        $this->_app = $app;
        $this->_db = $app->config('mysql_db');
    }
    
    function get_param_from_post($keys)
    {
        foreach(array_keys($keys) as $key){
            $keys[$key] = $this->_db->db_escape_string($this->_app->request()->post($key));
        }
        return $keys;
    }

    public function get_param_from_get($keys)
    {
        foreach(array_keys($keys) as $key){
            $keys[$key] = $this->_db->db_escape_string($this->_app->request()->get($key));            
        }
        return $keys;
    }

    //get parameters , if parameter is not set , use given value
    public function get_param_from_all($keys)
    {
        $req = $this->_app->request();
        if($req->isGet()){
            $params = $req->get();
        }
        else{
            $params = $req->post();
        }
        $params['param_ip'] = $req->getIp();
        
        foreach(array_keys($keys) as $key){
            if(isset($params[$key])){
                $keys[$key] = $this->_db->db_escape_string($params[$key]);            
            }
        }
        return $keys;
    }

    protected function format_error_response($errorid)
    {
        $resp = $this->_app->config('resp');
        $ERROR_MATRIX = $this->_app->config('errs');
        $resp['meta']['status'] = 404;
        $resp['meta']['msg'] = $ERROR_MATRIX[strval($errorid)];
        $resp['response'] = array();
        return $resp;
    }
    
    protected function format_obj_response($data)
    {
        $resp = $this->_app->config('resp');
        $resp['meta']['status'] = 200;
        $resp['meta']['msg'] = 'ok';
        $resp['response'] = $data;
        return json_encode($resp, JSON_NUMERIC_CHECK);
    }

    protected function show_error($msg, $backurl)
    {
        $smarty = $this->_app->config('view');
        $LANG = $this->_app->config('LANG');
        $smarty->assign('title', $LANG['error_title']);
        $smarty->assign('errmsg', $msg);
        $smarty->assign('backurl', $backurl);
        $smarty->display('error.tpl');
        return;
    }
}

class WebController extends BaseController
{
    protected $is_login = true;
    protected $LANG;
    
    public function __construct($app)
    {
        parent::__construct($app);
        $this->LANG = $app->config('LANG');
    }

    public static function sort_key($a, $b){
        if($a['title'] == $b['title']) return 0;
        return $a['title'] > $b['title'] ? 1 : -1;
    }

    public function get_left_array(){
        $menu = array();
        if(!array_key_exists('report_ids', $_SESSION)) return $menu;
        $rm = new ReportManagerModel($this->_app->config('mysql_db'));
        $reports = $rm->get_report_list();
        $top_level = array();
        for($i = 0; $i < count($reports); $i++){
            $r = $reports[$i];
            if((!in_array($r['id'], $_SESSION['report_ids']))){
            //if((!in_array($r['id'], $_SESSION['report_ids'])) && $r['pid'] != 0){
                continue;
            }
            if(intval($r['pid']) > 0){
                $r['url'] = SITE_PREFIX . $r['code'];
                $r['title'] =  $r['name'];
                for($j = 0; $j < count($top_level); $j++){
                    $item = $top_level[$j]['node'];
                    if(intval($item['id']) == intval($r['pid'])){
                        array_push($top_level[$j]['value'], $r);
                        array_push($top_level[$j]['urls'], $r['url']);
                    }
                }
            } else {
                $item = array();
                $item['title'] = $r['name'];
                $item['node'] = $r;
                $item['value'] = array();
                $item['urls'] = array();
                array_push($top_level, $item);
            }
        }
        $menu = array_merge($menu, $top_level);
        usort($menu, array('WebController', 'sort_key'));
        return $menu;
    }

    protected function gene_default_display($title, $template_name, $params = 0)
    {
        $smarty = $this->_app->config('view');
        $template = "login.tpl";
        $smarty->assign('title', $title);
        $smarty->assign('LANG', $this->LANG);
        $smarty->assign('leftarray', $this->get_left_array());
        $smarty->assign('SITE_PREFIX', SITE_PREFIX);
        $smarty->assign('API_PREFIX', API_PREFIX);
        if(isset($_SESSION['username']) && isset($_SESSION['token'])) {
            $smarty->assign('user', $_SESSION['username']);
            $smarty->assign('token', $_SESSION['token']);
        }
        if(is_array($params)){
            foreach($params as $key => $value){
                $smarty->assign($key, $value);
            }
        }
        $smarty->display($template_name);
    }
    
    public function display_default($title, $template) {
        echo $this->gene_default_display($title, $template);
    }
}



