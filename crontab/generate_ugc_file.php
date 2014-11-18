<?php
//1 11 * * * /home/ku6_data/apps/bin/php /home/ku6_data/www/xiezhi/crontab/generate_ugc_file.php  > /tmp/generate_ugc.log 2>&1 &
set_time_limit(0);
require_once(dirname(__FILE__).'/../config.php');
//require_once(CODE_BASE.'/libs/Mysql.class.php');
require_once(CODE_BASE.'/libs/Oracle.class.php');
$_oracle = new Db_Oracle($oracle_config);
date_default_timezone_set('Asia/Chongqing') ;

if($argc == 2){
    $the_date = $argv[1];
}

generate_download();
if(!isset($the_date)){
    delete_old_files();
}
iconv_file();

function iconv_file(){
    global $the_date;
    if(!$the_date){
        $date = date("Ymd", time() - 24*60*60);
    }
    else{
        $date = $the_date;
    }
    $filename = 'ugc_'.$date.'.csv';
    $dir = CODE_BASE.'/download/';
    $file = $dir.$filename;
    if(!file_exists($file)){
        return;
    }
    
    $cmd = "/usr/bin/iconv -f utf8 -t gbk $file > $file.gbk && mv $file.gbk $file";
    $res = system($cmd);
    //var_dump($res);
    return;
    //$str = file_get_contents($file);
    //$gbk_str = iconv('UTF-8', 'GB18030', $str);
    //file_put_contents($file, $gbk_str);
    //return;
}
function delete_old_files(){
    $date = date("Ymd", time() - 30*24*60*60);
    $dir = CODE_BASE.'/download/';
    $filename_prefix = 'ugc_';
    $d = dir($dir);
    while(($file = $d->read()) !== false){
        if($file != '.' && $file != '..'){
            //$files[] = $file;
            //rm file
            if(substr($file, 4) < $date.'.csv'){
                unlink($dir.$file);
            }
        }
    }
    $d->close();
}
function generate_download(){
    global $the_date;
    if(!$the_date){
        $date = date("Ymd", time() - 24*60*60);
    }
    else{
        $date = $the_date;
    }
    //$date = date("Ymd", time() - 24*60*60);
    $filename = 'ugc_'.$date.'.csv';
    $dir = CODE_BASE.'/download/';
    $file = $dir.$filename;
    if(file_exists($file)){
        unlink($file);
    }
    //fwrite($f, "x\n");
    //fclose($f);
    //echo 'x';
    $count = get_total();
    $page_size = 1000;
    $page_count = intval($count / 1000) + 1;
    echo $page_count;
    //die;
    for($i = 0 ; $i < $page_count ; $i++){
        $data = get_page_data($i + 1, $page_size);
        $str = parse_data($i, $data);
        $f = fopen($file, 'a+');
        fwrite($f, $str);
        fclose($f);
    }
}

function parse_data($page, $data){
    $str =  '';
    $header = array();
    foreach($data as $key => $value){
        $header[] = $key;
    }
    if($page == 0 ){
        $str .= implode(',', $header);
        $str .= "\n";
    }

    $length = count($data[$header[0]]);
    if($length == 0){
        var_dump($data);
        die;
    }
    //echo $length."\n";
    for($i = 0 ; $i < $length ; $i++){
        $line_str = '';
        $line = array();
        foreach($header as $h){
            $line[] = $data[$h][$i];
        }
        $line_str = implode(',', $line);
        $line_str .= "\n";
        $str .= $line_str;
    }
    return $str;
}


function get_total() {
    global $_oracle;
    global $the_date;
    if(!$the_date){
        $date = date("Y-m-d", time() - 24*60*60);
    }
    else{
        $year = substr($the_date, 0, 4);
        $month = substr($the_date, 4, 2);
        $day = substr($the_date, 6, 2);
        $date = "{$year}-{$month}-{$day}";
    }
    //$sql = "select count(1) as cnt  from ku6_dev.v_ku6_ugc_qdfc_value_day";
    $sql = "select count(1) as cnt  from ku6_dev.ku6_vcu_qdfc_daily where data_desc = '{$date}'";
    $sid = $_oracle->query($sql);
    if(!$sid) return NULL;
    $res = $_oracle->fetchAll($sid);
    return $res['CNT'][0];
}

function get_page_data($page_num = 1 , $size = 1000){
    global $_oracle;
    global $the_date;
    if(!$the_date){
        $date = date("Y-m-d", time() - 24*60*60);
    }
    else{
        $year = substr($the_date, 0, 4);
        $month = substr($the_date, 4, 2);
        $day = substr($the_date, 6, 2);
        $date = "{$year}-{$month}-{$day}";
    }
    $start = $size * ($page_num - 1);
    $end = $size * $page_num;

    $sql = "select * from ( "
         . "    select rownum rn, "
         . "      a.data_desc 日期,"
         . "      a.userid 用户id, "
         . "      nvl(a.lj_new_scn, 0)  本月累计上传有效量, "
         . "      nvl(a.lj_ad_show, 0) 本月累计ADSHOW, "
         . "      nvl(a.ad_show, 0) 当日ADSHOW, "
         . "      nvl(a.lj_vv, 0) 本月累计播放量VV, "
         . "      nvl(a.vv, 0)  当日播放量VV, "
         . "      nvl(a.lj_znvv, 0) 本月累计站内播放量VV, "
         . "      nvl(a.znvv, 0)  当日站内播放量VV"
         . "    from ku6_vcu_qdfc_daily a "
         . "    where a.data_desc = '{$date}'"
         . "  ) b "
         . "  where b.rn > {$start} and b.rn <= {$end}";
    $sid = $_oracle->query($sql);
    if(!$sid) return array();
    $res = $_oracle->fetchAll($sid);
    return $res;
}
