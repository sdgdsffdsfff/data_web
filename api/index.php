<?php
require dirname(__FILE__) . '/../config.php';
/*
 * 设置session保存方式，默认memcache，不可用时file
 */
//require_once(CODE_BASE . "libs/Memcache.SessionHandler.php");
//$session_handler = new MemcacheSessionHandler($memcache_host);
//session_set_save_handler($session_handler, true);
session_set_cookie_params(0, '/', DOMAIN, false, true);
//session_cache_limiter(false);
session_start();

require_once (CODE_BASE . 'Slim/Slim.php');
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
if(AUTH_ENABLE == 1)
{
    $app->hook('slim.before.dispatch', 'api_auth');
}
if(DEV==1){
    $app->config('debug', true);
}

require_once(CODE_BASE . "libs/Mysql.class.php");
$mysql_db = new Db_Mysql($mysql_config);
$mysql_data_db = new Db_Mysql($mysql_data_config);
$mysql_utcc_db = new Db_Mysql($mysql_utcc_config);
$mysql_machineMonitor_db = new Db_Mysql($mysql_machineMonitor_config);

//json api 返回格式设置
$res_format = [
    'meta' => ['status' => 404, 'msg' => 'default segment'], 
    'response' => []
];

//设置应用参数
$app->config([
    'mysql_db' => $mysql_db,
    'mysql_data_db'=>$mysql_data_db, 
    'mysql_utcc_db'=>$mysql_utcc_db, 
    'mysql_machineMonitor_db'=>$mysql_machineMonitor_db,
    'resp' => $res_format
]);

require_once("hl_index.php");
require_once("trend_index.php");
require_once("utcc_index.php");

$app->get('/test', function () use($app) {
    //var_dump($app->request()->get('xx'));
    $app->render('test.php');
});
$app->run();

