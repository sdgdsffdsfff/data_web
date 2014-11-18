    <!-- Top Breadcrumb Start -->
    <div id="breadcrumb">
        <ul>    
            <li><img src="/res/image/icons/icon_breadcrumb.png" alt="Location" /></li>
            <li><strong>Location:</strong></li>
            <li>{$title}</li>
            <li class="current"></li>
        </ul>
    </div>
    <!-- Top Breadcrumb End -->
    
    <!-- Left Dark Bar Start -->
    <div id="leftside">
        <div class="user">
            <img src="/res/image/avatar.png" width="44" height="44" class="hoverimg" alt="Avatar" />
            <p>Logged in as:</p>
            <p class="username">{$smarty.session.username}</p>
            <p class="userbtn"><a href="{$SITE_PREFIX}logout" title="">注销</a></p>
        </div>
        {for $i=0 to (count($leftarray)-1)}
            {*var_dump($leftarray[$i])*}
            {if $leftarray[$i]['title'] eq '监控'}
                {*array_splice($leftarray, $i-1, 1)*}
                <div class="notifications">
                    <p class="notifycount"><a href="" title="" class="notifypop">10</a></p>
                    <p><a href="" title="" class="notifypop">New Notifications</a></p>
                    <p class="smltxt">(Click to open notifications)</p>
                </div>
            {/if}
        {/for}
                <ul id="nav">
            {foreach from=$leftarray item=title}
            <li>
                {if in_array($smarty.server.REQUEST_URI, $title['urls'])}
                <a class="expanded heading">{$title['title']}</a>
                {else}
                <a class="collapsed heading">{$title['title']}</a>
                {/if}
                 <ul class="navigation">
                    {foreach from=$title['value'] item=menu}
                    {if $smarty.server.REQUEST_URI == $menu['url']}
                    <li  class="heading selected">{$menu['name']}</li>
                    {else}
                    <li><a href="{$menu['url']}" title="{$menu['name']}">{$menu['name']}</a></li>
                    {/if}
                    {/foreach}
                </ul>
            </li>
            {/foreach}
        </ul>
    </div>
    <!-- Left Dark Bar End --> 
