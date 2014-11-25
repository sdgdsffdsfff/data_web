<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
class WebTrendController extends WebController
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function in_vv_hour(){
        echo $this->gene_default_display($this->LANG['in_vv_hour'], 'trend/in_vv_hour.tpl');
    }
}
