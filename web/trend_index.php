<?php
/*
 * 趋势分析
 * @author dongyule
 * 
 */
$controllers = array('trend');
foreach($controllers as $key){
    require_once(CODE_BASE . "/controller/" ."web_" . $key . "_controller.php");
}
//ku6站内VV时报
$app->get('/trend/in_vv_hour', function () use($app) {
        $hl = new TrendController($app);
        $hl->in_vv_hour();
});


