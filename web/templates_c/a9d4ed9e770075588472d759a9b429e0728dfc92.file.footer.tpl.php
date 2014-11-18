<?php /* Smarty version Smarty-3.1.12, created on 2014-11-13 18:46:33
         compiled from "F:\www\ku6\data_web\web\templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2131854648c09483934-03112066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9d4ed9e770075588472d759a9b429e0728dfc92' => 
    array (
      0 => 'F:\\www\\ku6\\data_web\\web\\templates\\footer.tpl',
      1 => 1361160582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2131854648c09483934-03112066',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_54648c09488aa2_42883872',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54648c09488aa2_42883872')) {function content_54648c09488aa2_42883872($_smarty_tpl) {?>
</div></div>

<div id = 'load' style = "position:absolute;top:50%;left:50%; "></div>
<script type="text/javascript">
        //loading 动画的样式设置
        var cl = new CanvasLoader('load');
        cl.setColor('#000000'); // default is '#000000'
        cl.setShape('spiral'); // default is 'oval'
        cl.setDiameter(200); // default is 40
        cl.setDensity(31); // default is 40
        cl.setRange(0.8); // default is 1.3
        cl.setFPS(18); // default is 24
        cl.show(); // Hidden by default
        
        // This bit is only for positioning - not necessary
          var loaderObj = document.getElementById("canvasLoader");
        loaderObj.style.position = "absolute";
        loaderObj.style["top"] = cl.getDiameter() * -0.5 + "px";
        loaderObj.style["left"] = cl.getDiameter() * -0.5 + "px";
        $("#load").hide();
    </script>
</body>
</html>
<?php }} ?>