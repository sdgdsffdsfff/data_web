{include file='header.tpl'}
<div id="rightside">
<div class="contentcontainer ui-tabs ui-widget ui-widget-content ui-corner-all" id="reports">


<div class="headings">
<h2 class="left">权限列表</h2>
<ul class="smltabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
{foreach from=$list['reports'] item=report name=report}
    {if $report['node']['pid'] == 0}
        {if $smarty.foreach.report.index == 0}
        <li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active ui-state-hover"><a href="#reports-{$report['node']['id']}">{$report['node']['name']}</a></li>
        {else}
        <li class="ui-state-default ui-corner-top"><a href="#reports-{$report['node']['id']}">{$report['node']['name']}</a></li>
        {/if}
    {/if}
{/foreach}
</ul>
<div class="clear"></div>
</div>

<form action="{$SITE_PREFIX}admin/updateuser" method="post">
{foreach from=$list['reports'] item=report name=dreport}
    {if $report['node']['pid'] == 0}
        {if $smarty.foreach.dreport.index == 0}
        <div class="contentbox ui-tabs-panel ui-widget-content ui-corner-bottom" id="reports-{$report['node']['id']}">
        {foreach from=$report['subitems'] item=subreport}
        {if in_array($subreport['id'], $list['privates'])}
        <p><input type="checkbox" class="alluser" name="privates[]" value="{$subreport['id']}" checked=true >{$subreport['name']}</p>
        {else}
        <p><input type="checkbox" class="alluser"  name="privates[]" value="{$subreport['id']}">{$subreport['name']}</p>
        {/if}
        {/foreach}
        <input class="checkpage" type="checkbox" name="checkthispage" value="{$report['node']['id']}">全选本页 
        </div>
        {else}
        <div class="contentbox ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="reports-{$report['node']['id']}">
        {foreach from=$report['subitems'] item=subreport}
        {if in_array($subreport['id'], $list['privates'])}
        <p><input type="checkbox" name="privates[]" class="alluser"  value="{$subreport['id']}" checked=true >{$subreport['name']}</p>
        {else}
        <p><input type="checkbox" class="alluser"  name="privates[]" value="{$subreport['id']}">{$subreport['name']}</p>
        {/if}
        {/foreach}
        <input class="checkpage" type="checkbox" name="checkthispage" value="{$report['node']['id']}">全选本页 
        </div>
        
        {/if}
    {/if}
{/foreach}
<p>&nbsp;<input id="checkall" type="checkbox" name="checkall" value="all">全选</p>
<p></p>
<input type="hidden" name="uid" value="{$list['uid']}">

接收报警级别:<select name="grouplevel">
{foreach from=$list['groups'] item=group}
{if $list['uinfo']['gid'] == $group['gid']}
            <option value="{$group['gid']}" selected>{$group['groupname']}</option>
{else}
            <option value="{$group['gid']}">{$group['groupname']}</option>
{/if}
{/foreach}
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
{include file='footer.tpl'}
