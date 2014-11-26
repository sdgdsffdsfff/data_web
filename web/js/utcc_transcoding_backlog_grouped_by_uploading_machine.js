function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:ele.upload_server, y:ele.num});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: true}
    });
    Helper.drawColumnChar('graphs-realtime-num', '今日转码积压按上传机分组(每隔30s自动更新)', options);
};

$(function(){
    
    $("#load").show();
    Helper.loadData(API_PREFIX + 'utcc/transcoding_backlog_grouped_by_uploading_machine',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/transcoding_backlog_grouped_by_uploading_machine',{},parse_page);
        $('#time').html(time);
    },30000);
    $("#graphs").tabs();
    $("#load").hide();
});


