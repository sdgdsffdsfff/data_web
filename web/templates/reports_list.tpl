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
                    <td>报表名</td>
                    <td>报表组</td>
                    <td>删除</td>
                </tr>
                {foreach from=$list item=item}
                {if $item['node']['pid'] == 0}
                <tr>
                    <td><h3>组[ {$item['node']['name']} ]</h3></td>
                    <td></td>
                    <td><a href="{$SITE_PREFIX}admin/delreport?id={$item['node']['id']}">删除</a></td>
                </tr>
                {foreach from=$item['subitems'] item=td}
                <tr>
                    <td>&nbsp;&nbsp;{$td['name']}</h3></td>
                    <td>{$item['node']['name']}</td>
                    <td><a href="{$SITE_PREFIX}admin/delreport?id={$td['id']}">删除</a></td>
                </tr>
                {/foreach}
                {/if}
                {/foreach}
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
        <form action="{$SITE_PREFIX}/admin/newreport" method="post">
        <ul>
            <li>
            <input type="text" placeholder="报表名" name="reportname" class="inputbox" />
            </li>
            <li>
            <label for="textfiled" style="width:50px;">
                <strong>隶属组</strong>
            <select name="parent_group" >
            <option value="0">新组</option>
            {foreach from=$list item=item}
            {if $item['node']['pid'] == 0}
            <option value="{$item['node']['id']}">{$item['node']['name']}</option>
            {/if}
            {/foreach}
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
{include file='footer.tpl'}
