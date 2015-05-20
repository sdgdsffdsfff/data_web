<?php
class WebController extends BaseController
{

    protected $report_model;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->report_model = new ReportModel($app->db_admin);
    }

    public function get_menu(){
        $menu = array();
        if(!array_key_exists('report_ids', $_SESSION)) return $menu;
        $reports = $this->report_model->get_report_list();
        $top_level = array();
        for($i = 0; $i < count($reports); $i++){
            $r = $reports[$i];
            if((!in_array($r['id'], $_SESSION['report_ids']))){
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

        return $menu;
    }

    public function render($title, $template_name, $params = [])
    {
        $default = [
            'title' => 'KU6数据查询平台|'.$title,
            'SITE_PREFIX' => SITE_PREFIX,
            'API_PREFIX' => API_PREFIX,
            'TEMPLATES_PATH' => realpath($this->_app->view()->getTemplatesDirectory()),

        ];
        if(isset($_SESSION['username']) && isset($_SESSION['token'])) {
            $default['menu'] = $this->get_menu();
            $default['username'] = $_SESSION['username'];
            $default['token'] = $_SESSION['token'];
        }
        $data = array_merge($default, $params);

        $this->_app->render($template_name, $data);
    }


}