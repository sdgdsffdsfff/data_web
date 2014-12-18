<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!--<meta name="viewport" content="width=device-width"> -->
<meta name="robots" content="noarchive"> 
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta http-equiv="X-UA-Compatible" content="IE=9, IE=10, IE=11, IE=12"/>
<title>{$title}</title>

<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/layout.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/themes/green/styles.css">

<script src="{$SITE_PREFIX}/js/libs/jquery.min.js" type="text/javascript"></script> 
<script src="{$SITE_PREFIX}/js/libs/Highstock-2.0.3/highstock.js" type="text/javascript"></script>
<script src="{$SITE_PREFIX}/js/libs/Highstock-2.0.3/modules/exporting.js" type="text/javascript"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/libs/jquery.flip.min.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/libs/visualize.jQuery.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/libs/jquery-ui-1.8.5.custom.min.js"></script>
<script type = "text/javascript" src = "{$SITE_PREFIX}/js/libs/heartcode-canvasloader-min-0.9.1.js"></script>

<script type = "text/javascript" src = "{$SITE_PREFIX}/js/functions.js"></script>
<script src="{$SITE_PREFIX}/js/helper.js" type="text/javascript"></script>

<script language="javascript">
{if isset($user) && $user }
var user = '{$user}';
var token = '{$token}';
{else}
var user = '';
var token = '';
{/if}
var SITE_PREFIX="{$SITE_PREFIX}";
var API_PREFIX="{$API_PREFIX}";
</script>

</head>
<body id = 'homepage'>
<div id="top_container" style = 'min-width:980px'> 
<div id="header">
    <div style = 'min-width:980px;margin: 0 auto' id="header_wrapper">    
        <a href="{$SITE_PREFIX}admin/welcome" title=""><img src="/res/image/cp_logo.png" alt="Control Panel" class="logo" /></a>
    </div>

</div>
<div id = 'wrap' style = 'min-width:980px;margin: 0 auto'>
{include file='left.tpl'}
