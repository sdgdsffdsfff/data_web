<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 13:26:54
         compiled from "F:\www\ku6\data_web\web\templates\trend\src_in_vv_hour.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1361154648c089f04d8-80857041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2231fc118a34389d14a86c48078114861d261936' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\trend\\src_in_vv_hour.tpl',
      1 => 1415942810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1361154648c089f04d8-80857041',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648c08a4f0a7_26163921',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648c08a4f0a7_26163921')) {function content_54648c08a4f0a7_26163921($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
            </div>
            <div class="contentbox">
                
                <div class="headings alt">
                    <h2>表格</h2>
                </div>
                <div class="contentbox" id="src_in_vv_hour_table"></div>
            </div>
        </div>
    <div id="footer">
        &copy; Copyright <?php echo date('Y');?>
 ku6.com
    </div>
</div>

<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
js/trend_src_in_vv_hour.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php }} ?>