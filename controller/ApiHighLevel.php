<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

class ApiHighLevelController extends BaseController
{
    protected $highlevelModel;
    protected $trendModel;
    public function __construct($app)
    {
        parent::__construct($app);

        $this->highlevelModel = new HighLevelModel($app->db_ku6_report);
        $this->trendModel = new TrendModel($app->db_ku6_report);
    }


    //--------------------------------------------------------------
    //video high level视频高层日报
    //-------------------------------------------------------------

    // 高层报表, 渠道日报
    public function sub_site_daily(){
        $params = array('d_offset' => 31);
        $params = $this->params($params);
        $this->ok($this->highlevelModel->sub_site_daily($params['d_offset']));
    }

    // 高层报表, 频道日报
    public function channel_daily(){
        $params = array('d_offset' => '31');
        $params = $this->params($params);
        $this->ok($this->highlevelModel->channel_daily($params['d_offset']));
    }
    // 高层报表, 频道日报top50
    public function channel_daily_top50(){
        $this->ok($this->highlevelModel->channel_daily_top50());
    }

    // 高层报表, vv来源分析
    public function vv_src(){
        $params = array('d_offset' => 30);
        $params = $this->params($params);
        $this->ok($this->highlevelModel->vv_src($params['d_offset']));
    }

    // 高层报表, 站内日报
    public function in_daily(){
        //replace data_desc to 日期

        $this->ok($this->highlevelModel->in_daily());
    }

    //视频高层日报，各来源uv及带来的vv日报
    public function hl_vhl_refer_uv_vv_daily(){
        $params = array('d_offset' => 7);
        $params = $this->params($params);
        if($params['d_offset'] <= 1){
            $params = $this->params([
                'd_offset' => 0,
                'stat_date' => 'DESC',
                'stat_hour'=>'DESC'
            ]);
            $this->ok($this->trendModel->refer_in_vv_hour($params['d_offset'], $params['stat_date'], $params['stat_hour']));
        }else{
            $this->ok($this->highlevelModel->hl_vhl_refer_uv_vv_daily($params['d_offset']));
        }

    }
    
}











