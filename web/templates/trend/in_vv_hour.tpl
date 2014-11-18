{include file='header.tpl'}
    <div id="rightside">
            <div class="contentcontainer" id = "graphs">
                <div class="headings altheading">
                    <h2>VV</h2>
                </div>
                <div class="contentbox">
                    <div class="headings alt">
                        <h2 class="left">图表</h2>
                        <ul class="smltabs">
                            <li><a href="#in_vv_hour_chart">KU6站内</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="contentbox" id="in_vv_hour_chart"></div>
                    <div class="headings alt">
                        <h2>表格</h2>
                    </div>
                    <div class="contentbox" id="in_vv_hour_table"></div>
                </div>
            </div>
        <div id="footer">
            &copy; Copyright {date('Y')} ku6.com
        </div>
    </div>

<script type = "text/javascript" src = "{$SITE_PREFIX}js/trend_in_vv_hour.js"></script>

<script>
    var d = DateUtil.strToDate('2014-10-5 8');
    console.log(d.getMonth());
    console.log(d.getHours());
    console.log(d.getTime());
    console.log(DateUtil.toArray(d));
    console.log(Date.UTC(2014,9,5,8));
</script>
{include file='footer.tpl'}