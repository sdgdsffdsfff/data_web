var sex = {1:'男', 2:'女'};
var degree = {1:'小学', 2:'初中', 3:'高中', 4:'中专', 5:'大学', 6:'硕士', 7:'博士', 8:'其他'};
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
    {id:'ignored', title:'ignored', type:'number', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'descs', title:'描述', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'processList', title:'进程列表', type:'string', columnClass:'text-center'},
    {id:'userID', title:'用户ID', type:'number', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
    {id:'id', title:'操作', type:'number',columnClass:'text-center' ,resolution:function(record, value){
	        var content = '';
                    
	            content += '<a class="delete_machine" data-ip="'+record.ip+'"  data-id="'+value+'">删除</a> | <a class="edit_machine" data-id="'+value+'">修改</a>';
	        
	        return content;
	    }}
];
var dtGridOption = {
        ajaxLoad : true,
        loadURL :  '/web/machine/list',
        exportFileName : '机器列表',
        columns : dtGridColumns,
        gridContainer : 'dtGridContainer',
        toolbarContainer : 'dtGridToolBarContainer',

        pageSize : 2
};
var grid = $.fn.DtGrid.init(dtGridOption);
$(function(){
        grid.load();
        $('.delete_machine').live('click',function(){
            var id = $(this).data('id');
            var ip = $(this).data('ip');
            $.ajax({
                type: "get",
                dataType: "json",
                url: '/web/machine/delete',
                cache: false,
                data : {id:id,ip:ip},
                success: function(msg){

                    if(msg.meta.status == 200)
                       grid.reload();
                    else
                        alert('操作失败');
                }
            });
        });
});

