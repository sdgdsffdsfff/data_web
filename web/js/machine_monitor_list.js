
var dtGridColumns = [
    
    {id:'ip', title:'IP', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk',
    resolution:function(record, value){
	        var content = '';
	        if(record.status == 500){
                    content += '<span style="background:#FF0000;padding:2px 10px;color:white;">'+ value +'</span>';
	        }else{
	            content += value ;
	        }
	        return content;
	    }
    },
    {id:'city', title:'城市', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'descs', title:'描述', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'loadavg', title:'负载', type:'string', columnClass:'text-center'},
    {id:'cpuUsage', title:'CPU使用率', type:'number', columnClass:'text-center', fastQuery:true, fastQueryType:'ge'},
    {id:'memUsage', title:'内存使用率', type:'number', columnClass:'text-center', fastQuery:true, fastQueryType:'ge'},
    {id:'diskUsage', title:'硬盘使用率', type:'number', columnClass:'text-center', fastQuery:true, fastQueryType:'ge'},
    {id:'diskLoad', title:'磁盘负载', type:'number', columnClass:'text-center'},
    {id:'trafficIn', title:'下行流量', type:'string', columnClass:'text-center'},
    {id:'trafficOut', title:'上行流量', type:'string', columnClass:'text-center'},
    {id:'badproc', title:'故障进程', type:'string', columnClass:'text-center'},
    {id:'lastUptime', title:'更新时间', type:'date', format:'yyyy-MM-dd hh:mm:ss', otype:'time_stamp_s', columnClass:'text-center',  fastQuery:true, fastQueryType:'ge'},
    {id:'clientVersion', title:'客户端版本', type:'string', columnClass:'text-center'},
    {id:'status', title:'状态', type:'number', columnClass:'text-center'}
];
var dtGridOption = {
        ajaxLoad : true,
        loadURL :  '/web/machine/monitor_list',
        exportFileName : '监控报表',
        columns : dtGridColumns,
        gridContainer : 'dtGridContainer',
        toolbarContainer : 'dtGridToolBarContainer',
        pageSize : 20
};
var grid = $.fn.DtGrid.init(dtGridOption);
$(function(){
        grid.load();
        setInterval(function(){
            grid.load();
        },6000);
});

