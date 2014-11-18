{include file='header.tpl'}
    <div id="rightside">
        <div class="contentcontainer" id = "graphs">
            <div class="headings altheading">
                <h2>站内日报</h2>
            </div>
            <div class="contentbox">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#in_daily_chart">KU6站内</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" style="height:300px;" id="in_daily_chart"></div>
                <div class="headings alt">
                    <h2>表格</h2>
                </div>
                <div class="contentbox" id="in_daily_table"></div>
            </div> 
        </div>
        <div id="footer">
            &copy; Copyright 2012 Snda.com
        </div>
    </div>
<script src="{$SITE_PREFIX}js/hl_vhl_in_daily.js"></script>
{include file='footer.tpl'}
 
 
