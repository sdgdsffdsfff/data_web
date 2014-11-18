<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');

class WebHighLevelController extends WebController{
    public function __construct($app)
    {
        parent::__construct($app);
    }
    public function hl_vhl_sub_site_daily(){
        echo $this->gene_default_display($this->LANG['hl_vhl_sub_site_daily'], 'hl_vhl_sub_site_daily.tpl');
    }
    public function hl_vhl_channel_daily(){
        echo $this->gene_default_display($this->LANG['hl_vhl_channel_daily'], 'hl_vhl_channel_daily.tpl');
    }
    public function hl_vhl_channel_daily_top50(){
        echo $this->gene_default_display($this->LANG['hl_vhl_channel_daily_top50'], 'hl_vhl_channel_daily_top50.tpl');
    }

    public function hl_vhl_vv_src(){
        echo $this->gene_default_display($this->LANG['hl_vhl_vv_src'], 'hl_vhl_vv_src.tpl');
    }
  
    public function hl_vhl_mobi_data(){
        echo $this->gene_default_display($this->LANG['hl_vhl_mobi_data'], 'hl_vhl_mobi_data.tpl');
    }
    public function hl_vhl_in_daily(){
       echo $this->gene_default_display($this->LANG['hl_vhl_in_daily'], 'hl_vhl_in_daily.tpl');

    }
    public function hl_vhl_refer_uv_vv_daily(){
       echo $this->gene_default_display($this->LANG['hl_vhl_refer_uv_vv_daily'], 'hl_vhl_refer_uv_vv_daily.tpl');

    }



}
