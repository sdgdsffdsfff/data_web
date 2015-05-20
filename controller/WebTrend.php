<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

class WebTrendController extends WebController
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function in_vv_hour(){
        $this->render('in_vv_hour', 'trend/in_vv_hour.php');
    }
}
