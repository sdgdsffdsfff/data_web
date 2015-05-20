<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

require(CODE_BASE . "library/dtGrid/utils/DtGridUtils.class.php");
require(CODE_BASE . "library/dtGrid/utils/ExportUtils.class.php");
require(CODE_BASE . "library/dtGrid/utils/QueryUtils.class.php");

require(CODE_BASE . "library/dtGrid/lib/pdf/fpdf.php");
require(CODE_BASE . "library/dtGrid/lib/pdf/chinese.php");

require(CODE_BASE . "library/dtGrid/lib/excel/PHPExcel.php");
require(CODE_BASE . 'library/dtGrid/lib/excel/PHPExcel/IOFactory.php');
require(CODE_BASE . 'library/dtGrid/lib/excel/PHPExcel/Writer/Excel5.php');

class WebMachineController extends WebController{


    protected $machineModel;
    protected $_db;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->machineModel = new MachineModel($app->db_zebra);
        $this->_db = $app->db_zebra;
        
    }
    
    public function actionUserManager() {
        $list = $this->machineModel->getUserList();
        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);
        $this->render('机器所属用户管理', 'machine/user_manager.php',['list'=>$list,'error'=>$msg]);
    }
    
    public function actionUserAdd() {
        $keys = ['name' => '', 
            'email' => '',
            'phone'=>''
        ];
        
        $val = $this->post($keys);
        $result = $this->machineModel->userAdd($val);
        if($result === false){
            $_SESSION['errmsg'] = $this->_db->error();
        }

        return $this->_app->redirect(SITE_PREFIX . "/machine/usermanager");
    }
    
    public function actionUserDelete() {
        $param = $this->get(['id'=>0]);
        $result = $this->machineModel->userDelete($param['id']);
        if($result == false){
            $_SESSION['errmsg'] = '删除失败 ';
        }

        return $this->_app->redirect(SITE_PREFIX . "/machine/usermanager");
    }


    public function actionManager(){

        if(isset($_POST["dtGridPager"])){
            $dtGridPager = $_POST["dtGridPager"];
            $pager = json_decode($dtGridPager, true);
            $sql = "SELECT * FROM  machineinfo order by createtime DESC";
            
            DtGridUtils::queryForDTGrid($sql, $pager, $this->_db->getConnection());
            exit;
        }
        
        $arrUser = $this->machineModel->getUserList();
        $arrTmp = [];
        if(!empty($arrUser)){
            foreach ($arrUser as $user) {
                $arrTmp[$user['id']] = $user['name'];
            }
        }
        $jsonUser = json_encode($arrTmp);
        
        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);
        $this->render('机器管理', 'machine/machine_manager.php',['error'=>$msg,'jsonUser'=>$jsonUser]);
    }
    
    public function actionAdd() {
        $keys = ['name' => '', 
            'province' => '',
            'city' => '',
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
        
        $val = $this->post($keys);

        $result = $this->machineModel->add($val);
        if($result === false){
            $_SESSION['errmsg'] = $this->_db->error();
        }
        
        return $this->_app->redirect(SITE_PREFIX . "machine/manager");
    }
    
    public function actionDelete() {
        $param = $this->get(['id'=>0, 'ip'=>0]);
        $result = $this->machineModel->delete($param['id'], $param['ip']);
        if($result == false){
            $_SESSION['errmsg'] = '删除失败 ';
        }
        return $this->_app->redirect(SITE_PREFIX . "machine/manager");
    }

    
    public function actionMonitor(){

        if(isset($_POST["dtGridPager"])){
            $dtGridPager = $_POST["dtGridPager"];
            $pager = json_decode($dtGridPager, true);
            $sql = "SELECT * FROM  hardware_view";
            
            DtGridUtils::queryForDTGrid($sql, $pager, $this->_db->getConnection());
            exit;
        }
        $arrUser = $this->machineModel->getUserList();
        $arrTmp = [];
        if(!empty($arrUser)){
            foreach ($arrUser as $user) {
                $arrTmp[$user['id']] = $user['name'];
            }
        }
        $jsonUser = json_encode($arrTmp);
        $this->render('监控报表', 'machine/monitor.php',['jsonUser'=>$jsonUser]);
    }
}
