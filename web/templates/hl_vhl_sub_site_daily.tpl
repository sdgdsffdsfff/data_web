{include file='header.tpl'}
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class="left">{$title}</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-old">历史概况</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="contentbox" id="graphs-old">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-old-pv">PV</a></li>
                        <li><a href="#graphs-old-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-old-pv"></div>
                <div class="contentbox" id="graphs-old-uv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright {date('Y')} Ku6.com
        </div>
    </div>
<script src="{$SITE_PREFIX}/js/hl_vhl_sub_site_daily.js" type="text/javascript"></script>
{include file='footer.tpl'}


