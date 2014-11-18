{include file='header.tpl'}
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>{$title}</h2>
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
                {foreach from=$list item=item}
                <tr>
                    <td>{$item['groupname']}</td>
                    <td>{$item['level']}</td>
                    <td><a href="{$SITE_PREFIX}/admin/delusergroup?gid={$item['gid']}">删除</a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新用户组</h4>
        <form action="{$SITE_PREFIX}/admin/usergroupmanager" method="post">
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
{include file='footer.tpl'}
