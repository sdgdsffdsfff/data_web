<?php
require_once(CODE_BASE . "/controller/admin_controller.php");
require_once(CODE_BASE . "/controller/web_admin_controller.php");
require_once(CODE_BASE . "/controller/api_user_controller.php");

//login
$app->get('/', function () use($app) {
    
});

$app->get('/login', function() use($app){
    $login_handler = new AdminController($app);
    $login_handler->show_login();
});

$app->post('/login', function() use($app){
    $user = new UserController($app);
    $user->web_login();
});
$app->get('/logout', function() use($app){
    $user = new UserController($app);
    $user->web_logout();
});
$app->get('/admin/welcome', function() use($app){
    $hl = new WebReportsController($app);
    $hl->welcome();
});
// 删除用户组
$app->get('/admin/delusergroup', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->del_usergroup();
});

// 列表用户组
$app->get('/admin/usergroupmanager', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->groupmanager();
});

// 添加用户组
$app->post('/admin/usergroupmanager', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->add_usergroup();
});

// 用户列表
$app->get('/admin/usersmanager', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->usermanager();
});
// 删除报表
$app->get('/admin/delreport', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->delreport();
});
// 添加报表
$app->post('/admin/newreport', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->newreport();
});
// 列表报表和报表组
$app->get('/admin/reportsmanager', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->reports_list();
});

$app->post('/admin/newuser', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->newuser();
});

$app->get('/admin/deluser', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->deluser();
});
$app->get('/admin/modifyuser/id/:id', function ($id) use($app) {
    $hl = new WebReportsController($app);
    $hl->moduser($id);
});
$app->post('/admin/updateuser', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->updateuser();
});

$app->get('/admin/monitor', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->listmonitor();
});
$app->post('/admin/monitor', function () use($app) {
    $hl = new WebReportsController($app);
    $hl->addmonitor();
});
$app->get('/admin/delmonitor/id/:id', function ($id) use($app) {
    $hl = new WebReportsController($app);
    $hl->delmonitor($id);
});


