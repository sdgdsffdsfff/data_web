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
                    <h2 class="left">图表</h2>
                    <ul class="smltabs">
                        <li><a href="#graphs-realtime-num">数量</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="contentbox" id="graphs-realtime-num"></div>
            </div>
        </div>
        <div id="footer">
            &copy; Copyright {date('Y')} Ku6.com
        </div>
    </div>

<script type = "text/javascript" src = "{$SITE_PREFIX}js/utcc_upload_video_distribution.js"></script>

<script>
    /*
    var d = DateUtil.strToDate('2014-10-5 8');
    console.log(d.getMonth());
    console.log(d.getHours());
    console.log(d.getTime());
    console.log(DateUtil.toArray(d));
    console.log(Date.UTC(2014,9,5,8));
    */
</script>
{include file='footer.tpl'}