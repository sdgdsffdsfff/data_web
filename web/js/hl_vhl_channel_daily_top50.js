function parse_page(req, msg){
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    Helper.drawTable('tables-channeldailytop50', '频道日报top50', msg);
    
    var options = {};
    var data = [];
    $.each(msg.response, function(k,ele){
        data.push({
          name:ele.channel,
          y:ele.vv,
          compare:ele.vv_compare
        });
    });
    var seriesOptions = [{
        type: 'pie',
        name: '昨天VV',
        data : data
    }];
    //console.log(seriesOptions);
    options.series = seriesOptions;
    Helper.drawPieChart('graphs-channeldailytop50', '频道日报top50',options);
         
}
$(function(){
    Helper.loadData(API_PREFIX + 'hl/vhl/channel_daily_top50',{},parse_page);
});
 
