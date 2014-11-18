<?php /* Smarty version Smarty-3.1.12, created on 2014-11-13 18:56:16
         compiled from "F:\www\ku6\data_web\web\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3016254648e508258f9-45541849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77a94186e37cdfe6b99830129a1e16b236b8764c' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\login.tpl',
      1 => 1414665429,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3016254648e508258f9-45541849',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648e509aec12_12260945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648e509aec12_12260945')) {function content_54648e509aec12_12260945($_smarty_tpl) {?><html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="maximum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=0">
<meta name="robots" content="noarchive">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta http-equiv="X-UA-Compatible" content="IE=9, IE=10, IE=11, IE=12"/>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/login.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/layout.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/wysiwyg.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/themes/green/styles.css">
</head>
<body >
<div id="logincontainer">      

<div class="status warning" id="bbrowser" >
<p><img src="/res/image/icons/icon_warning.png" alt="Warning"><span>注意</span> 为了更好的展示和压缩成本，本系统不支持IE7以下的浏览器.</p>
</div>

<?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
<div class="status error">
<p class="closestatus"><a href="" title="Close">x</a></p>
<p><img src="/res/image/icons/icon_error.png" alt="Error"><span>Error!</span> <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p>
</div>
<?php }?>
  <div id="loginbox">
            <div id="loginheader">
                <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/themes/blue/img/cp_logo_login.png" alt="Control Panel Login" />
            </div>
            <div id="innerlogin">
                <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
login" method = "post">
                    <input type="text" placeholder="用户名@ku6.com" class="logininput" name="username" />
                    <input type="password" placeholder="密码" class="logininput" name="password" />
                    <input type="submit" class="loginbtn" value="登录" /><br />
                </form>
            </div>
        </div>
        <img src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/res/image/login_fade.png" alt="Fade" />
    </div>
</body>
</html>
<?php }} ?>