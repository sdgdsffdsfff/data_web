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
        data.push({name:ele.dispatch_src_ip, y:ele.cnt});
    });
    options.series.push({name:'数量', 
        data:data,
        colorByPoint: true,
        dataLabels: {enabled: false}
    });
    Helper.drawColumnChar('graphs-realtime-num', '今日待分发/分发中任务数量分布(每隔30s自动更新)', options);
    Helper.drawTable('tables-realtime-num', '今日待分发/分发中任务数量分布(每隔30s自动更新)', msg);
};

$(function(){
    

    Helper.loadData(API_PREFIX + 'utcc/to_dispatch_and_dispatching_tasks_distribution',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + '/utcc/to_dispatch_and_dispatching_tasks_distribution',{},parse_page);
        $('#time').html(time);
    },30000);

});


