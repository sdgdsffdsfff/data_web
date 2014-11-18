<?php /* Smarty version Smarty-3.1.12, created on 2014-11-13 18:56:50
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_in_daily.tpl" */ ?>
<?php /*%%SmartyHeaderCode:745454648e72383635-39486864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47166e58298f320c1b1d1f42860f4badb544d37c' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_in_daily.tpl',
      1 => 1415848518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '745454648e72383635-39486864',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648e723e24b1_43647610',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648e723e24b1_43647610')) {function content_54648e723e24b1_43647610($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2>站内日报</h2>
            </div>
            <div class="contentbox">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#in_daily_chart">KU6站内</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" style="height:300px;" id="in_daily_chart"></div>
                <div class="headings alt">
                    <h2>表格</h2>
                </div>
                <div class="contentbox" id="in_daily_table"></div>
            </div> 
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
js/hl_vhl_in_daily.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
 
<?php }} ?>