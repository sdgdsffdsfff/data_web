<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 14:15:55
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_mobi_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:763454659e1b559e33-25615448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c823b51c78bc50adc3a479a4fa2425fc87d48226' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_mobi_data.tpl',
      1 => 1362572335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763454659e1b559e33-25615448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54659e1b5e7ea9_20922923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54659e1b5e7ea9_20922923')) {function content_54659e1b5e7ea9_20922923($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2 class="left">移动客户端数据</h2>
            </div>
            <div class="contentbox">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                </div>
                <div class="contentbox" id="graphs-1"></div>
                <div class="headings alt">
                    <h2 class="left">表格</h2>
                </div>
                <div class="contentbox" id = "table"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/hl_vhl_mobi_data.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>