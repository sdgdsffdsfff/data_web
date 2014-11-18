<?php /* Smarty version Smarty-3.1.12, created on 2014-11-15 18:24:31
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_channel_daily.tpl" */ ?>
<?php /*%%SmartyHeaderCode:801546597201a3191-60997438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acbc375927f373a65641f5006cc1aba79c8d1026' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_channel_daily.tpl',
      1 => 1416046624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '801546597201a3191-60997438',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54659720580ba0_21762331',
  'variables' => 
  array (
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54659720580ba0_21762331')) {function content_54659720580ba0_21762331($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class='left'>频道日报</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-old">历史数据</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="contentbox" id="graphs-old">
                <div class="headings alt">
                    <h2 class='left'>图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-old-vv">VV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-old-vv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/hl_vhl_channel_daily.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
<?php }} ?>