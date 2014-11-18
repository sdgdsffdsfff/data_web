<?php
putenv("ORACLE_HOME=/home/ku6_data/oracle/instantclient_11_2");
define('AUTH_ENABLE', 1);
define('DOMAIN', 'ku6data.sdo.com');
define('CODE_BASE', dirname(__FILE__) . "/../");


$oracle_config = array('user' => 'ku6_dev', 'password' => 'ku6_dev_123', 'database' => '//10.125.60.22/dw2', 'charset' => 'utf8', 'persistent' => true);

$mysql_config = array('host' => '10.133.101.24', 'port' => 3306, 'user' => 'root', 'password' => 'vsFsAX4XTCE9ZQqd', 'database' => 'xiezhi', 'charset' => 'utf8', 'persistent' => true);
$utcc_mysql_config = array('host' => '122.11.45.30', 'port' => 3306, 'user' => 'root', 'password' => 'vku@snda', 'database' => 'utcc_monitor', 'charset' => 'utf8', 'persistent' => true);

define("DEV", 0);
define("SITE_PREFIX", '/stage/web/');
define("API_PREFIX", '/stage/api/');


define("USER_GROUP_TABLE", "user_group");
define("USER_TABLE", "users");
define("PRIVATES_TABLE", "privates");
define("REPORT_TABLE", "reports");
define("MONITOR_TABLE", "monitor_tables");
define("UTCC_TABLE", "utcc_task_info");

//set default time zone
date_default_timezone_set('Asia/Chongqing') ;

define("MAIL_NAME", "data_monitor@sohu.com");
define("MAIL_PASS", "kU^M@lL*M0N1T0$");
define("MAIL_SMTP", "smtp.sohu.com");

$MODULES = array(
    ''
    ,'utcc' // UTCC 转换
    ,'mb'   // 移动客户端
    ,'buffer'   // 缓冲日报
    ,'spec'  // 特殊要求,如vv时报
    //,'mobile' // 移动端
    ,'myku6'//my.ku6日报
    //,'loadtime'//my.ku6日报
);



