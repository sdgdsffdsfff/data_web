{include file='header.tpl'}
<div id="rightside">
        <div class="contentcontainer" id="graphs">
            <div class="headings altheading">
                <h2 class="left">{$title}</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-realtime">检查时间: <span style="color:#ff3333;" id="time">{date('Y-m-d H:i:s')}</span></a></li>
                </ul>
                <div class="clear"></div>
            </div>
            
            <div class="contentbox" id="graphs-realtime">
                <div class="headings alt">
                    <h2 class="left">表格</h2>
                    <ul class="smltabs">
                        <li><a href="#tables-realtime-num">数量</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="tables-realtime-num"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright {date('Y')} Ku6.com
        </div>
    </div>

<script type = "text/javascript" src = "{$SITE_PREFIX}js/utcc_dispatch_timeconsuming_task.js"></script>
{include file='footer.tpl'}