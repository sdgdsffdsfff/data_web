<?php
/*
 * 数据查询
 * @author dongyule
 *
 */

//UID,VID,CID查询明细
$app->map('/chaxun/uid_vid_cid', function () use($app) {
    $c = new WebChaxunController($app);
    $c->uid_vid_cid_action();
})->via('GET', 'POST');

//refer查询明细
$app->map('/chaxun/refer', function () use($app) {
    $c = new WebChaxunController($app);
    $c->refer_action();
})->via('GET', 'POST');

//refer查询明细
$app->map('/chaxun/url', function () use($app) {
    $c = new WebChaxunController($app);
    $c->url_action();
})->via('GET', 'POST');