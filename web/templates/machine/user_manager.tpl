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
                    <td>用户ID</td>
                    <td>用户名</td>
                    <td>邮箱</td>
                    <td>电话</td>
                    <td>删除</td>
                </tr>
                {foreach from=$list item=item}
                <tr>
                    <td>{$item['id']}</td>
                    <td>{$item['name']}</td>
                    <td>{$item['email']}</td>
                    <td>{$item['phone']}</td>
                    <td><a href="{$SITE_PREFIX}machine/userdelete?id={$item['id']}">删除</a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新用户</h4>
        <form action="{$SITE_PREFIX}/machine/useradd" method="post">
        <ul>
            <li>
            <input type="text" placeholder="用户名" name="name" class="inputbox" />
            </li>
    <li>
            <input type="text" placeholder="邮箱" name="email" class="inputbox" />
            </li>
     <li>
            <input type="text" placeholder="电话" name="phone" class="inputbox" />
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
