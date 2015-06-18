<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require(CODE_BASE . "library/dtGrid/utils/DtGridUtils.class.php");
require(CODE_BASE . "library/dtGrid/utils/ExportUtils.class.php");
require(CODE_BASE . "library/dtGrid/utils/QueryUtils.class.php");

require(CODE_BASE . "library/dtGrid/lib/excel/PHPExcel.php");
require(CODE_BASE . 'library/dtGrid/lib/excel/PHPExcel/IOFactory.php');
require(CODE_BASE . 'library/dtGrid/lib/excel/PHPExcel/Writer/Excel5.php');

class WebShowController extends WebController{

    protected $showModel;
    protected $_db;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_db = $app->db_show;
        $this->showModel = new ShowModel($this->_db);
        
    }

    public function reguser_count_action(){
        $list = [];
        if(isset($_POST['ge_date'])){
            $param = [
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($ge_date, $le_date, $show_type) = array_values($this->post($param));
            $list = $this->showModel->getReguserCount($ge_date, $le_date);
        }

        $this->render('注册用户数查询', 'show/reguser_count.php',['list'=>$list]);
    }

    public function loginuser_count_action(){
        $list = [];
        if(isset($_POST['ge_date'])){
            $param = [
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($ge_date, $le_date, $show_type) = array_values($this->post($param));
            $list = $this->showModel->getLoginuserCount($ge_date, $le_date);
        }
        $this->render('登陆用户数查询', 'show/loginuser_count.php', ['list'=>$list]);
    }

    public function charge_action(){
        $list = [];
        if(isset($_POST['ge_date'])){
            $param = [
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($ge_date, $le_date, $show_type) = array_values($this->post($param));
            $list = $this->showModel->getChargeCount($ge_date, $le_date);
        }
        $this->render('充值概况查询', 'show/charge.php', ['list'=>$list]);
    }

    public function room_charge_action(){
        $list = [];
        if(isset($_POST['ge_date'])){
            $param = [
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($ge_date, $le_date, $show_type) = array_values($this->post($param));
            $list = $this->showModel->getRoomChargeCount($ge_date, $le_date);
        }
        $this->render('各房间充值查询', 'show/room_charge.php', ['list'=>$list]);
    }

    public function gold_amount_action(){
        $list = [];
        if(isset($_POST['ge_date'])){
            $param = [
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($ge_date, $le_date, $show_type) = array_values($this->post($param));
            $list = $this->showModel->getGoldAmountCount($ge_date, $le_date);
        }
        $this->render('消耗查询', 'show/gold_amount.php', ['list'=>$list]);
    }

    public function export_action(){
        if(isset($_POST['exportDatas'])){
            $pager['exportDatas'] = json_decode($_POST['exportDatas'],true);
            $pager['exportFileName'] = $_POST['exportFileName'];
            $pager['isExport'] = true;
            $pager['exportType'] = 'excel';
            $pager['exportDataIsProcessed'] = true;
            foreach(array_keys($pager['exportDatas'][0]) as $k=>$v){
                $pager['exportColumns'][$k]['id'] = $v;
                $pager['exportColumns'][$k]['title'] = $v;
            }

            //print_r($pager);exit;
            ExportUtils::export($pager);
            //ExportUtils::exportExcel($pager, $pager['exportDatas'], "\"".$pager['exportFileName']."\"");
            return;

        }
    }
    

}
