{include file='header.tpl'}
    <div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class="left">{$title}</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-today">今天</a></li>
                    <li><a href="#graphs-yesterday">昨天</a></li>
                    <li><a href="#graphs-7days">最近7天</a></li>
                    <li><a href="#graphs-30days">最近30天</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="contentbox" id="graphs-today">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-today-vv">VV</a></li>
                        <li><a href="#graphs-today-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-today-vv"></div>
                <div class="contentbox" id="graphs-today-uv"></div>
            </div>
                

            <div class="contentbox" id="graphs-yesterday">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-yesterday-vv">VV</a></li>
                        <li><a href="#graphs-yesterday-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-yesterday-vv"></div>
                <div class="contentbox" id="graphs-yesterday-uv"></div>
            </div>
            <div class="contentbox" id="graphs-7days">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-7days-vv">VV</a></li>
                        <li><a href="#graphs-7days-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-7days-vv"></div>
                <div class="contentbox" id="graphs-7days-uv"></div>
            </div>
            <div class="contentbox" id="graphs-30days">
                <div class="headings alt">
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-30days-vv">VV</a></li>
                        <li><a href="#graphs-30days-uv">UV</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-30days-vv"></div>
                <div class="contentbox" id="graphs-30days-uv"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright {date('Y')} Ku6.com
        </div>
    </div>
<script src="{$SITE_PREFIX}js/hl_vhl_refer_uv_vv_daily.js"></script>
{include file='footer.tpl'}
 
 
