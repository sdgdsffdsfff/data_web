
function parse_page(req,msg)
{
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    var names = ['pv','uv'];
    $.each(names, function(i, name){
        var response = Helper.groupMsg(msg,'url',['stat_date','pv','pv_compare','uv','uv_compare']);
        var options = {};
        options.series = Helper.getGroupDataSeriesOptions(response, name);
        Helper.drawCommonChart('graphs-old-'+name, '各频道页'+name+'日报(30天内)',options);
    });
}

$(document).ready(function(){
    $("#load").show();
    Helper.loadData( API_PREFIX + "hl/vhl/sub_site_daily",{d_offset:31},parse_page);
    $("#graphs").tabs();
    $("#load").hide();
});


