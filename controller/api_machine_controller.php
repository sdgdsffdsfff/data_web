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
        $this->_db = $this->_app->config('mysql_machineMonitor_db');
        $this->_m = new MachineModel($this->_db);
    }

    public function actionMonitorUpdate(){
        
        $sql = $this->_app->request()->post('sql');
        
        if($this->_m->monitorUpdate($sql)){
            $this->debug_log(date('Y-m-d h:i:s').' : '.$sql.' ok');
            echo $this->format_obj_response([]);
        } else {
            $this->debug_log(date('Y-m-d h:i:s').' : '.$sql.' fail');
            echo $this->format_error_response();
        } 
            
    }
    
    public function debug_log($msg){
        //$umsg = iconv('gb18030', 'utf-8', $msg);
        $fp = fopen(CODE_BASE.'/log/debug.log', "a+");
        fwrite($fp, $msg);
        fwrite($fp, "\n");
        fclose($fp);
    }
}
