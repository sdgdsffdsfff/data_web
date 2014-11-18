
<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');

class LoadTimeController extends WebController
{
    public function __construct($app)
    {
        parent::__construct($app);
    }


    public function outlet_load_time(){
        echo $this->gene_default_display($this->LANG['outlet_loadtime'], 'hl_lt_outlet_loadtime.tpl');
    }
}

