<?php
$ext = $argv[1];
require dirname(__FILE__) . '/config.php';
require_once(CODE_BASE . "libs/Oracle.class.php");
$oracle_db = new Db_Oracle($oracle_config);
if(!$ext) $ext = 1;
$d = date("Y-m-d",time() - $ext * 24*60*60);
$sql = "select * from ku6_dev.v_ku6_duanku_daily WHERE DATA_DESC='$d'";
echo $sql;
$stid = $oracle_db->query($sql);
if(!$stid) return NULL;
$data = $oracle_db->fetchAll($stid);
echo $d;
print_r($data);

$date = $data['VID'];
$in_idx = -1;
$out_idx = -1;
foreach($date as $idx => $val){
    if($val == "app_in"){
        $in_idx = $idx;
    }
    if($val == "app_out"){
        $out_idx = $idx;
    }
}

$in_uv = 0;
$in_vv = 0;
$out_uv = 0;
$out_vv = 0;

if($in_idx > -1){
    // 没有站内信息
    $in_uv = $data['UV'][$in_idx];
    $in_vv = $data['VV'][$in_idx];

} 
if($out_idx > -1){
    // 没有站外信息
    $out_uv = $data['UV'][$out_idx];
    $out_vv = $data['VV'][$out_idx];
}

$mc = new Memcached();
$mc->addServer('a.ku6.com', 11211);
$r = $mc->set("duanku_$d", implode(",", array($in_uv, $in_vv, $out_uv, $out_vv)), 0);

echo implode(",", array($in_uv, $in_vv, $out_uv, $out_vv));
echo "\n";
