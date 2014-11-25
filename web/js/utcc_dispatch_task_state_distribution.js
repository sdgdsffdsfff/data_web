function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    var code = {
        "-1":"不需要分发",
        0:"未处理",
        1:"待分发",
        2:"已分发网通电信各1份",
        3:"完成",
        4:"失败"
    };
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:code[ele.dispatch_status], y:ele.cnt});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: true}
    });
    Helper.drawColumnChar('graphs-realtime-num', '分发任务状态分布(每隔30s自动更新)', options);
};

$(function(){
    
    $("#load").show();
    Helper.loadData(API_PREFIX + 'utcc/dispatch_task_state_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/dispatch_task_state_distribution',{},parse_page);
        $('#time').html(time);
    },30000);
    $("#graphs").tabs();
    $("#load").hide();
});


