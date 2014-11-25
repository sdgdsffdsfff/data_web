<?php
define('AUTH_ENABLE', 1);
define('DOMAIN', 'datalocal.ku6.com');
define('CODE_BASE', dirname(__FILE__) . "/../");

//数据平台user及权限数据库
$mysql_config = array('host' => '122.11.33.16', 'port' => 3306, 'user' => 'root', 'password' => '123123', 'database' => 'data_web', 'charset' => 'utf8', 'persistent' => true);
//数据平台统计数据
$mysql_data_config = array('host' => '122.11.32.175', 'port' => 3310, 'user' => 'ku6_report', 'password' => 'ku6@963147!@#$pwd', 'database' => 'ku6_report', 'charset' => 'utf8', 'persistent' => true);
//utcc
$mysql_utcc_config = array('host' => '122.11.45.195', 'port' => 3317, 'user' => 'kou', 'password' => 'Ku6@oss.com', 'database' => 'new_utcc', 'charset' => 'utf8', 'persistent' => true);
$memcache_host = array(array('host' => '122.11.33.113', 'port' => 11211));

define("DEV", 1);
define("SITE_PREFIX", '/web/');
define("API_PREFIX", '/api/');
define("DOWNLOAD_PREFIX", '');

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
define("XXTEA_KEY", "ku6data!@#123");

$MODULES = array(

);



