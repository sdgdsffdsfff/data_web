<?php
require_once(dirname(__FILE__).'/../config.php');
require_once(CODE_BASE.'/libs/Mysql.class.php');
require_once(CODE_BASE.'/libs/Oracle.class.php');
require_once(CODE_BASE.'/model/api_data_monitor.php');
require_once(CODE_BASE.'/libs/Mail.class.php');

$_mysql = new Db_Mysql($mysql_config);
$_oracle = new Db_Oracle($oracle_config);
$_dm = new DataMonitorModel($_oracle, $_mysql);

date_default_timezone_set('Asia/Chongqing') ;
echo date('Y-m-d H:i:s');
//get report list
$tables = $_dm->get_table_info();
$nodata_tables = $_dm->get_nodata_table_info();
$tables = array_merge($tables, $nodata_tables);
print_r($tables);
//$tables = $_db->get_table_info();
foreach( $tables as $table){
    $query_sql = $table['query_sql'];
    $time_offset = $table['time_offset'];
    $table_id = $table['tid'];
    $check = $_dm->check_table($query_sql, $time_offset);
    $_dm->update_time($table_id);
    if($check){
        //update exec_time
        $_dm->update_exec_count($table_id, TRUE);
    }
    else{
        //warning
        //send message or put data into mysql
        $_dm->update_exec_count($table_id, FALSE);
    }
}

//send mails
$msg = "";
$recip = $_dm->get_reciver();

//send error mails
$error_tables = $_dm->get_error_table_info();
//print_r($error_tables);
if(count($error_tables) > 0 ){
    $msg .= gen_html($error_tables, 2);
}

//send warning mails
$warning_tables = $_dm->get_warn_table_info();
//print_r($warning_tables);
if(count($warning_tables) > 0 ){
    $msg .= gen_html($warning_tables, 1);
}

if($msg != ""){
    foreach( $recip as $item){
        if(!isset($item['email']) || $item['email'] == ''){
            continue;
        }
        send_noti_mail($item['email'], "warning tables", $msg, $item['nickname']);
    }
}

//generate html e-mail
function gen_html($table_arr, $level = 1){
    if($level == 1){
        $title = "<h3 style='color:blue;'>半小时后没有数据的日报， warning</h3>";
    }
    else{
        $title = "<h3 style='color:red;'>一小时后没有数据的日报， error</h3>";
    }
    $table_header = "<table border='1' cellspacing='0px' style='border-color:#808080;border-style:outset;border-collapse:collapse;border-width:1px;border-spacing:0px;'><tbody><tr><td>日报</td><td>url</td><td>查询语句</td><td>检查时间</td><td>检查次数</td></tr>";
    $length = count($table_arr);
    $table_rows = "";
    for($i = 0 ; $i < $length ; $i ++ ) {
        $item = $table_arr[$i];
        $table_rows .= "<tr><td>".$item['report']."</td><td>".$item['url']."</td><td>".$item['query_sql']
            ."</td><td>".$item['exec_time']."</td><td>".$item['exec_count']."</td></tr>";
    }
    $table_footer = "</tbody></table>";

    $html = $title . $table_header . $table_rows . $table_footer ;
    return $html;
}

?>
