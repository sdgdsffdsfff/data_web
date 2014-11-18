<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 17:16:01
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_channel_daily_top50.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54185465bbb0454b47-77144385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81ec0c1c1cd7f7ab3747b3defd86b98e2b08fd8d' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_channel_daily_top50.tpl',
      1 => 1415956558,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54185465bbb0454b47-77144385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5465bbb04b98c1_01410017',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465bbb04b98c1_01410017')) {function content_5465bbb04b98c1_01410017($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
            </div>
            <div class="contentbox">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-channeldailytop50">KU6站内</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-channeldailytop50"></div>
                <div class="headings alt">
                    <h2>表格</h2>
                </div>
                <div class="contentbox" id="tables-channeldailytop50"></div>
            </div> 
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
js/hl_vhl_channel_daily_top50.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
 
<?php }} ?>