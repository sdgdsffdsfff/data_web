<?php
/*
 * 秀场数据查询
 * @author dongyule
 *
 */

$app->map('/show/reguser_count', function () use($app) {
    $c = new WebShowController($app);
    $c->reguser_count_action();
})->via('GET', 'POST');

$app->map('/show/loginuser_count', function () use($app) {
    $c = new WebShowController($app);
    $c->loginuser_count_action();
})->via('GET', 'POST');

$app->map('/show/charge', function () use($app) {
    $c = new WebShowController($app);
    $c->charge_action();
})->via('GET', 'POST');

$app->map('/show/room_charge', function () use($app) {
    $c = new WebShowController($app);
    $c->room_charge_action();
})->via('GET', 'POST');

$app->map('/show/gold_amount', function () use($app) {
    $c = new WebShowController($app);
    $c->gold_amount_action();
})->via('GET', 'POST');

//导出excel
$app->post('/show/export', function () use($app) {
    $c = new WebChaxunController($app);
    $c->export_action();
});

