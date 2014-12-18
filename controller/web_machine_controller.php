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

    protected $_m;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_db = $this->_app->config('mysql_machineMonitor_db');
        $this->_m = new MachineModel($this->_db);
        
    }

    public function actionManager(){
        
        echo $this->gene_default_display('机器管理', 'machine/manager.tpl');
    }
    
    public function actionList(){
        require(CODE_BASE . "libs/dtGrid/utils/DtGridUtils.class.php");
        require(CODE_BASE . "libs/dtGrid/utils/ExportUtils.class.php");
        require(CODE_BASE . "libs/dtGrid/utils/QueryUtils.class.php");

        require(CODE_BASE . "libs/dtGrid/lib/pdf/fpdf.php");
        require(CODE_BASE . "libs/dtGrid/lib/pdf/chinese.php");

        require(CODE_BASE . "libs/dtGrid/lib/excel/PHPExcel.php");
        require(CODE_BASE . 'libs/dtGrid/lib/excel/PHPExcel/IOFactory.php');  
        require(CODE_BASE . 'libs/dtGrid/lib/excel/PHPExcel/Writer/Excel5.php'); 
        if(isset($_POST["dtGridPager"])){
            $dtGridPager = $_POST["dtGridPager"];
            $pager = json_decode($dtGridPager, true);
            $sql = "SELECT * FROM  machineinfo order by createtime";
            
            DtGridUtils::queryForDTGrid($sql, $pager, $this->_db->getConnection());
            exit;
        }
        echo $this->gene_default_display('机器列表', 'machine/list.tpl');
    }
    
    public function actionDelete() {
        $param = $this->get_param_from_get(['id'=>0, 'ip'=>0]);
        $result = $this->_m->delete($param['id'], $param['ip']);
        if($result == true)
            echo $this->format_obj_response ([]);
        else
            echo $this->format_error_response ();
    }
}
