{include file='header.tpl'}
    <div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2>{$title}</h2>
            </div>
            <div class="contentbox">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-channeldailytop50">KU6站内</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-channeldailytop50"></div>
                <div class="headings alt">
                    <h2>表格</h2>
                </div>
                <div class="contentbox" id="tables-channeldailytop50"></div>
            </div> 
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="{$SITE_PREFIX}js/hl_vhl_channel_daily_top50.js"></script>
{include file='footer.tpl'}
 
 
