function parse_page(req, msg){
    var options = {};
    options.series = [];
    names = ['uv', 'vv'];
    $.each(names, function(i, name) {
        var data = [];
        $.each(msg.response, function(k, ele){
            var d = DateUtil.strToDate(ele.stat_date + ' '+ele.stat_hour);
            var timestamp = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours());
            data.push([timestamp, ele[name]]);
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


