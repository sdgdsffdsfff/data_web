<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
$models = ['machine'];
for($i = 0; $i < count($models); $i++){
    require_once(CODE_BASE . "model/" . $models[$i] . ".php");
}

class ApiMachineController extends WebController{

    protected $_m;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_m = new MachineModel($this->_db);
    }

    public function actionMonitorUpdate(){
        
        $params = array('sql' => '');
        $params = $this->get_param_from_post($params);
        $this->debug_log($params['sql']);
        if($this->_m->monitorUpdate($params['sql']))
            echo $this->format_obj_response([]);
        else 
            echo $this->format_error_response();
    }
    
    public function debug_log($msg){
        //$umsg = iconv('gb18030', 'utf-8', $msg);
        $fp = fopen(CODE_BASE.'/log/debug.log', "a+");
        fwrite($fp, $msg);
        fwrite($fp, "\n");
        fclose($fp);
    }
}
