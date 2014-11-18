{include file='../m/m_header.tpl'}  
{if $error != ""}
<div data-role="content">
<p><img src="/res/image/icons/icon_error.png" alt="Error"><span>Error!</span> {$error}</p>
</div>
{/if}
    <form action="{$SITE_PREFIX}m/login" method = "post">
    <div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
                <label for="textinput1">
                    Name
                </label>
                <input name="username" id="textinput2" placeholder="用户名@ku6.com" value=""
                type="text">
            </fieldset>
        </div>
        <div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
                <label for="textinput2">
                    Password
                </label>
                <input name="password" id="textinput1" placeholder="密码" value=""
                type="password">
            </fieldset>
        </div>
        <input type="submit" value="登录">
</form>
{include file='../m/m_footer.tpl'}
