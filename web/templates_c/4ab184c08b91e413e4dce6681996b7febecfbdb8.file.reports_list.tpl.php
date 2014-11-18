<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 16:07:33
         compiled from "F:\www\ku6\data_web\web\templates\reports_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168955465b845981312-74037183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ab184c08b91e413e4dce6681996b7febecfbdb8' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\reports_list.tpl',
      1 => 1361160582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168955465b845981312-74037183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'item' => 0,
    'SITE_PREFIX' => 0,
    'td' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5465b845c76c10_35535491',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465b845c76c10_35535491')) {function content_5465b845c76c10_35535491($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!-- Right Side/Main Content Start -->
<div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
    </div>
    <div class="contentbox" id="table">
        <div>
            <input type="button" class="btn" id="btn_add_user_group" value="添加新组" />
        </div>
        <table width="100%">
            <tbody>
                <tr>
                    <td>报表名</td>
                    <td>报表组</td>
                    <td>删除</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['node']['pid']==0){?>
                <tr>
                    <td><h3>组[ <?php echo $_smarty_tpl->tpl_vars['item']->value['node']['name'];?>
 ]</h3></td>
                    <td></td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/delreport?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['node']['id'];?>
">删除</a></td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['td'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['td']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['subitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['td']->key => $_smarty_tpl->tpl_vars['td']->value){
$_smarty_tpl->tpl_vars['td']->_loop = true;
?>
                <tr>
                    <td>&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['td']->value['name'];?>
</h3></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['node']['name'];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/delreport?id=<?php echo $_smarty_tpl->tpl_vars['td']->value['id'];?>
">删除</a></td>
                </tr>
                <?php } ?>
                <?php }?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新报表</h4>
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/admin/newreport" method="post">
        <ul>
            <li>
            <input type="text" placeholder="报表名" name="reportname" class="inputbox" />
            </li>
            <li>
            <label for="textfiled" style="width:50px;">
                <strong>隶属组</strong>
            <select name="parent_group" >
            <option value="0">新组</option>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['node']['pid']==0){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['node']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['node']['name'];?>
</option>
            <?php }?>
            <?php } ?>
            </select></label>
            </li>
            <li>
            <input type="text" placeholder="报表URL" name="code" class="inputbox" />
            </li>
            <li>
                <input type="submit" class="btn" value="创建" />
            </li>
        </ul>
        </form>
    </div>
<script>
$(document).ready(function(){
    $('#btn_add_user_group').click(function(){
        $('#new_user_group').bPopup();
    });
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>