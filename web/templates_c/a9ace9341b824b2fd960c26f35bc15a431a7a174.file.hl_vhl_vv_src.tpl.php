<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 11:13:06
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_vv_src.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2290654656d73c97906-28585761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9ace9341b824b2fd960c26f35bc15a431a7a174' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_vv_src.tpl',
      1 => 1416280364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2290654656d73c97906-28585761',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54656d73e4ede7_44702445',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54656d73e4ede7_44702445')) {function content_54656d73e4ede7_44702445($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class="left"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-old">历史概况</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="contentbox" id="graphs-old">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-old-vv">VV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-old-vv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright <?php echo date('Y');?>
 Ku6.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/hl_vhl_vv_src.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>