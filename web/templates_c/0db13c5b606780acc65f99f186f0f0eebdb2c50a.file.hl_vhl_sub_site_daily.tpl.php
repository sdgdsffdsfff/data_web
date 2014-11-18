<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 11:07:51
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_sub_site_daily.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4934546597b7b6ac75-81824337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0db13c5b606780acc65f99f186f0f0eebdb2c50a' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_sub_site_daily.tpl',
      1 => 1416218583,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4934546597b7b6ac75-81824337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_546597b7cc2698_30899580',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546597b7cc2698_30899580')) {function content_546597b7cc2698_30899580($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!-- Right Side/Main Content Start -->
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
                        <li><a href="#graphs-old-pv">PV</a></li>
                        <li><a href="#graphs-old-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-old-pv"></div>
                <div class="contentbox" id="graphs-old-uv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright <?php echo date('Y');?>
 Ku6.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/js/hl_vhl_sub_site_daily.js" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>