<?php
/*
 * 上传转码分发监控
 * @author dongyule
 * 
 */
$controllers = array('utcc');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."web_" . $key . "_controller.php");
}
//上传视频状态分布
$app->get('/utcc/upload_video_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->upload_video_distribution();
});
//转码任务状态分布
$app->get('/utcc/transcoding_task_state_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->transcoding_task_state_distribution();
});
//转码中任务数量分布
$app->get('/utcc/transcoding_tasks_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->transcoding_tasks_distribution();
});
//转码积压按上传机分组
$app->get('/utcc/transcoding_backlog_grouped_by_uploading_machine', function () use($app) {
        $c = new WebUtccController($app);
        $c->transcoding_backlog_grouped_by_uploading_machine();
});
//转码耗时的任务
$app->get('/utcc/transcoding_timeconsuming_task', function () use($app) {
        $c = new WebUtccController($app);
        $c->transcoding_timeconsuming_task();
});
//分发任务状态分布
$app->get('/utcc/dispatch_task_state_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->dispatch_task_state_distribution();
});
//待分发/分发中任务数量分布
$app->get('/utcc/to_dispatch_and_dispatching_tasks_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->to_dispatch_and_dispatching_tasks_distribution();
});
//分发耗时的任务
$app->get('/utcc/dispatch_timeconsuming_task', function () use($app) {
        $c = new WebUtccController($app);
        $c->dispatch_timeconsuming_task();
});
//今日视频上传来源分布
$app->get('/utcc/today_video_upload_source_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->today_video_upload_source_distribution();
});

//转码失败任务状态分布
$app->get('/utcc/transcoding_fails_task_distribution', function () use($app) {
        $c = new WebUtccController($app);
        $c->transcoding_fails_task_distribution();
});