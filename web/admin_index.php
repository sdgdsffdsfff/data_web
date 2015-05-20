<?php

$app->get('/', function () use($app) {

});

/******************登陆相关*****************************/
$app->get('/login', function() use($app){

    $_C = new WebAdminController($app);
    $_C->login_action();

});

$app->post('/login', function() use($app){
    $_C = new WebAdminController($app);
    $_C->login_action();
});

$app->get('/logout', function() use($app){
    $user = new WebAdminController($app);
    $user->logout_action();
});

$app->get('/admin/welcome', function() use($app){
    $hl = new WebAdminController($app);
    $hl->welcome_action();
});


/******************用户组管理*****************************/
// 列表用户组
$app->get('/admin/usergroupmanager', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->usergroupmanager_action();
});

// 添加用户组
$app->post('/admin/add_usergroup', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->add_usergroup_action();
});

// 删除用户组
$app->get('/admin/delusergroup', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->del_usergroup();
});


/******************报表管理*****************************/
// 列表报表和报表组
$app->get('/admin/reportsmanager', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->reports_list_action();
});
// 删除报表
$app->get('/admin/delreport', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->delreport_action();
});
// 添加报表
$app->post('/admin/newreport', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->newreport_action();
});

/******************用户管理**********************************/

// 用户列表
$app->get('/admin/usersmanager', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->usermanager_action();
});

$app->post('/admin/newuser', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->newuser_action();
});

$app->get('/admin/deluser', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->deluser_action();
});
$app->get('/admin/modifyuser/id/:id', function ($id) use($app) {
    $hl = new WebAdminController($app);
    $hl->modifyuser_action($id);
});
$app->post('/admin/updateuser', function () use($app) {
    $hl = new WebAdminController($app);
    $hl->updateuser_action();
});



