<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="maximum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=0">
<meta name="robots" content="noarchive">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta http-equiv="X-UA-Compatible" content="IE=9, IE=10, IE=11, IE=12"/>
<title>{$title}</title>
<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/login.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/layout.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/wysiwyg.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="{$SITE_PREFIX}/css/themes/green/styles.css">
</head>
<body >
<div id="logincontainer">      
<!--
<div class="status warning" id="bbrowser" >
<p><img src="/res/image/icons/icon_warning.png" alt="Warning"><span>注意</span> 为了更好的展示和压缩成本，本系统不支持IE7以下的浏览器.</p>
</div>
-->

{if $error != ""}
<div class="status error">
<p class="closestatus"><a href="" title="Close">x</a></p>
<p><img src="/res/image/icons/icon_error.png" alt="Error"><span>Error!</span> {$error}</p>
</div>
{/if}
    <div id="loginbox">
        <div id="loginheader">
            <img src="{$SITE_PREFIX}/css/themes/blue/img/cp_logo_login.png" alt="Control Panel Login" />
        </div>
        <div id="innerlogin">
            <form action="{$SITE_PREFIX}login" method = "post">
                <input type="text" placeholder="用户名@ku6.com" class="logininput" name="username" />
                <input type="password" placeholder="密码" class="logininput" name="password" />
                <input type="submit" class="loginbtn" value="登录" /><br />
            </form>
        </div>
    </div>
    <img src="{$SITE_PREFIX}/res/image/login_fade.png" alt="Fade" />
</div>
</body>
</html>
