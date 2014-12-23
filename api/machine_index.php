<?php
$controllers = array('machine');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."api_" . $key . "_controller.php");
}
/*
 * 机器监控api
 * @author dongyule
 */

$app->post('/machine/monitor_update', function () use($app) {
    $c = new ApiMachineController($app);
    $c->actionMonitorUpdate();
});



