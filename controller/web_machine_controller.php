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
    
    public function actionUserManager() {
        $m = new MachineModel($this->_db);
        $list = $m->getUserList();
        echo $this->gene_default_display('机器所属用户管理', 'machine/user_manager.tpl',['list'=>$list]);
    }
    
    public function actionUserAdd() {
        $keys = ['name' => '', 
            'email' => '',
            'phone'=>''
        ];
        
        $val = $this->get_param_from_post($keys);
        $result = $this->_m->userAdd($val);
        if($result === false){
            $_SESSION['errmsg'] = $this->_db->error();
        }
        
        return $this->_app->redirect(SITE_PREFIX . "/machine/usermanager");
    }
    
    public function actionUserDelete() {
        $param = $this->get_param_from_get(['id'=>0]);
        $result = $this->_m->userDelete($param['id']);
        if($result == false){
            $_SESSION['errmsg'] = '删除失败 ';
        }
        return $this->_app->redirect(SITE_PREFIX . "/machine/usermanager");
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
            $sql = "SELECT * FROM  machineinfo order by createtime DESC";
            
            DtGridUtils::queryForDTGrid($sql, $pager, $this->_db->getConnection());
            exit;
        }
        
        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        $_SESSION['errmsg'] = '';
        echo $this->gene_default_display('机器列表', 'machine/list.tpl',['error'=>$msg]);
    }
    
    public function actionAdd() {
        $keys = ['name' => '', 
            'province' => '',
            'ip'=>'',
            'cdnid'=>0,
            'cpuNum'=>0,
            'coreNum'=>0,
            'memSum'=>0,
            'diskSum'=>0,
            'ignored'=>0,
            'descs'=>'',
            'processList'=>'',
            'userID'=>0
        ];
        
        $val = $this->get_param_from_post($keys);
        $result = $this->_m->add($val);
        if($result === false){
            $_SESSION['errmsg'] = $this->_db->error();
        }
        
        return $this->_app->redirect(SITE_PREFIX . "machine/list");
    }
    
    public function actionDelete() {
        $param = $this->get_param_from_get(['id'=>0, 'ip'=>0]);
        $result = $this->_m->delete($param['id'], $param['ip']);
        if($result == false){
            $_SESSION['errmsg'] = '删除失败 ';
        }
        return $this->_app->redirect(SITE_PREFIX . "machine/list");   
    }
    
    public function actionMonitor(){
        echo $this->gene_default_display('监控报表', 'machine/monitor.tpl');
    }
    
    public function actionMonitorList(){
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
            $sql = "SELECT * FROM  hardware_view";
            
            DtGridUtils::queryForDTGrid($sql, $pager, $this->_db->getConnection());
            exit;
        }
        echo $this->gene_default_display('监控报表', 'machine/monitor_list.tpl');
    }
}
