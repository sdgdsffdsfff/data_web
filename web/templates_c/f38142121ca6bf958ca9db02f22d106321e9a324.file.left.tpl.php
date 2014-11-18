<?php /* Smarty version Smarty-3.1.12, created on 2014-11-18 15:56:24
         compiled from "F:\www\ku6\data_web\web\templates\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1718554648c092d0f26-77257465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f38142121ca6bf958ca9db02f22d106321e9a324' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\left.tpl',
      1 => 1416297275,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1718554648c092d0f26-77257465',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648c09404b82_33303544',
  'variables' => 
  array (
    'title' => 0,
    'SITE_PREFIX' => 0,
    'leftarray' => 0,
    'i' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648c09404b82_33303544')) {function content_54648c09404b82_33303544($_smarty_tpl) {?>    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
        <ul>    
            <li><img src="/res/image/icons/icon_breadcrumb.png" alt="Location" /></li>
            <li><strong>Location:</strong></li>
            <li><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</li>
            <li class="current"></li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->
    
    <!-- Left Dark Bar Start -->
    <div id="leftside">
        <div class="user">
            <img src="/res/image/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
            <p>Logged in as:</p>
            <p class="username"><?php echo $_SESSION['username'];?>
</p>
            <p class="userbtn"><a href="<?php echo $_smarty_tpl->tpl_vars['SITE_PREFIX']->value;?>
logout" title="">注销</a></p>
        </div>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['leftarray']->value)-1)+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['leftarray']->value)-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
            
            <?php if ($_smarty_tpl->tpl_vars['leftarray']->value[$_smarty_tpl->tpl_vars['i']->value]['title']=='监控'){?>
                
                <div class="notifications">
                    <p class="notifycount"><a href="" title="" class="notifypop">10</a></p>
                    <p><a href="" title="" class="notifypop">New Notifications</a></p>
                    <p class="smltxt">(Click to open notifications)</p>
                </div>
            <?php }?>
        <?php }} ?>
                <ul id="nav">
            <?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['title']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leftarray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
$_smarty_tpl->tpl_vars['title']->_loop = true;
?>
            <li>
                <?php if (in_array($_SERVER['REQUEST_URI'],$_smarty_tpl->tpl_vars['title']->value['urls'])){?>
                <a class="expanded heading"><?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>
</a>
                <?php }else{ ?>
                <a class="collapsed heading"><?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>
</a>
                <?php }?>
                 <ul class="navigation">
                    <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['title']->value['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
                    <?php if ($_SERVER['REQUEST_URI']==$_smarty_tpl->tpl_vars['menu']->value['url']){?>
                    <li  class="heading selected"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</li>
                    <?php }else{ ?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
</a></li>
                    <?php }?>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
    <!-- Left Dark Bar End --> 
<?php }} ?>