<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 13:27:35
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_pv_uv_top30.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11656546592c7c609d0-38542685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1858ae62f2256b417c13bc0e48b862748d67af06' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_pv_uv_top30.tpl',
      1 => 1362572335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11656546592c7c609d0-38542685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_546592c7da54f1_86276884',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546592c7da54f1_86276884')) {function content_546592c7da54f1_86276884($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
         <div class="contentcontainer" id='tables'>
            <div class="headings altheading">
                <h2 class="left">PV,UVTop30</h2>
                <ul class="smltabs">
                    <li><a href="#tables-pv">PV</a></li>
                    <li><a href="#tables-uv">UV</a></li>
                    <li><a href="#tables-pvuv">PV/UV</a></li>
                </ul>
            </div>
            <div class="contentbox" id = "tables-pv"></div>
            <div class="contentbox" id = "tables-uv"></div>
            <div class="contentbox" id = "tables-pvuv"></div>
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
        <div id='lists' style="width:800px;height:500px"></div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/hl_vhl_pv_uv_top30.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
<?php }} ?>