<?php

//各频道页PV/UV日报
$app->get('/hl/vhl/sub_site_daily', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_sub_site_daily();
});

//频道日报
$app->get('/hl/vhl/channel_daily', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_channel_daily();
});

//频道日报top50
$app->get('/hl/vhl/channel_daily_top50', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_channel_daily_top50();
});

//vv来源分析
$app->get('/hl/vhl/vv_src', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_vv_src();
});

//ku6站内日报
$app->get('/hl/vhl/in_daily', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_in_daily();
});
//ku6各来源UV及带来的VV日报
$app->get('/hl/vhl/refer_uv_vv_daily', function () use($app) {
    $hl = new WebHighLevelController($app);
    $hl->hl_vhl_refer_uv_vv_daily();
});

