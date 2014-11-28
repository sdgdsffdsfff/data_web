function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    options.xAxis.labels = {
                    rotation: -90,
                    align: 'right',
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Arial,Helvetica,sans-serif;'
                    }
                };
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:ele.transcode_server, y:ele.cnt});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: false}
    });
    Helper.drawColumnChar('graphs-realtime-num', '转码失败任务状态分布(每隔30s自动更新)', options);
    Helper.drawTable('tables-realtime-num', '转码失败任务状态分布(每隔30s自动更新)', msg);
};

$(function(){
    
    $("#load").show();
    Helper.loadData(API_PREFIX + 'utcc/transcoding_fails_task_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/transcoding_fails_task_distribution',{},parse_page);
        $('#time').html(time);
    },30000);
    $("#graphs").tabs();
    $("#load").hide();
});


