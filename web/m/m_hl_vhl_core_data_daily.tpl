{include file='../m/m_header.tpl'}
    <!-- Right Side/Main Content Start -->

    <div data-role="content" id="rightside">
        <div data-role="content" class="contentcontainer" id = "graphs">
            <div data-role="content" class="headings altheading">
                <h2 class="left">核心日报</h2>
                <ul class="smltabs">
                    <li><a href="#graphs-1">AA</a></li>
                    <li><a href="#graphs-2">PV</a></li>
                    <li><a href="#graphs-3">直接UV</a></li>
                </ul>
            </div>
            <div data-role="content" class="contentbox" id="graphs-1"></div>
            <div data-role="content" class="contentbox" id="graphs-2"></div>
            <div data-role="content" class="contentbox" id="graphs-3"></div>
        </div>
         <div data-role="content" class="contentcontainer">
            <div data-role="content" class="headings altheading">
                <h2>核心日报</h2>
            </div>
            <div data-role="content" class="contentbox" id = "table">
            </div>
        </div>
    </div>
<script>
function parse_page(msg)
{
    if(msg.meta.status != 200)
    {
        alert("Data Loading Faild");
        return false;
    }
    for(key in msg.response)
    {
        if(key != 'DATA_DESC')
            msg.response[key] = convert(msg.response[key]);
        else
            msg.response[key] = convert_date(msg.response[key]);
    }
    var graphic_keys_1 = Array('AA_INSTALL','AA_DOWNLOAD','AA_SHOW','AA_VIDEO_BFNUM','AA_CLICK','DATA_DESC');
    var graphic_data_1 = Object();
    var graphic_keys_2 = Array('UV', 'VV','PV','IV','CV','DATA_DESC');
    var graphic_data_2 = Object();
    var graphic_keys_3 = Array('DIRECT_UV', 'DATA_DESC');
    var graphic_data_3 = Object();

    $.each(msg.response, function(key, ele){
            if($.inArray(key, graphic_keys_1) > -1) {
                graphic_data_1[key] = ele;
            }
            if($.inArray(key, graphic_keys_2) > -1) {
                graphic_data_2[key] = ele;
            }
            if($.inArray(key, graphic_keys_3) > -1) {
                graphic_data_3[key] = ele;
            }
            });
    draw_graphic_two_yaxis(graphic_data_1, 'graphs-1','line','DATA_DESC','次数','AA点击');
    draw_graphic(graphic_data_2, 'graphs-2','line','PV数据','次数');
    draw_graphic(graphic_data_3, 'graphs-3','line','直接UV数据','次数');
    draw_table(msg.response,'table','DATA_DESC','');
}

$(document).ready(function(){
        load_data("https://ku6data.sdo.com/dev/api/hl/vhl/core_data_daily", parse_page);
});
 </script>
{include file='../m/m_footer.tpl'}
