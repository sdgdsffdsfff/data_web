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
            $sqlUidShowField = " uid, sum(inad) 站内AD, sum(invv) 站内VV,
                          sum(outad) 站外AD, sum(outvv) 站外VV,
                          sum(mad) M站AD, sum(mvv) M站VV,
                          sum(androidad) 安卓AD, sum(androidvv) 安卓VV,
                          sum(iosad) IOSAD,  sum(iosvv) IOSVV,
                          sum(sumad) 总AD, sum(sumvv) 总VV ";
            $sqlVidShowField = "vid, sum(inad) 站内AD, sum(inuv) 站内UV, sum(invv) 站内VV,
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
                    $sql = "select date, {$sqlUidShowField} from {$sqlTable} where uid in ({$strUid}) {$sqlStaticCondition} group by uid, date";
                if($show_type == 2)
                    $sql = "select {$sqlUidShowField} from {$sqlTable} where uid in ({$strUid}) {$sqlStaticCondition} group by uid";
            }
            if($vid && $ge_date && $le_date){

                $arrVid = preg_split('/\s+/',trim($vid));
                foreach($arrVid as $k=>$v){
                    $arrVid[$k] = App::resolveVidFromUrl($v);
                }

                $strVid = App::resolveSqlInCondition($arrVid, false);
                if($show_type == 1)
                    $sql = "select date, {$sqlVidShowField} from {$sqlTable} where vid in ({$strVid}) {$sqlStaticCondition} group by vid, date";
                if($show_type == 2)
                    $sql = "select {$sqlVidShowField} from {$sqlTable} where vid in ({$strVid}) {$sqlStaticCondition} group by vid";
            }
            if($cid && $ge_date && $le_date){

                $strCid = App::resolveSqlInCondition($cid, true);
                if($show_type == 1)
                    $sql= "select a.date, a.cid, a.inad 站内AD, b.inuv 站内UV, a.invv 站内VV,
                          a.outad 站外AD, b.outuv 站外UV, a.outvv 站外VV,
                          a.mad M站AD, b.muv M站UV, a.mvv M站VV,
                          a.androidad 安卓AD, b.androiduv 安卓UV, a.androidvv 安卓VV,
                          a.iosad IOSAD, b.iosuv IOSUV, a.iosvv IOSVV,
                          (a.inad+a.outad+a.mad+a.androidad+a.iosad) 全站AD, b.alluv 全站UV,
                          (a.invv+a.outvv+a.mvv+a.androidvv+a.iosvv) 全站VV
                          from(
                            select date,cid,sum(inad) inad,sum(invv) invv,sum(outad) outad,sum(outvv) outvv,
                            sum(mad) mad,sum(mvv) mvv,sum(androidad) androidad,sum(androidvv) androidvv,sum(iosad) iosad,sum(iosvv) iosvv
                            from {$sqlTable} where cid in ({$strCid}) {$sqlStaticCondition} group by cid, date
                          ) a
                          join (
                          select date, cid, inuv, outuv, muv, androiduv, iosuv, alluv from ciduv where cid in ({$strCid}) {$sqlStaticCondition}
                          )b
                          on a.date=b.date and a.cid=b.cid ";

                    //$sql = "select date, cid, {$sqlStaticField} from {$sqlTable} where cid in ({$strCid}) {$sqlStaticCondition} group by cid, date";
                if($show_type == 2)
                    $sql= "select a.cid, sum(a.inad) 站内AD, sum(b.inuv) 站内UV, sum(a.invv) 站内VV,
                          sum(a.outad) 站外AD, sum(b.outuv) 站外UV, sum(a.outvv) 站外VV,
                          sum(a.mad) M站AD, sum(b.muv) M站UV, sum(a.mvv) M站VV,
                          sum(a.androidad) 安卓AD, sum(b.androiduv) 安卓UV, sum(a.androidvv) 安卓VV,
                          sum(a.iosad) IOSAD, sum(b.iosuv) IOSUV, sum(a.iosvv) IOSVV,
                          sum(a.inad+a.outad+a.mad+a.androidad+a.iosad) 全站AD, sum(b.alluv) 全站UV,
                          sum(a.invv+a.outvv+a.mvv+a.androidvv+a.iosvv) 全站VV
                          from(
                            select cid,sum(inad) inad,sum(invv) invv,sum(outad) outad,sum(outvv) outvv,
                            sum(mad) mad,sum(mvv) mvv,sum(androidad) androidad,sum(androidvv) androidvv,sum(iosad) iosad,sum(iosvv) iosvv
                            from {$sqlTable} where cid in ({$strCid}) {$sqlStaticCondition} group by cid
                          ) a
                          join (
                          select cid, inuv, outuv, muv, androiduv, iosuv, alluv from ciduv where cid in ({$strCid}) {$sqlStaticCondition}
                          )b
                          on a.cid=b.cid group by a.cid";
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
            $sqlTable = "referaduvvv_{$year} ";
            $sqlStaticCondition = " and date >= '{$ge_date}' and date <= '{$le_date}' ";

            if($refer && $ge_date && $le_date){
                //精确查询
                if($search_type ==1){

                    $strRefer = App::resolveSqlInCondition($refer, false);
                    $sql = "select date, refer, sum(adshow) adshow, sum(uv) UV, sum(vv) VV from {$sqlTable} where refer in ({$strRefer}) {$sqlStaticCondition} group by refer, date";
                    if($show_type == 2)
                        $sql = "select refer, sum(adshow) adshow, sum(uv) UV, sum(vv) VV from {$sqlTable} where refer in ({$strRefer}) {$sqlStaticCondition} group by refer";
                }
                //模糊查询
                if($search_type ==2){
                    $sql = "select date, '{$refer}' refer, sum(adshow) adshow, sum(vv) VV from {$sqlTable} where refer like '{$refer}%' {$sqlStaticCondition} group by date";
                    if($show_type == 2)
                        $sql = "select '{$refer}' refer, sum(adshow) adshow, sum(vv) VV from {$sqlTable} where refer like '{$refer}%' {$sqlStaticCondition}";
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

            $sqlTable = "urlpvuv_{$year} ";
            $sqlStaticCondition = " and date >= '{$ge_date}' and date <= '{$le_date}' ";

            if($url && $ge_date && $le_date){
                //精确查询
                if($search_type ==1){
                    $strUrl =  App::resolveSqlInCondition($url, false);
                    $sql = "select date, sum(pv) PV, sum(uv) UV from {$sqlTable} where url in ({$strUrl}) {$sqlStaticCondition} group by url, date";
                    if($show_type == 2)
                        $sql = "select  sum(pv) PV, sum(uv) UV from {$sqlTable} where url in ({$strUrl}) {$sqlStaticCondition} group by url";
                }
                //模糊查询
                if($search_type ==2){
                    $sql = "select date, '{$url}' url, sum(pv) PV from {$sqlTable} where url like '{$url}%' {$sqlStaticCondition} group by date";
                    if($show_type == 2)
                        $sql = "select '{$url}' url, sum(pv) PV from {$sqlTable} where url like '{$url}%' {$sqlStaticCondition}";
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

        $this->render('url查询PV,UV', 'chaxun/url.php', ['list'=>$list, 'error'=>$msg]);
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
