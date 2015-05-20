function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:ele.cfrom, y:ele.cnt});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: true}
    });
    Helper.drawColumnChar('graphs-realtime-num', '今日视频上传来源分布(每隔30s自动更新)', options);
};

$(function(){

    Helper.loadData(API_PREFIX + 'utcc/today_video_upload_source_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/today_video_upload_source_distribution',{},parse_page);
        $('#time').html(time);
    },30000);

});


