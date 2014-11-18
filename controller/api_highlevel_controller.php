<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
require_once(CODE_BASE . 'model/highlevel.php');
require_once(CODE_BASE . 'libs/helper/ArrayHelper.php');

class HighLevelController extends BaseController
{
    private $highlevelmodel;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_db = $this->_app->config('mysql_data_db');
        $this->highlevelmodel = new HighLevelModel($this->_db);
    }


    //--------------------------------------------------------------
    //video high level视频高层日报
    //-------------------------------------------------------------

    // 高层报表, 渠道日报
    public function sub_site_daily(){
        $params = array('d_offset' => 31);
        $params = $this->get_param_from_all($params);
        echo $this->format_obj_response($this->highlevelmodel->sub_site_daily($params['d_offset']));
    }
    //this function can be deleted
    public function sub_site_daily1(){
        echo $this->format_obj_response($this->highlevelmodel->sub_site_daily1());
    }

    // 高层报表, 频道日报
    public function channel_daily(){
        $params = array('d_offset' => '31');
        $params = $this->get_param_from_all($params);
        echo $this->format_obj_response($this->highlevelmodel->channel_daily($params['d_offset']));
    }
    // 高层报表, 频道日报top50
    public function channel_daily_top50(){
        echo $this->format_obj_response($this->highlevelmodel->channel_daily_top50());
    }

    // 高层报表, vv来源分析
    public function vv_src(){
        $params = array('d_offset' => 30);
        $params = $this->get_param_from_all($params);
        echo $this->format_obj_response($this->highlevelmodel->vv_src($params['d_offset']));
    }

    // 高层报表, ku6移动端流量
    public function mobi_data(){
        echo $this->format_obj_response($this->highlevelmodel->mobi_data());
    }

    // 高层报表, 站内日报
    public function in_daily(){
        //replace data_desc to 日期

        echo  $this->format_obj_response($this->highlevelmodel->in_daily());
    }

 
    //视频高层日报，各来源uv及带来的vv日报
    public function hl_vhl_refer_uv_vv_daily(){
        $params = array('d_offset' => 7);
        $params = $this->get_param_from_all($params);
        echo $this->format_obj_response($this->highlevelmodel->hl_vhl_refer_uv_vv_daily($params['d_offset']));
    }
    
}











