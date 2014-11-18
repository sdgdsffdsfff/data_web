<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 15:49:10
         compiled from "F:\www\ku6\data_web\web\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2804054648c08abc148-81103117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5a85e86ed39bf357cb5b840efd006bec5eeb037' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\header.tpl',
      1 => 1416296934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2804054648c08abc148-81103117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648c08ba8fa3_76569130',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
    'user' => 0,
    'token' => 0,
    'API_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648c08ba8fa3_76569130')) {function content_54648c08ba8fa3_76569130($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!--<meta name="viewport" content="width=device-width"> -->
<meta name="robots" content="noarchive"> 
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta http-equiv="X-UA-Compatible" content="IE=9, IE=10, IE=11, IE=12"/>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/layout.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/wysiwyg.css">
<link type = "text/css" rel = "stylesheet" media = "screen" href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/css/themes/green/styles.css">

<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/jquery.min.js" type="text/javascript"></script> 
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/Highstock-2.0.3/highstock.js" type="text/javascript"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/Highstock-2.0.3/modules/exporting.js" type="text/javascript"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/jquery.wysiwyg.js"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/jquery.flip.min.js"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/visualize.jQuery.js"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/jquery-ui-1.8.5.custom.min.js"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/heartcode-canvasloader-min-0.9.1.js"></script>
<!-- [if IE 6]>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/libs/png_fix.js"></script>
<script type = "text/javascript">
DD_belatedPNG.fix('img, .notifycount, .selected');
</script>
<![endif]-->
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/functions.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/helper.js" type="text/javascript"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/data.func.js"></script>
<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/convert_name.js"></script>

<script language="javascript">
<?php if (isset($_smarty_tpl->tpl_vars['user']->value)&&$_smarty_tpl->tpl_vars['user']->value){?>
var user = '<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
';
var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
<?php }else{ ?>
var user = '';
var token = '';
<?php }?>
var SITE_PREFIX="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
";
var API_PREFIX="<?php echo $_smarty_tpl->tpl_vars['API_PREFIX']->value;?>
";
</script>

</head>
<body id = 'homepage'>
<div id="top_container" style = 'min-width:980px'> 
<div id="header">
    <div style = 'min-width:980px;margin: 0 auto' id="header_wrapper">    
        <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/welcome" title=""><img src="/res/image/cp_logo.png" alt="Control Panel" class="logo" /></a>
    </div>

</div>
<div id = 'wrap' style = 'min-width:980px;margin: 0 auto'>
<?php echo $_smarty_tpl->getSubTemplate ('left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>