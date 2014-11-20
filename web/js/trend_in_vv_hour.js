function parse_page(req, msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    options.xAxis.plotLines = [];
    names = ['uv', 'vv'];
    $.each(names, function(i, name) {
        var data = [];
        $.each(msg.response, function(k, ele){
            var d = DateUtil.strToDate(ele.stat_date + ' '+ele.stat_hour);
            var timestamp = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours());
            data.push({x:timestamp, y:ele[name], compare:ele[name+'_compare']});
            if(ele.stat_hour == 0){
                options.xAxis.plotLines.push({
                    value : timestamp,
                    color : 'green',
                    width : 1,
                    label : {
                        text : DateUtil.dateToStr("yyyy-MM--dd",DateUtil.longToDate(timestamp))
                    }
                });
            }
                
        });
        options.series[i] = {
            name: name,
            data: data
        };
    }); 
    Helper.drawStockChart('graphs-30days-vvuv', 'VV、UV时报', options);
}

$(function(){
    $("#load").show();
    Helper.loadData(API_PREFIX + 'trend/in_vv_hour',{d_offset:30,stat_date:"ASC",stat_hour:"ASC"},parse_page);
    $("#graphs").tabs();
    $("#load").hide();
});


