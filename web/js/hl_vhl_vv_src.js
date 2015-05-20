function parse_page(req,msg){
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    var response = Helper.groupMsg(msg,'ver',['stat_date','vv','vv_compare']);
    var options = {};
    options.series = Helper.getGroupDataSeriesOptions(response, 'vv');
    Helper.drawCommonChart('graphs-old-vv', '渠道日报('+req.d_offset+'天内)',options);
};
$(document).ready(function(){

    Helper.loadData(API_PREFIX + "hl/vhl/vv_src",{d_offset:30},parse_page);

}); 
