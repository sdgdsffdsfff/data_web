<?php /* Smarty version Smarty-3.1.12, created on 2014-11-14 16:10:48
         compiled from "F:\www\ku6\data_web\web\templates\userlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:316925465b908ea2b81-87764367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ee69e274de16767ec447451998c03dd04b78960' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\userlist.tpl',
      1 => 1414741487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316925465b908ea2b81-87764367',
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
  'unifunc' => 'content_5465b909260d04_81591013',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5465b909260d04_81591013')) {function content_5465b909260d04_81591013($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!-- Right Side/Main Content Start -->
    <div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
    </div>
    <div class="contentbox" id="table">
        <div>
            <input type="button" class="btn" id="btn_add_user_group" value="添加新用户" />
        </div>
        <table width="100%">
            <tbody>
                <tr>
                    <td>用户名</td>
                    <td>昵称</td>
                    <td>邮箱</td>
                    <td>所属组</td>
                    <td>最近登陆</td>
                    <td>最后登陆IP</td>
                    <td>权限</td>
                    <td>删除</td>
                </tr>
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['groupname'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['lastlogin'];?>
 </td>
                    <td><?php echo long2ip($_smarty_tpl->tpl_vars['item']->value['lastloginip']);?>
</td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/modifyuser/id/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">展示权限</a></td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
admin/deluser?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">删除</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新用户</h4>
        <form action="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
/admin/newuser" method="post">
        <ul>
            <li>
            <input type="text" placeholder="用户名" name="username" class="inputbox" />
            </li>
    <li>
            <input type="text" placeholder="昵称" name="nickname" class="inputbox" />
            </li>
     <li>
            <input type="text" placeholder="邮箱" name="email" class="inputbox" />
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
        $("#load").hide();
    $('#btn_add_user_group').click(function(){
        $('#new_user_group').bPopup();
    });
});
</script>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>