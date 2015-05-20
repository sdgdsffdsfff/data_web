function parse_page(req, msg){
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    Helper.drawTable('in_daily_table', 'ku6站内日报', msg);

    var options = {};
    var seriesOptions = [];
    var names= ['pv','uv','vv','mobile_uv','mobile_vv','adshow'];
    var response = msg.response.reverse();
    $.each(names, function(i, name) {
        var data = [];
        $.each(response, function(k, ele){
            var d = DateUtil.strToDate(ele.stat_date);
            var timestamp = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
            data.push({x:timestamp, y:ele[name], compare:ele[name+'_compare']});
        });
        seriesOptions[i] = {
            name: name,
            data: data,
            visible: i === 0 ? true:false,
            selected: i === 0 ? true:false
        };
    }); 
    //console.log(seriesOptions);
    options.series = seriesOptions;
    Helper.drawCommonChart('in_daily_chart', 'ku6站内日报',options);
         
}

$(function(){

    Helper.loadData(API_PREFIX + 'hl/vhl/in_daily',{},parse_page);

});
 
