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

class WebChaxunController extends WebController{


    protected $chaxunModel;
    protected $_db;
    public function __construct($app)
    {
        parent::__construct($app);
        //$this->chaxunModel = new ChaxunModel($app->db_zebra);
        $this->_db = $app->db_chaxun;
        
    }

    public function uid_vid_cid_action(){
        $list = [];
        if(isset($_POST['show_type'])){
            $year = date('Y');
            $param = [
                'uid'=>null,
                'vid'=>null,
                'cid'=>null,
                'ge_date'=>null,
                'le_date'=>null,
                'show_type'=>1
            ];
            list($uid, $vid, $cid, $ge_date, $le_date, $show_type) = array_values($this->post($param));
            $sqlStaticField = " sum(inad) 站内AD, sum(inuv) 站内UV, sum(invv) 站内VV,
                          sum(outad) 站外AD, sum(outuv) 站外UV, sum(outvv) 站外VV,
                          sum(mad) M站AD, sum(muv) M站UV, sum(mvv) M站VV,
                          sum(androidad) 安卓AD, sum(androiduv) 安卓UV, sum(androidvv) 安卓VV,
                          sum(iosad) IOSAD, sum(iosuv) IOSUV, sum(iosvv) IOSVV,
                          sum(sumad) 总AD, sum(sumuv) 总UV, sum(sumvv) 总VV ";
            $sqlTable = " alladuvvv_{$year} ";
            $sqlStaticCondition = " and date >= '{$ge_date}' and date <= '{$le_date}' ";

            if($uid && $ge_date && $le_date){
                $strUid = App::resolveSqlInCondition($uid, true);
                if($show_type == 1)
                    $sql = "select date, uid, {$sqlStaticField} from {$sqlTable} where uid in ({$strUid}) {$sqlStaticCondition} group by uid, date";
                if($show_type == 2)
                    $sql = "select uid, {$sqlStaticField} from {$sqlTable} where uid in ({$strUid}) {$sqlStaticCondition} group by uid";
            }
            if($vid && $ge_date && $le_date){

                $strVid = App::resolveSqlInCondition($vid, false);
                if($show_type == 1)
                    $sql = "select date, vid, {$sqlStaticField} from {$sqlTable} where vid in ({$strVid}) {$sqlStaticCondition} group by vid, date";
                if($show_type == 2)
                    $sql = "select vid, {$sqlStaticField} from {$sqlTable} where vid in ({$strVid}) {$sqlStaticCondition} group by vid";
            }
            if($cid && $ge_date && $le_date){
                $strCid = App::resolveSqlInCondition($cid, true);
                if($show_type == 1)
                    $sql = "select date, cid, {$sqlStaticField} from {$sqlTable} where cid in ({$strCid}) {$sqlStaticCondition} group by cid, date";
                if($show_type == 2)
                    $sql = "select cid, {$sqlStaticField} from {$sqlTable} where cid in ({$strCid}) {$sqlStaticCondition} group by cid";
            }

            if(isset($sql)){
                //echo $sql;
                $list = $this->_db->queryAll($sql);
            }else{
                $_SESSION['errmsg'] = '请检查查询参数';
            }


        }

        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);

        $this->render('UID,VID,CID查询明细', 'chaxun/uid_vid_cid.php', ['list'=>$list, 'error'=>$msg]);
    }

    public function refer_action(){
        $list = [];
        if(isset($_POST['show_type'])){
            $year = date('Y');
            $param = [
                'refer'=>null,
                'ge_date'=>null,
                'le_date'=>null,
                'search_type'=>1,
                'show_type'=>1
            ];
            list($refer, $ge_date, $le_date, $search_type, $show_type) = array_values($this->post($param));
            $sqlStaticField = " sum(adshow) adshow, sum(uv) UV, sum(vv) VV";
            $sqlTable = "referaduvvv_{$year} ";
            $sqlStaticCondition = " and date >= '{$ge_date}' and date <= '{$le_date}' ";

            if($refer && $ge_date && $le_date){
                //精确查询
                if($search_type ==1){

                    $strRefer = App::resolveSqlInCondition($refer, false);
                    $sql = "select date, refer,{$sqlStaticField} from {$sqlTable} where refer in ({$strRefer}) {$sqlStaticCondition} group by refer, date";
                    if($show_type == 2)
                        $sql = "select refer, {$sqlStaticField} from {$sqlTable} where refer in ({$strRefer}) {$sqlStaticCondition} group by refer";
                }
                //模糊查询
                if($search_type ==2){
                    $sql = "select date, '{$refer}' refer, {$sqlStaticField} from {$sqlTable} where refer like '{$refer}%' {$sqlStaticCondition} group by date";
                    if($show_type == 2)
                        $sql = "select '{$refer}' refer, {$sqlStaticField} from {$sqlTable} where refer like '{$refer}%' {$sqlStaticCondition}";
                }

            }

            if(isset($sql)){
                //echo $sql;
                $list = $this->_db->queryAll($sql);
            }else{
                $_SESSION['errmsg'] = '请检查查询参数';
            }

        }

        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);

        $this->render('refer查询明细', 'chaxun/refer.php', ['list'=>$list, 'error'=>$msg]);
    }

    public function url_action(){
        $list = [];
        if(isset($_POST['show_type'])){
            $year = date('Y');
            $param = [
                'url'=>null,
                'ge_date'=>null,
                'le_date'=>null,
                'search_type'=>1,
                'show_type'=>1
            ];
            list($url, $ge_date, $le_date, $search_type, $show_type) = array_values($this->post($param));
            $sqlStaticField = " sum(pv) PV, sum(uv) UV";
            $sqlTable = "urlpvuv_{$year} ";
            $sqlStaticCondition = " and date >= '{$ge_date}' and date <= '{$le_date}' ";

            if($url && $ge_date && $le_date){
                //精确查询
                if($search_type ==1){
                    $strUrl =  App::resolveSqlInCondition($url, false);
                    $sql = "select date, {$sqlStaticField} from {$sqlTable} where url in ({$strUrl}) {$sqlStaticCondition} group by url, date";
                    if($show_type == 2)
                        $sql = "select  {$sqlStaticField} from {$sqlTable} where url in ({$strUrl}) {$sqlStaticCondition} group by url";
                }
                //模糊查询
                if($search_type ==2){
                    $sql = "select date, '{$url}' url, {$sqlStaticField} from {$sqlTable} where url like '{$url}%' {$sqlStaticCondition} group by date";
                    if($show_type == 2)
                        $sql = "select '{$url}' url, {$sqlStaticField} from {$sqlTable} where url like '{$url}%' {$sqlStaticCondition}";
                }

            }

            if(isset($sql)){
                //echo $sql;
                $list = $this->_db->queryAll($sql);
            }else{
                $_SESSION['errmsg'] = '请检查查询参数';
            }

        }

        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        unset($_SESSION['errmsg']);

        $this->render('refer查询明细', 'chaxun/url.php', ['list'=>$list, 'error'=>$msg]);
    }
    

}
