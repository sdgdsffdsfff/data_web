<?php
$controllers = array('highlevel');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."api_" . $key . "_controller.php");
}

//高层报表，视频高层日报， 核心数据日报
$app->get('/hl/vhl/sub_site_daily', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->sub_site_daily();
});

//高层报表，视频高层日报， 频道日报
$app->get('/hl/vhl/channel_daily', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->channel_daily();
});
//高层报表，视频高层日报， 频道日报top50
$app->get('/hl/vhl/channel_daily_top50', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->channel_daily_top50();
});

//高层报表，视频高层日报， VV来源分析
$app->get('/hl/vhl/vv_src', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->vv_src();
});


//高层报表，视频高层日报， 站内日报
$app->get('/hl/vhl/in_daily', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->in_daily();
});

//视频高层日报，各来源uv及带来的vv日报
$app->get('/hl/vhl/refer_uv_vv_daily', function () use($app) {
    $highlevel = new HighLevelController($app);
    $highlevel->hl_vhl_refer_uv_vv_daily();
});

