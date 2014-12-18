<?php
$controllers = array('machine');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."api_" . $key . "_controller.php");
}
/*
 * 机器监控api
 * @author dongyule
 */
//机器列表
$app->get('/machine/manager', function () use($app) {
    $c = new ApiMachineController($app);
    $c->manager();
});



