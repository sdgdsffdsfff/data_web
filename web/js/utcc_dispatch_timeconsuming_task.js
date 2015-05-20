function parse_page(req,msg){
    
    Helper.drawTable('tables-realtime-num', '今日分发耗时的任务(每隔30s自动更新)', msg);
};

$(function(){

    Helper.loadData(API_PREFIX + 'utcc/dispatch_timeconsuming_task',{},parse_page);
    //30s更新一次数据
    setInterval(function(){
        var time = DateUtil.dateToStr();
        Helper.loadData(API_PREFIX + 'utcc/dispatch_timeconsuming_task',{},parse_page);
        $('#time').html(time);
    },30000);

});


