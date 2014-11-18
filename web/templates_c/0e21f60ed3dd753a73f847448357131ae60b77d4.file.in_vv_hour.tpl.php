<?php /* Smarty version Smarty-3.1.12, created on 2014-11-13 18:56:20
         compiled from "F:\www\ku6\data_web\web\templates\trend\in_vv_hour.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1577654648e54d7ba20-72615401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e21f60ed3dd753a73f847448357131ae60b77d4' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\trend\\in_vv_hour.tpl',
      1 => 1415875619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1577654648e54d7ba20-72615401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648e54de22f1_63139778',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648e54de22f1_63139778')) {function content_54648e54de22f1_63139778($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div id="rightside">
            <div class="contentcontainer" id = "graphs">
                <div class="headings altheading">
                    <h2>VV</h2>
                </div>
                <div class="contentbox">
                    <div class="headings alt">
                        <h2 class="left">图表</h2>
                        <ul class="smltabs">
                            <li><a href="#in_vv_hour_chart">KU6站内</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="contentbox" id="in_vv_hour_chart"></div>
                    <div class="headings alt">
                        <h2>表格</h2>
                    </div>
                    <div class="contentbox" id="in_vv_hour_table"></div>
                </div>
            </div>
        <div id="footer">
            &copy; Copyright <?php echo date('Y');?>
 ku6.com
        </div>
    </div>

<script type = "text/javascript" src = "<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
js/trend_in_vv_hour.js"></script>

<script>
    var d = DateUtil.strToDate('2014-10-5 8');
    console.log(d.getMonth());
    console.log(d.getHours());
    console.log(d.getTime());
    console.log(DateUtil.toArray(d));
    console.log(Date.UTC(2014,9,5,8));
</script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>