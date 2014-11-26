function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    var code = {
        0:"未开始",
        1:"已启动",
        2:"成功",
        3:"失败"
    };
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:code[ele.transcode_status], y:ele.cnt});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: true}
    });
    Helper.drawColumnChar('graphs-realtime-num', '今日上传视频状态分布(每隔30s自动更新)', options);
};

$(function(){
    
    $("#load").show();
    Helper.loadData(API_PREFIX + 'utcc/transcoding_task_state_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/transcoding_task_state_distribution',{},parse_page);
        $('#time').html(time);
    },30000);
    $("#graphs").tabs();
    $("#load").hide();
});


