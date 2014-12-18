<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
$models = ['machine'];
for($i = 0; $i < count($models); $i++){
    require_once(CODE_BASE . "model/" . $models[$i] . ".php");
}

class WebMachineController extends WebController{

    public function __construct($app)
    {
        parent::__construct($app);
        
    }

    public function manager(){
        
        echo $this->gene_default_display('机器管理', 'machine/manager.tpl');
    }
}
