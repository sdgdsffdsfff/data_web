<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
require_once(CODE_BASE . 'model/trend.php');

class ApiTrendController extends BaseController {
    public $trendModel;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_db = $this->_app->config('mysql_data_db');
        $this->trendModel = new TrendModel($this->_db);
    }
    
    /*
     * ku6站内VV时报 默认加载30天的数据
     * @param int $_GET['d_offset'] 取得最近多少天的数据
     */
    public function in_vv_hour(){
        $params = $this->get_param_from_all([
            'd_offset' => 0, 
            'stat_date' => 'DESC', 
            'stat_hour'=>'DESC'
        ]);
        echo $this->format_obj_response($this->trendModel->in_vv_hour($params['d_offset'], $params['stat_date'], $params['stat_hour']));
    }
    
    /*
     * ku6站内VV时报来源
     *
     */
    public function refer_in_vv_hour(){
        $params = $this->get_param_from_all([
            'd_offset' => 0, 
            'stat_date' => 'DESC', 
            'stat_hour'=>'DESC'
        ]);
        echo $this->format_obj_response($this->trendModel->refer_in_vv_hour($params['d_offset'], $params['stat_date'], $params['stat_hour']));
    }
}

