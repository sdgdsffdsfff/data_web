<?php
define('CODE_BASE', dirname(__FILE__) . "/../");

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
    $req = $app->request();
    // 将POST的UTCC的放行，在逻辑中检查是否合理
    if(strpos($_SERVER['REQUEST_URI'], 'utcc') > 0) return true;
    if(strpos($_SERVER['REQUEST_URI'], 'test') !== FALSE) return true;

    if(isset($_SESSION['username']) && $_SESSION['username'] == $req->params('username')
        && isset($_SESSION['token']) && $_SESSION['token'] == $req->params('token')
        && isset($_SESSION['url']) && in_array(substr($req->getPath(), strlen(API_PREFIX)), $_SESSION['url'])){
        return true;
    }
    //wrong parameter error
    $err_res = json_encode(['meta' => ['status' => 401, 'msg' => 'you are not permitted to access this interface. wrong parameter']]);
    $app->halt(401, $err_res);
});

//单例mysql
$db_config = require_once (CODE_BASE . 'configs/mysql.php');
$app->container->singleton('db_ku6_report', function() use($db_config){
    return new Mysql($db_config['ku6_report']);
});
$app->container->singleton('db_new_utcc', function() use($db_config){
    return new Mysql($db_config['new_utcc']);
});



require_once("hl_index.php");
require_once("trend_index.php");
require_once("utcc_index.php");

$app->run();
