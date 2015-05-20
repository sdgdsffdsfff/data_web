function parse_page(req, msg){
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    var response = Helper.groupMsg(msg,'channel',['stat_date','vv','vv_compare']);
    var options = {};
    options.series = Helper.getGroupDataSeriesOptions(response, 'vv');
    Helper.drawCommonChart('graphs-old-vv', '频道日报',options);
}
 
$(document).ready(function(){
    Helper.loadData(API_PREFIX + "hl/vhl/channel_daily",{d_offset:31},parse_page);

});
 
