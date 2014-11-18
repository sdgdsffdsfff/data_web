function parse_page(msg){
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    msg = convert_msg(msg);
    var graphic_keys_1 = Array('PV','AGO_1_PV','AGO_2_PV','AGO_3_PV','AGO_4_PV','AGO_5_PV','AGO_6_PV','AGO_7_PV','REFER');
    var graphic_data_1 = Object();
    var graphic_keys_2 = Array('UV','AGO_1_UV','AGO_2_UV','AGO_3_UV','AGO_4_UV','AGO_5_UV','AGO_6_UV','AGO_7_UV','REFER');
    var graphic_data_2 = Object();
    var graphic_keys_3 = Array('REFER','DATA_DESC');
    var graphic_data_3 = Object();
    graphic_data_1 = extract_msg(msg,graphic_keys_1);
    graphic_data_2 = extract_msg(msg,graphic_keys_2); 
    graphic_data_3 = extract_msg(msg,graphic_keys_3,1); 
    print_table(graphic_data_1,'tables-pv','REFER','url','DATA_DESC');
    print_table(graphic_data_2,'tables-uv','REFER','url','DATA_DESC');
    //打印表格pv/uv
    var k = 0;
    var count = 0;
    var day = new Date();
    var today = (day.getMonth()+1)+'-'+(day.getDate() - 1);
    var tableHtml = "<table width = '100%'><tr class = 'alt'>";
    for(k = 0;k<(msg.response['REFER'].length+1);k++){
        if(k == 0){
            tableHtml += "<td style='width:75px'>来源(<span style = 'color:blue '>PV/</span><span  style = 'color:red '>UV</span>)</td>";
            for(key in  graphic_data_3){
                if(count < 8){
                    if(key == 'PV')
                        tableHtml += "<td>" + today + "</td>";
                    else
                        tableHtml += "<td>" + convert_name(key) + "</td>";
                }
                count++;
            }
            count = 0;
        }
        else{
            tableHtml += "<tr><td class = 'url' title = '" + msg.response['REFER'][k-1] + "' style='text-decoration:underline'>" + msg.response['REFER'][k-1] +"</td>";
            for(key in graphic_data_3){
                if(count < 8)
                    tableHtml += "<td><span style = 'color:blue'>" + graphic_data_3[key][k-1] + "</span>";
                else if(count == 8)
                tableHtml += "</tr><tr class = 'alt'><td></td><td><span style = 'color:red'>" + graphic_data_3[key][k-1] + "</span></td>";
                else
                    tableHtml += "<td><span style = 'color:red'>" + graphic_data_3[key][k-1] + "</span>";
                count++;
            }
            count = 0;
        }
        tableHtml += "</tr>"
    }
    tableHtml += "</table>"
    var Table = jQuery(tableHtml);
    jQuery("#tables-pvuv").append(Table);

    $(".url").bind('click', function(){
        var title = $(this).attr('title');
        var tmp = new Object();
        $("#load").show();
        tmp["key1"] = "url";
        tmp["val1"] = title;
        load_msg(API_PREFIX + "hl/vhl/pv_uv_top30",tmp,parse_page_title);
        $("#lists").bPopup();
        $("#load").hide();
    });
    $("#load").hide();
    $("#lists").hide(); 
    $("#tables").tabs();
}

function parse_page_title(msg,_key){
    var days = new Array();
    var d = new Date();
    var i;
    for(i = 0;i < 8;i++)
        days[(7-i)] = (d.getMonth()+1)+'-'+(d.getDate() - 1 - i);
    if(msg.meta.status != 200){
        alert("Data Loading Faild");
        return false;
    }
    msg = convert_msg(msg);

    var chart = new Highcharts.Chart({
        chart: {
                renderTo:'lists',
                type:'line',
        },
        title: {
                text:'来源: '+_key
        },
        xAxis: {
            categories: days
        },
        yAxis: {
            title: {
                text: '次数'
            },
        },
        series:[{
                name: 'PV',
                data: [msg.response['AGO_7_PV'][0],msg.response['AGO_6_PV'][0],msg.response['AGO_5_PV'][0],msg.response['AGO_4_PV'][0],msg.response['AGO_3_PV'][0],msg.response['AGO_2_PV'][0],msg.response['AGO_1_PV'][0],msg.response['PV'][0]]
            }, {
                name: 'UV',
                data: [msg.response['AGO_6_UV'][0],msg.response['AGO_6_UV'][0],msg.response['AGO_5_UV'][0],msg.response['AGO_4_UV'][0],msg.response['AGO_3_UV'][0],msg.response['AGO_2_UV'][0],msg.response['AGO_1_UV'][0],msg.response['UV'][0]]
            }],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
            }
        }
    });
}
$(document).ready(function(){
    $("#load").show();
    load_msg(API_PREFIX + "hl/vhl/pv_uv_top30",'',parse_page);
    $("#load").hide();
});
 
