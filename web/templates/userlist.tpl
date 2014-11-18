{include file='header.tpl'}
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>{$title}</h2>
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
                {foreach from=$list item=item}
                <tr>
                    <td>{$item['name']}</td>
                    <td>{$item['nickname']}</td>
                    <td>{$item['email']}</td>
                    <td>{$item['groupname']}</td>
                    <td>{$item['lastlogin']} </td>
                    <td>{$item['lastloginip']|long2ip}</td>
                    <td><a href="{$SITE_PREFIX}admin/modifyuser/id/{$item['id']}">展示权限</a></td>
                    <td><a href="{$SITE_PREFIX}admin/deluser?id={$item['id']}">删除</a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新用户</h4>
        <form action="{$SITE_PREFIX}/admin/newuser" method="post">
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
{include file='footer.tpl'}
