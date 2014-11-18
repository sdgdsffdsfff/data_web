<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 16:10:53
         compiled from "F:\www\ku6\data_web\web\templates\userdetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36055465b90dc3c303-65127819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee47a80d69517dfe2a0528dbcadf4e4808cd8e70' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\userdetail.tpl',
      1 => 1414751542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36055465b90dc3c303-65127819',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'report' => 0,
    'SITE_PREFIX' => 0,
    'subreport' => 0,
    'group' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5465b90e0d6d41_54994571',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465b90e0d6d41_54994571')) {function content_5465b90e0d6d41_54994571($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="rightside">
<div class="contentcontainer ui-tabs ui-widget ui-widget-content ui-corner-all" id="reports">


<div class="headings">
<h2 class="left">权限列表</h2>
<ul class="smltabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
<?php  $_smarty_tpl->tpl_vars['report'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['report']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['report']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['report']->key => $_smarty_tpl->tpl_vars['report']->value){
$_smarty_tpl->tpl_vars['report']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['report']['index']++;
?>
    <?php if ($_smarty_tpl->tpl_vars['report']->value['node']['pid']==0){?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['report']['index']==0){?>
        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active ui-state-hover"><a href="#reports-<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['report']->value['node']['name'];?>
</a></li>
        <?php }else{ ?>
        <li class="ui-state-default ui-corner-top"><a href="#reports-<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['report']->value['node']['name'];?>
</a></li>
        <?php }?>
    <?php }?>
<?php } ?>
</ul>
<div class="clear"></div>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/updateuser" method="post">
<?php  $_smarty_tpl->tpl_vars['report'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['report']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['reports']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dreport']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['report']->key => $_smarty_tpl->tpl_vars['report']->value){
$_smarty_tpl->tpl_vars['report']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dreport']['index']++;
?>
    <?php if ($_smarty_tpl->tpl_vars['report']->value['node']['pid']==0){?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['dreport']['index']==0){?>
        <div class="contentbox ui-tabs-panel ui-widget-content ui-corner-bottom" id="reports-<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
">
        <?php  $_smarty_tpl->tpl_vars['subreport'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subreport']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['report']->value['subitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subreport']->key => $_smarty_tpl->tpl_vars['subreport']->value){
$_smarty_tpl->tpl_vars['subreport']->_loop = true;
?>
        <?php if (in_array($_smarty_tpl->tpl_vars['subreport']->value['id'],$_smarty_tpl->tpl_vars['list']->value['privates'])){?>
        <p><input type="checkbox" class="alluser" name="privates[]" value="<?php echo $_smarty_tpl->tpl_vars['subreport']->value['id'];?>
" checked=true ><?php echo $_smarty_tpl->tpl_vars['subreport']->value['name'];?>
</p>
        <?php }else{ ?>
        <p><input type="checkbox" class="alluser"  name="privates[]" value="<?php echo $_smarty_tpl->tpl_vars['subreport']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['subreport']->value['name'];?>
</p>
        <?php }?>
        <?php } ?>
        <input class="checkpage" type="checkbox" name="checkthispage" value="<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
">全选本页 
        </div>
        <?php }else{ ?>
        <div class="contentbox ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="reports-<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
">
        <?php  $_smarty_tpl->tpl_vars['subreport'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subreport']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['report']->value['subitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subreport']->key => $_smarty_tpl->tpl_vars['subreport']->value){
$_smarty_tpl->tpl_vars['subreport']->_loop = true;
?>
        <?php if (in_array($_smarty_tpl->tpl_vars['subreport']->value['id'],$_smarty_tpl->tpl_vars['list']->value['privates'])){?>
        <p><input type="checkbox" name="privates[]" class="alluser"  value="<?php echo $_smarty_tpl->tpl_vars['subreport']->value['id'];?>
" checked=true ><?php echo $_smarty_tpl->tpl_vars['subreport']->value['name'];?>
</p>
        <?php }else{ ?>
        <p><input type="checkbox" class="alluser"  name="privates[]" value="<?php echo $_smarty_tpl->tpl_vars['subreport']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['subreport']->value['name'];?>
</p>
        <?php }?>
        <?php } ?>
        <input class="checkpage" type="checkbox" name="checkthispage" value="<?php echo $_smarty_tpl->tpl_vars['report']->value['node']['id'];?>
">全选本页 
        </div>
        
        <?php }?>
    <?php }?>
<?php } ?>
<p>&nbsp;<input id="checkall" type="checkbox" name="checkall" value="all">全选</p>
<p></p>
<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
">

接收报警级别:<select name="grouplevel">
<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['list']->value['uinfo']['gid']==$_smarty_tpl->tpl_vars['group']->value['gid']){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['gid'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['group']->value['groupname'];?>
</option>
<?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value['groupname'];?>
</option>
<?php }?>
<?php } ?>
            </select>
<input type="submit" value="更新" class="btn">
</form>

</div><!-- eof container -->

</div><!-- eof rightside -->

<script language="javascript">
$(document).ready(function(){
        $('#reports').tabs();
        $('#checkall').bind('click', function(){
            $('.alluser').each(function(){
                $(this).prop('checked', $('#checkall').prop('checked'));
                });
            });
        $('.checkpage').each(function(){
            $(this).bind('click', function(){
            var rid = $(this).val();
            var checked = $(this).prop('checked');
            $('#reports-' + rid + ' .alluser').each(function(){
                $(this).prop('checked', checked);
            });
            });
        });
        
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>