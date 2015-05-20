function parse_page(req, msg){
    var names = ['vv','uv'];
    $.each(names, function(i, name){
        var response = [];
        var options = {};
        switch(req.d_offset){
            case 0:
            case 1:    
                response = Helper.groupMsg(msg,'refer',['stat_date','stat_hour','uv','uv_compare','vv','vv_compare']);
                options.tooltip = {
                    xDateFormat:'%Y-%m-%d %H:%M'
                };
                break;
            case 7:
            case 30:    
                response = Helper.groupMsg(msg,'refer',['stat_date','uv','uv_compare','vv','vv_compare']);
                
                break;
        }
        options.series = Helper.getGroupDataSeriesOptions(response, name);
        Helper.drawCommonChart('graphs-'+req.containerKey+'-'+name, '各来源'+name+'时报',options);
    });       
}

$(function(){
    var flag = {
        "graphs_today":1,
        "graphs_yesterday":0,
        "graphs_7days":0,
        "graphs_30days":0
    };

    Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:0,containerKey:"today"},parse_page);


    $('#hl_vhl-refer_uv_vv_daily_tab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var index = $(e.target).attr('href').replace(/#/i, "");
        if(index == "graphs_yesterday" && flag.graphs_yesterday==0){
            Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:1,containerKey:"yesterday"},parse_page);
            flag.graphs_yesterday=1;
        }
        if(index == "graphs_7days" && flag.graphs_7days==0){
            Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:7,containerKey:"7days"},parse_page);
            flag.graphs_7days=1;
        }
        if(index == "graphs_30days" && flag.graphs_30days==0){
            Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:30,containerKey:"30days"},parse_page);
            flag.graphs_30days=1;
        }

    });
/*
    $("#graphs").tabs({
        select: function(event,ui){
            if(flag[ui.index] == 0){
                switch(ui.index){
                case 1:
                    Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:1,containerKey:"yesterday"},parse_page);
                    break;
                case 2:
                    Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:7,containerKey:"7days"},parse_page);
                    break;
                case 3:
                    Helper.loadData(API_PREFIX + 'hl/vhl/refer_uv_vv_daily',{d_offset:30,containerKey:"30days"},parse_page);
                    break;
                }
                flag[ui.index] = 1;
            }
        }
    });
*/
});
 
