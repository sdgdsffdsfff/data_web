{include file='header.tpl'}
    <!-- Right Side/Main Content Start -->
<div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>{$title}</h2>
    </div>
    <div class="contentbox" id="table">
        <div>
            <iframe style="border:0px;" src="{$SITE_PREFIX}machine/monitor_list" height="900px" width="100%"></iframe>
        </div>

    </div>
</div>
        <div id="footer">
            &copy; Copyright {date('Y')} Ku6.com
        </div>
</div>
{include file='footer.tpl'}
