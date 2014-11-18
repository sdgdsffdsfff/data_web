<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 15:58:06
         compiled from "F:\www\ku6\data_web\web\templates\usergrouplist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11188546afc0e345790-76798582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c008443b48337a23f0b52215e003f7417630a15' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\usergrouplist.tpl',
      1 => 1361160582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11188546afc0e345790-76798582',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'item' => 0,
    'SITE_PREFIX' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_546afc0e3ee0c4_35033009',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546afc0e3ee0c4_35033009')) {function content_546afc0e3ee0c4_35033009($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                    <td>组名</td>
                    <td>组级别</td>
                    <td>删除</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupname'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['level'];?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/admin/delusergroup?gid=<?php echo $_smarty_tpl->tpl_vars['item']->value['gid'];?>
">删除</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新用户组</h4>
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/admin/usergroupmanager" method="post">
        <ul>
            <li>
            <input type="text" placeholder="组名" name="groupname" class="inputbox" />
            </li>
            <li>
            <label for="textfiled" style="width:50px;">
                <strong>组级别</strong>
            <select name="grouplevel" >
            <option value="1">监控人员级别</option>
            <option value="2">系统管理员</option>
            <option value="3">高层</option>
            </select></label>
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