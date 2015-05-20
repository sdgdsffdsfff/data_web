<?php

//机器所属用户管理
$app->get('/machine/usermanager', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionUserManager();
});
//机器所属用户添加
$app->post('/machine/useradd', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionUserAdd();
});
//机器所属用户删除
$app->get('/machine/userdelete', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionUserDelete();
});

//机器管理
$app->map('/machine/manager', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionManager();
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
$app->map('/machine/monitor', function () use($app) {
        $c = new WebMachineController($app);
        $c->actionMonitor();
})->via('GET', 'POST');

