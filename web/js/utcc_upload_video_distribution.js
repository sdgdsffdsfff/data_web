function parse_page(req,msg){
    var options = {};
    options.series = [];
    options.xAxis ={};
    options.xAxis.labels = {
                    rotation: -15,
                    align: 'right',
                    style: {
                        fontSize: '10px',
                        fontFamily: 'Arial,Helvetica,sans-serif;'
                    }
                };
    var code = {
        100:"100 上传中",
        102:"102 上传完成",
        104:"104 上传失败",
        105:"105 上传重复视频",
        200:"200 转码中",
        202:"202 全部码流转码结束，均成功",
        203:"203 全部码流转码结束，部分成功",
        204:"204 全部码流转码结束，均失败",
        302:"205 全部码流分发结束，均成功",
        303:"303 全部码流分发结束，部分成功",
        304:"304 全部码流分发结束，均失败",
        402:"402 全部码流向播客汇报，均成功",
        403:"403 全部码流向播客汇报，部分成功",
        404:"404 全部码流向播客汇报，全部失败"
    };
    var data = [];
    $.each(msg.response, function(i, ele){
        data.push({name:code[ele.status], y:ele.cnt});
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
    Helper.loadData(API_PREFIX + 'utcc/upload_video_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + 'utcc/upload_video_distribution',{},parse_page);
        $('#time').html(time);
    },30000);
    $("#graphs").tabs();
    $("#load").hide();
});


