<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

class WebHighLevelController extends WebController{
    public function __construct($app)
    {
        parent::__construct($app);
    }
    public function hl_vhl_sub_site_daily(){
        $this->render('各频道页PV/UV日报', 'hl_vhl_sub_site_daily.php');
    }
    public function hl_vhl_channel_daily(){
        $this->render('频道日报', 'hl_vhl_channel_daily.php');
    }
    public function hl_vhl_channel_daily_top50(){
        $this->render('频道日报top50', 'hl_vhl_channel_daily_top50.php');
    }

    public function hl_vhl_vv_src(){
        $this->render('渠道日报', 'hl_vhl_vv_src.php');
    }

    public function hl_vhl_in_daily(){
       $this->render('站内日报', 'hl_vhl_in_daily.php');

    }
    public function hl_vhl_refer_uv_vv_daily(){
        $this->render('各来源uv及带来的vv日报', 'hl_vhl_refer_uv_vv_daily.php');

    }



}
