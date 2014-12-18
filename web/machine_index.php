<?php
/*
 * 机器监控
 * @author dongyule
 * 
 */
$controllers = ['machine'];
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."web_" . $key . "_controller.php");
}
//机器管理
$app->get('/machine/manager', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionManager();
});
//机器列表
$app->map('/machine/list', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionList();
})->via('GET', 'POST');

//机器添加
$app->post('/machine/add', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionAdd();
});

//机器删除
$app->get('/machine/delete', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionDelete();
});

//监控报表
$app->get('/machine/monitor', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionMonitor();
});

$app->map('/machine/monitor_list', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionMonitorList();
})->via('GET', 'POST');
