<?php
$controllers = array('trend');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."api_" . $key . "_controller.php");
}
/*
 * 趋势分析api
 * @author dongyule
 */
//ku6站内VV时报, 30天
$app->get('/trend/in_vv_hour', function () use($app) {
    $trend = new ApiTrendController($app);
    $trend->in_vv_hour();
});

//ku6站内VV时报来源分析, 
$app->get('/trend/refer_in_vv_hour', function () use($app) {
    $trend = new ApiTrendController($app);
    $trend->refer_in_vv_hour();
});


