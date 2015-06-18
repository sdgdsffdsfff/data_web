<?php
define('CODE_BASE', dirname(__FILE__) . "/../");

include CODE_BASE.'configs/main.php';
/*
//require_once(CODE_BASE . "libs/Memcache.SessionHandler.php");
//$session_handler = new MemcacheSessionHandler($memcache_host);
//session_set_save_handler($session_handler, true);
//第四个参数在启用https链接的网站可以设置为true，否则必须设为false
session_set_cookie_params(0, '/', DOMAIN, false, true);
//session_cache_limiter(false);
*/

# Frameworks
require_once (CODE_BASE . 'library/Slim/Slim.php');
\Slim\Slim::registerAutoloader();

#app autoloader
require_once (CODE_BASE . 'library/App.php');
App::registerAutoloader();


$app = new \Slim\Slim(['mode' => MODE]);

// 只在“production”模式中执行
$app->configureMode('production', function() use($app){
    $app->config(array(
        'log.enable' => true,
        'debug' => false
    ));
});

// 只在“development”模式中执行
$app->configureMode('development', function() use($app){
    $app->config(array(
        'log.enable' => false,
        'debug' => true
    ));
});

//使用 \Slim\Middleware\SessionCookie 中间件把会话数据储存到经过加密和散列的 HTTP cookies中
$app->add(new \Slim\Middleware\SessionCookie(array(
    'expires' => '20 minutes',
    'path' => '/',
    'domain' => DOMAIN,
    'secure' => false,
    'httponly' => true,
    'name' =>'data_session',
    'secret' => 'CHANGE_ME',
    'cipher' => MCRYPT_RIJNDAEL_256,
    'cipher_mode' => MCRYPT_MODE_CBC
)));

//权限判断
$app->hook('slim.before.dispatch', function() use($app){

    if(strpos($_SERVER['REQUEST_URI'], 'login') > 0) return true;
    if(strpos($_SERVER['REQUEST_URI'], 'check') > 0) return true;
    if(!isset($_SESSION['username'])
        || !isset($_SESSION['token'])
        || !isset($_SESSION['url'])
        || !isset($_SESSION['report_ids'])){
        return $app->redirect(SITE_PREFIX . 'login');
    }
    $url = substr($app->request()->getPath(), strlen(SITE_PREFIX));
    if($url == "admin/welcome") return true;
    if($url == "") return $app->redirect(SITE_PREFIX . 'admin/welcome');
    if($url == "logout") return true;
    if(strpos($url, 'user') >0 && in_array('admin/usersmanager', $_SESSION['url'])) return true;
    if(strpos($url, 'report') >0 && in_array('admin/reportsmanager', $_SESSION['url'])) return true;
    if(strpos($url, 'machine') !== false && in_array('machine/manager', $_SESSION['url'])) return true;
    if(strpos($url, 'chaxun/export') !== false) return true;
    if(strpos($url, 'show/export') !== false) return true;
    if(!isset($_SESSION['url']) || !in_array($url, $_SESSION['url'])){
        return $app->halt('401', 'Not Authorized <a href=' . SITE_PREFIX . '/login>Login</a>');
    }
    return true;
});

//单例mysql
$db_config = require_once (CODE_BASE . 'configs/mysql.php');
$app->container->singleton('db_admin', function() use($db_config){
        return new Mysql($db_config['admin']);
});
$app->container->singleton('db_zebra', function() use($db_config){
    return new Mysql($db_config['zebra']);
});
$app->container->singleton('db_chaxun', function() use($db_config){
    return new Mysql($db_config['chaxun']);
});
$app->container->singleton('db_show', function() use($db_config){
    return new Pgsql($db_config['show']);
});


require_once("admin_index.php");
require_once("hl_index.php");
require_once("trend_index.php");
require_once("utcc_index.php");
require_once("machine_index.php");
require_once("chaxun_index.php");
require_once("show_index.php");

$app->run();

