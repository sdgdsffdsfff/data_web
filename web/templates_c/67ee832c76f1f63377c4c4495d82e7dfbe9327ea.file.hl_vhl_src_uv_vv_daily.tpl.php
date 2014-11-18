<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 12:29:04
         compiled from "F:\www\ku6\data_web\web\templates\hl_vhl_src_uv_vv_daily.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285635466ce56d19398-03742892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67ee832c76f1f63377c4c4495d82e7dfbe9327ea' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\hl_vhl_src_uv_vv_daily.tpl',
      1 => 1416284934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285635466ce56d19398-03742892',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5466ce56d7a7c3_95576883',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466ce56d7a7c3_95576883')) {function content_5466ce56d7a7c3_95576883($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class="left"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-today">今天</a></li>
                    <li><a href="#graphs-yesterday">昨天</a></li>
                    <li><a href="#graphs-7days">最近7天</a></li>
                    <li><a href="#graphs-30days">最近30天</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="contentbox" id="graphs-today">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-today-pv">VV</a></li>
                        <li><a href="#graphs-today-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-today-vv"></div>
                <div class="contentbox" id="graphs-today-uv"></div>
            </div>
                

            <div class="contentbox" id="graphs-yesterday">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-yesterday-pv">VV</a></li>
                        <li><a href="#graphs-yesterday-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-yesterday-vv"></div>
                <div class="contentbox" id="graphs-yesterday-uv"></div>
            </div>
            <div class="contentbox" id="graphs-7days">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-7days-pv">VV</a></li>
                        <li><a href="#graphs-7days-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-7days-vv"></div>
                <div class="contentbox" id="graphs-7days-uv"></div>
            </div>
            <div class="contentbox" id="graphs-30days">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-30days-pv">VV</a></li>
                        <li><a href="#graphs-30days-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-30days-vv"></div>
                <div class="contentbox" id="graphs-30days-uv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright <?php echo date('Y');?>
 Ku6.com
        </div>
    </div>
<script src="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
js/hl_vhl_src_uv_vv_daily.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 
 
<?php }} ?>