var ignored = {0:'NO', 1:'YES'};

var dtGridColumns = [
    
    {id:'name', title:'机器名称', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
    {id:'province', title:'省份', type:'string', columnClass:'text-center',hideType:'lg|md|sm|xs'},
    {id:'city', title:'城市', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
    {id:'ip', title:'IP', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
    {id:'cdnid', title:'CDNID', type:'number', columnClass:'text-center', hideType:'lg|md|sm|xs'},
    {id:'cpuNum', title:'CPU数量', type:'number', columnClass:'text-center', hideType:'lg|md|sm|xs'},
    {id:'coreNum', title:'内核数', type:'number', columnClass:'text-center', hideType:'lg|md|sm|xs'},
    {id:'memSum', title:'内存', type:'number', columnClass:'text-center', hideType:'lg|md|sm|xs'},
    {id:'diskSum', title:'硬盘', type:'number', columnClass:'text-center', hideType:'lg|md|sm|xs'},
    {id:'ignored', title:'忽略监控', type:'number', columnClass:'text-center', codeTable:ignored, fastQuery:true, fastQueryType:'eq'},
    {id:'descs', title:'描述', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'processList', title:'进程列表', type:'string', columnClass:'text-center'},
    {id:'userID', title:'用户ID', type:'number', codeTable:jsonUser, columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'id', title:'操作', type:'number',columnClass:'text-center' ,resolution:function(record, value){
	        var content = '';
                    
	            content += '<a href="/web/machine/delete?id='+value+'&ip='+record.ip+'">删除</a>';
	        
	        return content;
	    }}
];
var dtGridOption = {
    ajaxLoad : true,
    loadURL :  '/web/machine/manager',
    exportFileName : '机器列表',
    columns : dtGridColumns,
    gridContainer : 'dtGridContainer',
    toolbarContainer : 'dtGridToolBarContainer',
    pageSize : 20
};
var grid = $.fn.DtGrid.init(dtGridOption);
$(function(){
    grid.load();
});

