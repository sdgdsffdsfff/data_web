<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>{$title}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{$SITE_PREFIX}m/css/jquery.mobile-1.2.0.min.css" />
<script src="{$SITE_PREFIX}/js/jquery.min.js" type="text/javascript"></script> 
<script src="{$SITE_PREFIX}/js/highcharts.src.js" type="text/javascript"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/data.func.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/jquery.wysiwyg.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/functions.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/visualize.jQuery.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/jquery-ui-1.8.5.custom.min.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/heartcode-canvasloader-min-0.9.1.js"></script>
<script src="{$SITE_PREFIX}m/scripts/jquery.mobile-1.2.0.min.js"></script>
<script type = "text/javascript">
{if isset($user) }
var user = '{$user}'; 
var token = '{$token}';
{else} 
var user = ''; 
var token = '';
{/if}
</script>
</head>
<body>
<div data-role="page">
    <div data-theme="a" data-role="header">
        <h3>
            {$title}
        </h3>
    </div>
    <div data-role="content">
