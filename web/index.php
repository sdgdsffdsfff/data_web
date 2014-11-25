<?php
require dirname(__FILE__) . '/../config.php';

//require_once(CODE_BASE . "libs/Memcache.SessionHandler.php");
//$session_handler = new MemcacheSessionHandler($memcache_host);
//session_set_save_handler($session_handler, true);
//第四个参数在启用https链接的网站可以设置为true，否则必须设为false
session_set_cookie_params(0, '/', DOMAIN, false, true);
session_cache_limiter(false);
session_start();

require_once(CODE_BASE . "libs/Mysql.class.php");
require_once(CODE_BASE . 'libs/Smarty.class.php');
require_once(CODE_BASE . 'libs/auth.php');

# Frameworks
require_once (CODE_BASE . 'Slim/Slim.php');
\Slim\Slim::registerAutoloader();

date_default_timezone_set('Asia/Shanghai');
if(!isset($_SESSION['LANG'])){
    $_SESSION['LANG'] = 'cn';
}
require CODE_BASE . '/i18n/' . $_SESSION['LANG'] . '.php';

$smarty = new Smarty();
$smarty->template_dir = CODE_BASE . '/web/templates/';
$smarty->compile_dir = CODE_BASE . '/web/templates_c/';
$smarty->plugins_dir = CODE_BASE . '/libs/plugins/';  //插件文件
$smarty->cache_dir =  CODE_BASE . '/web/cache/';
$smarty->cache_lifetime = 600;//缓存时间

$app = new \Slim\Slim();

if(AUTH_ENABLE == 1)
{
    $app->hook('slim.before.dispatch', 'web_auth');
}

$mysql_db = new Db_Mysql($mysql_config);
$app->config(array( 'mysql_db' => $mysql_db, 'view' => $smarty, 'LANG' => $LANG));

if(DEV == 1){
    $smarty->caching = false;
    $smarty->debugging = false;
    $app->config('debug', true);
} else {
    $smarty->caching = false;
    $smarty->debugging = false;
    $app->config('debug', false);
}

require_once("admin_index.php");
require_once("hl_index.php");
require_once("trend_index.php");
require_once("utcc_index.php");

$app->run();

