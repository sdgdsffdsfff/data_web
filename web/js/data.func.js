//
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(searchElement /*, fromIndex */) {
        "use strict";
        if (this == null) {
            throw new TypeError();
        }
        var t = Object(this);
        var len = t.length >>> 0;
        if (len === 0) {
            return -1;
        }
        var n = 0;
        if (arguments.length > 1) {
            n = Number(arguments[1]);
            if (n != n) { // shortcut for verifying if it's NaN
                n = 0;
            } else if (n != 0 && n != Infinity && n != -Infinity) {
                n = (n > 0 || -1) * Math.floor(Math.abs(n));
            }
        }
        if (n >= len) {
            return -1;
        }
        var k = n >= 0 ? n : Math.max(len - Math.abs(n), 0);
        for (; k < len; k++) {
            if (k in t && t[k] === searchElement) {
                return k;
            }
        }
        return -1;
    }
}


/**************************************************************************
name : load_data
Parameter : url 中间件的接口 
callback 回调函数
use for ：ajax加载数据 
aa_src core_data_daily general_in_daily in_daily in_video_aa_ctr
mobi_data pv_uv_top30 retention_rate vv_src
 **************************************************************************/
/*
    object param{
        'key1':'';
        'val1':'';
        'key2':'';
        'val2':'';
    }
*/
function load_msg(url,param,callback){
    if(param.key2 != undefined)
        var data =  param.key1 + "=" +  param.val1 + param.key2 + "=" +  param.val2 + "&username=" + user + '&token=' + token;
    else if(param.key1 != undefined)
        var data =  param.key1 + "=" +  param.val1 + "&username=" + user + '&token=' + token;
    else 
        var data = "&username=" + user + '&token=' + token;
    $.ajax({
        type: "get",
        dataType: "json",
        url: url,
        cache: false,
        data : data,
        complete :function() {
            try{
                if(param.key2 != undefined)
                    $("#tables,#graphs,#graphs-"+param.val2).tabs();    
                else if(param.key1 != undefined)
                    $("#tables,#graphs,#graphs-"+param.val1).tabs();
            }catch(e){
            }
        },
        success: function(msg){
            if(param.key2 != undefined)
                callback(msg,param.val2);
            else if(param.key1 != undefined)
                callback(msg,param.val1);
            else
                callback(msg);
        }
    });
}

function load_data(url, callback){
    $("#load").show();
    $.ajax({
        type: "get",
        dataType: "json",
        url: url,
        cache: false,
        data : 'username=' + user + '&token=' + token,
        complete :function() {
            try{
                $("#load").hide();
            }catch(e){
            }
        },
        success: function(msg){
            callback(msg);
        }
    });
}

function load_data_by_key(url, _key, _val, callback){
    $("#load").show();
    //$("#rightside").hide();
    $.ajax({
        type: "get",
        data: _key + "=" + _val + "&username=" + user + '&token=' + token,
        dataType: "json",
        cache :true,
        url: url,
        complete :function() {
            try{
                if(_key != 'os')
                    $("#tables,#graphs,#graphs-"+_val).tabs();
                    $("#load").hide();
                    //$("#rightside").show();
            }catch(e){
            }
        },
        success: function(msg){
            //console.log(_key + "=" + _val + "&username=" + user + '&token=' + token);
            callback(msg, _val);
            //$("#load").hide();
        }
    });
    //$("#load").hide();
}
function load_data_by_two_key(url, _key1, _val1,_key2,_val2,callback){
    $("#load").show();
    $.ajax({
        type: "get",
        data: _key1 + "=" + _val1 + "&" + _key2 + "=" + _val2 + "&username=" + user + '&token=' + token,
        dataType: "json",
        cache :true,
        url: url,
        complete :function() {
            try{
                $("#tables,#graphs,#graphs-"+_val2).tabs();
                $("#load").hide();
            }catch(e){
            }
        },
        success: function(msg){
            //传递第二个参数值 url
            callback(msg, _val2);
            //$("#load").hide();
        }
    });
    //("#load").hide();
}
/**************************************************************************
name : convert
Parameter : arr需要转化的数组
use for ：转化数据 将字符串转化成数字
 **************************************************************************/
function extract_msg(msg,list,type)
{
    var type = typeof(type) === "undefined" ? 0 : 1;
    var data = Object();
    $.each(msg.response, function(key, ele){
        if(type == 0){
            if($.inArray(key, list) > -1)
                    data[key] = ele;
        }else{
            if($.inArray(key, list) <= -1)
                 data[key] = ele;
        }   
    });
    return data;
}
/**************************************************************************
name : convert
Parameter : arr需要转化的数组
use for ：转化数据 将字符串转化成数字
 **************************************************************************/
var meta = new Object();

meta['DATA_DESC'] = "date";
meta['日期'] = "date";

meta['时间'] = "time";

meta['AA_SHOW_RATE'] = "rate";
meta['AA展示比昨日'] = "rate";
meta['CTR'] = "rate";
meta['VV_RATE'] = "rate";
meta['VV比昨日'] = "rate";
meta['AA_COVERAGE_RATE'] = "rate";
meta['视频播放成功率'] = "rate";
meta['VIDEO_SUCCESS_RATE'] = "rate";
meta['视频播放成功率'] = "rate";

meta['CHANNEL'] = "string";
meta['频道'] = "string";
meta['URL'] = "string";
meta['VER'] = "string";
meta['REFER'] = "string";
meta['类型'] = "string";
 
function convert_msg(msg,etc){
    var etc = typeof(etc) === "undefined" ? "" : etc;
    for(key in msg.response){
        if(key != etc){
            if(meta[key] != undefined){
                if(meta[key] == "date")
                    msg.response[key] = convert_date(msg.response[key]);
                if(meta[key] == "time")
                    msg.response[key] = convert_time(msg.response[key]);
            }
            else
                msg.response[key] = convert_number(msg.response[key]);
        }
    }
    return msg;
}
/*function convert_rate(arr){
    var out = [];
    $.each(arr, function(d, e){
        if(arr[d] != null || arr[d] != undefined)
            out.push(arr[d]+" %");
        else
            out.push(0);
    });
    return out;
}*/
function convert_number(arr){
    var out = [];
    $.each(arr, function(d, e){
        if(arr[d] != null || arr[d] != undefined)
            out.push(parseFloat(("" + arr[d]).replace(/,/g, "")));
        else
            out.push(0);
    });
    return out;
}

function convert(arr){
    var out = [];
    $.each(arr, function(d, e){
        if(arr[d] != null || arr[d] != undefined)
            out.push(parseFloat(("" + arr[d]).replace(/,/g, "")));
        else         
            out.push(0);
    });
    return out;
}
function convert_date(arr){
    var out = [];
    $.each(arr, function(d){
        if(arr[d] != null || arr[d] != undefined)
            out.push((arr[d]).substr(5, (arr[d]).length));
        else
            out.push(0);
    });
    return out;
}

function convert_time(arr){
    var out = [];
    $.each(arr, function(d){
        if(arr[d] != null || arr[d] != undefined)
            out.push((arr[d]).substr(((arr[d]).length- 2),2)+'时');
        else
            out.push(0);
    });
    return out;
}

function convert_hour(arr){
    var out = [];
    var year;
    var month;
    var day;
    var hour;
    $.each(arr, function(d){
        if(arr[d] != null || arr[d] != undefined){
            hour = (arr[d]).substr((arr[d]).length - 2,2);
            day = (arr[d]).substr((arr[d]).length - 4,2);
            month = (arr[d]).substr((arr[d]).length - 6,2);
            year = (arr[d]).substr(0,4);
            //console.log('year: '+ year + ' month: ' + month + ' day: ' + day + ' hour: ' +hour);
            out.push(year+'-'+month+'-'+day+' '+hour+'时');
        }
        else
            out.push(0);
    });
    return out;
}
function convert_minute(arr){
    var out = [];
    var year;
    var month;
    var day;
    var hour;
    var minute;
    $.each(arr, function(d){
        if(arr[d] != null || arr[d] != undefined){
            minute =(arr[d]).substr((arr[d]).length - 2,2);
            hour = (arr[d]).substr((arr[d]).length - 4,2);
            day = (arr[d]).substr((arr[d]).length - 6,2);
            month = (arr[d]).substr((arr[d]).length - 8,2);
            year = (arr[d]).substr(0,4);
            //console.log('year: '+ year + ' month: ' + month + ' day: ' + day + ' hour: ' +hour);
            out.push(year+'-'+month+'-'+day+' '+hour+'时'+minute+'分');
        }
        else
            out.push(0);
    });
    return out;
}
/**************************************************************************
name : draw_table
Parameter : data 需要打印的数据 
container 将要打印到html容器的名称
title 表格的第一列数据的名称
etc 不需要打印的数据的名称
use for ：打印表格
channel_daily core_data_daily general_in_daily in_daliy
in_video_aa_ctr mobi_data retenration_rate sub_site_daily
 **************************************************************************/
/*
    TODO:
    data, container, meta
    mata存储用于格式化table的数据
*/
function print_table(data,container,main_key,type,etc){
    var type = typeof(type) === "undefined" ? "" : type;
    var etc = typeof(etc) === "undefined" ? "" : etc;
    var k = 0;
    var tableHtml = "<table width = '100%'>";
    for(k = 0;k < (data[main_key].length + 1);k++){
        if(k%2 == 0)
            tableHtml += "<tr class = 'alt'>";
        else
            tableHtml += "<tr>";
        if(k == 0){
            //打印表格的第一行
            tableHtml += "<td nowrap='nowrap' ><nobar>" + convert_name(main_key) + "</nobar></td>";
            for(key in data){
                if(key != main_key && key != etc)
                    tableHtml += "<td>" + convert_name(key) + "</td>";
            }
        }
        else{
            //第一列的数据不转行
            if(type == "url")
                tableHtml += "<td class = 'url' title = '" + data[main_key][k-1] + "' style = ' text-decoration:underline' ><nobar>" + data[main_key][k-1] + "</nobar></td>";
            else
                tableHtml += "<td nowrap='nowrap'><nobar>" + data[main_key][k-1] + "</nobar></td>";
            for(key in data){
                if(key != main_key && key != etc)
                    tableHtml += "<td>" + (data[key][k-1] === null ? '' : data[key][k-1]) + "</td>";
            }
        }
        tableHtml += "</tr>";
    }
    tableHtml += "</table>";
    var Table = jQuery(tableHtml);
    jQuery("#" + container).append(Table);
}

function draw_table(data,container,title,etc){
    var k = 0;
    var tableHtml = "";
    var length; 
    var is_hidden = 0;
    var l = 0;
    var i;
    if(data['DIS']){
        // 屎一般的写法T_T
        is_hidden = 1;
        var n = new Date();
        n.setHours(0);
        n.setMinutes(0);
        n.setSeconds(0);
        n.setMilliseconds(0);
        l = n.getTime();
    }
    var p = new Date();
    tableHtml += "<table width = '100%'>";
    for(k = 0;k < (data[title].length + 1);k++){
        if(is_hidden){
            var extra_class = '0';
            var ts = data['DIS'][k];
            if(!ts) continue;
            var tts = get_timestamp_from_damn_vv_time(p, "" + ts);
            var delta = l - tts;
            if(delta > 0){
                extra_class = Math.ceil(delta / 86400000);
            }
            if(k%2 == 0)//判断单双行 加样式
                tableHtml += "<tr class='hiddis alt' val='" + extra_class + "'>";
            else
                tableHtml += "<tr class='hiddis' val='" + extra_class + "'>";
        } else {
            if(k%2 == 0)//判断单双行 加样式
                tableHtml += "<tr class = 'alt'>";
            else
                tableHtml += "<tr>";
        }
        if(k == 0)//打印表格的第一行
        {
            tableHtml += "<td nowrap='nowrap' ><nobar>"+convert_name(title)+"</nobar></td>";
            for(key in data){
                if(key != title && key != etc){
                    if(key.indexOf("RATE")>-1||key == 'VVAUV'|| key == 'PVAUV'||key == 'CTR' )//查看数据是否是比率
                        tableHtml += "<td>" + convert_name(key) + "(%)</td>";
                    else
                        tableHtml += "<td>" + convert_name(key) + "</td>";
                }
            }
        }
        else{
            //第一列的数据不转行
            tableHtml += "<td nowrap='nowrap'><nobar>" + data[title][k-1] + "</nobar></td>";
            for(key in data){
                if(key != title && key != etc)
                    tableHtml += "<td>" + (data[key][k-1] === null ? '' : data[key][k-1]) + "</td>";
            }
        }
        tableHtml += "</tr>";
    }
    tableHtml += "</table>";
    var Table = jQuery(tableHtml);
    jQuery("#" + container).append(Table);
}


function draw_simple_table(data,len,container,etc){
    var k = 0;
    var tableHtml = "";
    var length; 
    var is_hidden = 0;
    var l = 0;
    var i;
  
    tableHtml += "<table width = '100%'>";
    for(k = 0;k < (len + 1);k++){
        if(is_hidden){
            var extra_class = '0';
            if(!ts) continue;
            var tts = get_timestamp_from_damn_vv_time(p, "" + ts);
            var delta = l - tts;
            if(delta > 0){
                extra_class = Math.ceil(delta / 86400000);
            }
            if(k%2 == 0)//判断单双行 加样式
                tableHtml += "<tr class='hiddis alt' val='" + extra_class + "'>";
            else
                tableHtml += "<tr class='hiddis' val='" + extra_class + "'>";
        } else {
            if(k%2 == 0)//判断单双行 加样式
                tableHtml += "<tr class = 'alt'>";
            else
                tableHtml += "<tr>";
        }
        if(k == 0)//打印表格的第一行
        {
            for(key in data){
                if(key != etc){
                    if(key.indexOf("RATE")>-1||key == 'VVAUV'|| key == 'PVAUV'||key == 'CTR' )//查看数据是否是比率
                        tableHtml += "<td>" + convert_name(key) + "(%)</td>";
                    else
                        tableHtml += "<td>" + convert_name(key) + "</td>";
                }
            }
        }
        else{
            //第一列的数据不转行
            for(key in data){
                if(key != etc)
                    tableHtml += "<td>" + (data[key][k-1] === null ? '' : data[key][k-1]) + "</td>";
            }
        }
        tableHtml += "</tr>";
    }
    tableHtml += "</table>";
    var Table = jQuery(tableHtml);
    jQuery("#" + container).append(Table);
}



/**************************************************************************
name : draw_table_by_url
Parameter : data 需要打印的数据
Key 过滤数据的类别
Name 需要过滤出来数据的具体名称
container 将要打印到html容器的名称
title 表格的第一列数据的名称
etc 不需要打印的数据的名称
use for ：打印表格(<td>中带class)
aa_src vv_src pv_uv_yop30
 **************************************************************************/
function draw_table_by_url(data,Key,Name,Title,Container,etc)
{
    var k = 0;
    var tableHtml = "";
    var length;
    var flag = 0;
    tableHtml += "<table width = '100%'>";
    if(data[Key] != undefined)//查看数据是否需要过滤
    {
        for(k = 0;k < (data[Key].length + 1);k++)
        {
            if(k == 0)//打印第一排数据
            { 
                if(Title != 'DATA_DESC')//查看第一列是否为日期
                    tableHtml += "<tr class = 'alt' style='width:75px'><td>"+ Title +"</td>";
                else
                    tableHtml += "<tr class = 'alt'><td>日期</td>";
                for(key in data)
                {
                    if(key != etc && key != Key && key != Title)
                        tableHtml += "<td>"+convert_name(key)+"</td>";
                }
                flag = 1;
                tableHtml += "</tr>";
            }
            else
            {
                if(data[Key][k-1] == Name)
                {
                    if(flag == 0)
                    {
                        tableHtml += "<tr class = 'alt'>";
                        flag = 1;
                    }
                    else
                    {
                        tableHtml += "<tr>";
                        flag = 0;
                    }
                    //url 加class 用于触发js事件
                    tableHtml += "<td class = 'url' title = '" + data[Title][k-1] + "' style = ' text-decoration:underline' >" + data[Title][k-1] + "</td>";
                    for(key in data)
                    {
                        if(key != etc && key != Title && key != Key)
                        { 
                            tableHtml += "<td>" + data[key][k-1] + "</td>";
                        }
                    }
                }
            }
            tableHtml += "</tr>"
        }
        tableHtml += "</table>"
            var Table = jQuery(tableHtml);
        jQuery("#" + Container).append(Table);
    }
    else// 用于打印 pv_uv_top30的 tab pv 和 tab uv 表格
    { 
        var d = new Date();
        var day = (d.getMonth()+1)+'-'+(d.getDate() - 1);
        for(k = 0;k < (data[Title].length + 1);k++)
        {
            if(k == 0)
            {
                tableHtml += "<tr class = 'alt'>";
                for(key in data)
                {
                    if(key != etc && key != Key )
                    {
                        if(key != 'PV' && key != 'UV')//第一排数据转化为日期
                            tableHtml += "<td>" + convert_name(key) + "</td>";
                        else
                            tableHtml += "<td>" + day + "</td>";
                    }
                }
                flag = 1;
                tableHtml += "</tr>";
            }
            else
            {
                if(flag == 0)
                {
                    tableHtml += "<tr class = 'alt'>";
                    flag = 1;
                }
                else
                {
                    tableHtml += "<tr>";
                    flag = 0;
                }
                tableHtml += "<td class = 'url' title = '" + data[Title][k-1] + "' style = ' text-decoration:underline'>" + data[Title][k-1] + "</td>";
                for(key in data)
                {
                    if(key != etc  && key != Key && key != Title)
                    {
                        tableHtml += "<td>" + data[key][k-1] + "</td>";
                    }
                }

            }
            tableHtml += "</tr>";
        }   
        tableHtml += "</table>";
        var Table = jQuery(tableHtml);
        jQuery("#"+Container).append(Table);
    }   
}
/**************************************************************************
name : draw_table_by_key
Parameter : data 需要打印的数据
Key 需要过滤数据的类别
Name 需要过滤的数据的具体名称
container 将要打印到html容器的名称
title 表格的第一列数据的名称
etc 不需要打印的数据的名称
use for ：打印表格(本地过滤数据)
none
 **************************************************************************/
function draw_table_by_key(data,Key,Name,Title,Container,etc)
{
    var k = 0;
    var tableHtml = "";
    var flag = 0;
    tableHtml += "<table width = '100%'>";
    for(k = 0;k < (data[Key].length + 1);k++)
    {
        if(k == 0)
        {
            if(Title != 'DATA_DESC')
                tableHtml += "<tr class = 'alt'><td>" + convert_name(Title) +"</td>";
            else
                tableHtml += "<tr class = 'alt'><td>日期</td>";
            for(key in data)
            {
                if(key != Key && key != Title && key != etc)
                    tableHtml += "<td>" + convert_name(key) + "</td>";
            }
            flag = 1;
            tableHtml += "</tr>";
        }
        else
        {
            if(data[Key][k-1] == Name)
            {
                if(flag == 0)
                {
                    tableHtml += "<tr class = 'alt'>";
                    flag = 1;
                }
                else
                {
                    tableHtml += "<tr>";
                    flag = 0;
                }
                tableHtml += "<td>" + data[Title][k-1] + "</td>"; 
                for(key in data)
                {
                    if(key != Key && key != Title && key != etc)
                        tableHtml += "<td>" + data[key][k-1] + "</td>";
                }
                tableHtml += "</tr>";
            }
        }
    }
    tableHtml += "</table>";
    var Table = jQuery(tableHtml);
    jQuery("#"+Container).append(Table);
}
/**************************************************************************
name : draw_graphic
Parameter : data 需要打印的数据
container 将要打印到html容器的名称
title 图表的名称
type 图表的类型
yAxistitle 图表纵坐标的名称
use for ：打印图表
channel_daily core_data_daliy general_in_daily in_daily 
in_video_aa_ctr mobi_data sub_site_daily 
 **************************************************************************/

/*
    带*参数必须有
    object data:数据
    string container：容器*
    string title：标题*
    array  xAxis: 横轴数据名称*
    string type: 类型
    string yAxis_two: 第二纵轴数据名称
    int step ：横轴间隔
    string reverse : 是否翻转
    events ：事件
    radius ：数据点大小
*/
function draw_graph(data,container,title,xAxis,type,yAxis_two,step,reverse,events, radius) {

    var t = typeof(type) === "undefined" ? 'line' : type;
    var r = typeof(reverse) === "undefined" ? true : false;
    var st = typeof(step) === "undefined" ? '1' : step;
    var radius = typeof(radius) === "undefined" ? 4 : radius;

    var options = {
        chart: {
            renderTo:container,
            type:t,
        },
        title: {
            text:title
        },
        xAxis: {
            labels:{
                step:st
            },
            minorTickInterval: 'auto',
            reversed: r,//x轴反向打印数据
            categories: xAxis,
        },
        yAxis:[{
            title: {
                text: '次数'
            },
            min: 0
        }],
        tooltip: {
            useHTML: true,
        },
        plotOptions: {
            series: {
                marker: {
                    radius:radius //设计数据结点的大小
                }
            }
        },
        series: [],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
               }
        }
    }
    $.each(data, function(key, ele){
        var series = {
            name: '',
            data: [],
            yAxis: 0
        };
        
        series.name = convert_name(key);
        series.data = ele;
        if(typeof(yAxis_two) != "undefined"){
            if(key == yAxis_two)
                series.yAxis = 1;
        }
        if(typeof(events) != 'undefined'){
            series.events = {click : null};
            series.events.click = events;
        }
        if(series.data[0] != xAxis[0])
            options.series.push(series);
    });
    if(typeof(yAxis_two) != "undefined"){
        options.yAxis.push( {title:{text:convert_name(yAxis_two)},'opposite':true});
    }
    var chart = new Highcharts.Chart(options);
}

function draw_graphic(data,container,type,title,yAxistitle, reverse, xAxis,step,renge, events, radius, xRot) {
    var r = typeof(reverse) === "undefined" ? true : false;
    var xa = typeof(xAxis) === "undefined" ? [] : xAxis;
    var st = typeof(step) === "undefined" ? '1' : step;
    var radius = typeof(radius) === "undefined" ? 4 : radius;
    var xr = (typeof(xRot) === "undefined" ? 0 : -45);

    var options = 
    {
        chart: {
            renderTo:container,
            type:type,
        },
    title: {
        text:title
    },
    xAxis: {
        labels:{
            step:st,
            rotation: xr,
            align: (xr == 0 ? 'center' : 'right'),
 style: {
                        fontSize: '13px',
                        fontFamily: '微软雅黑, Verdana, sans-serif'
                    }
        },
        minorTickInterval: 'auto',
        reversed: r,//x轴反向打印数据           
        categories: xa,
    },
    yAxis: {
        title: {
            text: yAxistitle
        },
        min: 0
    },
    tooltip: {
        useHTML: true,
    },
    plotOptions: {
        series: {
            marker: {
                radius:radius //设计数据结点的大小
            }
        }
    },
    series: [],
        navigation: {
            menuItemStyle: {
                fontSize: '10px'
               }
        }
    }     
    $.each(data, function(key, ele){
        var series = {
            name: '',
            data: []
        };
        if(key != "date"  &&key != "DATA_DESC" && key != "CHANNEL" && key != '日期'&& key != '日期时间'){
            series.name = convert_name(key);
            series.data = ele;
            if(typeof(events) != 'undefined'){
            series.events = {click : null};
            series.events.click = events;
            }
            options.series.push(series);
        }
    });
    var i;
    if(data['DATA_DESC'] != undefined){
        for(i = 0;i <(data['DATA_DESC'].length);i++){
            if(data['DATA_DESC'][i] != null || data['DATA_DESC'][i] != undefined) 
                options.xAxis.categories.push(data['DATA_DESC'][i]);
            else
                options.xAxis.categories.push(' ');
        }
    }else if(data['CHANNEL'] != undefined){
        for(i = 0;i <(data['CHANNEL'].length);i++){
            if(data['CHANNEL'][i] != null || data['CHANNEL'][i] != undefined)
                options.xAxis.categories.push(data['CHANNEL'][i]);
            else
                options.xAxis.categories.push(' ');
        }
    }else if(data['date'] != undefined){
        for(i = 0;i <(data['date'].length);i++){
            if(data['date'][i] != null || data['date'][i] != undefined)
                options.xAxis.categories.push(data['date'][i]);
            else
                options.xAxis.categories.push(' ');
        }
    }
    var chart = new Highcharts.Chart(options);
}

function draw_graphic_master_detail(data,container,title,yAxistitle,stime,endtime)
{
    var masterChart,
    detailChart;
    var year = new Date().getFullYear();
    var month = new Date().getMonth();
    var day = new Date().getDate();
    var hour = new Date().getHours();
    var nowtime = endtime;
    var startmonth = new Date().getMonth() + 1 - 3;
    var startyear = year;
    var inityear = year;
    var initmonth = new Date().getMonth() + 1 - 1;
    if(startmonth <= 0){
        startmonth = startmonth + 12;
        startyear = year - 1;
    }
    if(initmonth <= 0){
        initmonth = initmonth + 12;
        inityear = year - 1;
    }
    var starttime = stime + 8*3600*1000;//倒时区
    var inittime =  Date.UTC(inityear, initmonth - 1, day , hour);
    
    // create the master chart
    function createMaster() {
        masterChart = new Highcharts.Chart({
            chart: {
                renderTo: 'master-'+container,
                reflow: false,
                borderWidth: 0,
                backgroundColor: null,
                marginLeft: 50,
                marginRight: 20,
                zoomType: 'x',
                events: {
                    // listen to the selection event on the master chart to update the
                    // extremes of the detail chart
                    selection: function(event) {
                        var extremesObject = event.xAxis[0],
                        min = extremesObject.min,
                        max = extremesObject.max,
                        detailData = [],
                        xAxis = this.xAxis[0];
    
                        // reverse engineer the last part of the data
                        jQuery.each(this.series[0].data, function(i, point) {
                            if (point.x > min && point.x < max) {
                                detailData.push({
                                    x: point.x,
                                    y: point.y
                                });
                            }
                        });
    
                        // move the plot bands to reflect the new detail span
                        xAxis.removePlotBand('mask-before'+container);
                        xAxis.addPlotBand({
                            id: 'mask-before'+container,
                            from: starttime,
                            to: min,
                            color: 'rgba(0, 0, 0, 0.2)'
                        });
    
                        xAxis.removePlotBand('mask-after'+container);
                        xAxis.addPlotBand({
                            id: 'mask-after'+container,
                            from: max,
                            to: nowtime,
                            color: 'rgba(0, 0, 0, 0.2)'
                        });
                           
                        detailChart.series[0].setData(detailData);
    
                        return false;
                    }
                }
            },
            title: {
                text: null
            },
            xAxis: {
                type: 'datetime',
                showLastTickLabel: true,
                maxZoom: 3600000, // 1 hour
                plotBands: [{
                    id: 'mask-before'+container,
                    from: starttime,
                    to: inittime,
                    color: 'rgba(0, 0, 0, 0.2)'
                }],
                title: {
                    text: null
                }
            },
            yAxis: {
                gridLineWidth: 0,
                labels: {
                    enabled: false
                },
                title: {
                    text: null
                },
                min: 0.6,
                showFirstLabel: false
            },
            tooltip: {
                formatter: function() {
                    return false;
                }
            },
            legend: {
                enabled: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                series: {
                    fillColor: {
                        linearGradient: [0, 0, 0, 70],
                        stops: [
                            [0, '#4572A7'],
                            [1, 'rgba(0,0,0,0)']
                        ]
                    },
                    lineWidth: 1,
                    marker: {
                        enabled: false
                    },
                    shadow: false,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    enableMouseTracking: false
                }
            },
    
            series: [{
                type: 'area',
                name: title,
                pointInterval: 3600 * 1000,
                pointStart: starttime,
                data: data
            }],
    
            exporting: {
                enabled: false
            }
    
        }, 
        function(masterChart) {
            createDetail(masterChart)
        });
    }
    
    // create the detail chart
    function createDetail(masterChart) {
    
        // prepare the detail chart
        var detailData = [],
        detailStart = inittime;
    
        jQuery.each(masterChart.series[0].data, function(i, point) {
            if (point.x >= detailStart) {
                detailData.push(point.y);
            }
        });
    
        // create a detail chart referenced by a global variable
        detailChart = new Highcharts.Chart({
            chart: {
                marginBottom: 120,
                renderTo: 'detail-'+container,
                reflow: false,
                marginLeft: 50,
                marginRight: 20,
                style: {
                    //position: 'absolute'
                }
            },
            credits: {
                enabled: false
            },
            title: {
                text: title
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: yAxistitle
                },
                maxZoom: 0.1
            },
            tooltip: {
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: false,
                        states: {
                            hover: {
                                enabled: true,
                                radius: 3
                            }
                        }
                    }
                }
            },
            series: [{
                name: title,
                pointStart: detailStart,
                pointInterval:  3600 * 1000,
                data: detailData
            }],
    
            exporting: {
                enabled: false
            }
    
        });
    }
    var $container = $('#'+container);
    
        var $detailContainer = $('<div id="detail-'+container+'">')
            .appendTo($container);
    
        var $masterContainer = $('<div id="master-'+container+'" style =" margin: -100px 0 0 0;height:100px;width:100%;">')
            .appendTo($container);
    // create master and in its callback, create the detail chart
    createMaster();
}

/**************************************************************************
name : draw_graphic_two_yaxis
Parameter : data 需要打印的数据
container 将要打印到html容器的名称
Name1 图表的横轴数据名称
Name2 图表的纵轴数据名称
Name3 图表的第二个纵轴数据名称
type 图表的类型
use for ：打印图表(双y轴)
channel_daily core_data_daliy general_in_daily in_daily
sub_site_daily
 **************************************************************************/
function draw_graphic_two_yaxis(data,Container,Type,Name1,Name2,Name3, title)
{
    if(data['AA_INSTALL']== undefined)
        data['AA_INSTALL'] = data['AA安装'];
    if(data['AA_SHOW']== undefined)
        data['AA_SHOW'] = data['AA展示'];
    if(data['AA_DOWNLOAD']== undefined)
        data['AA_DOWNLOAD'] = data['AA下载'];
    if(data['AA_VIDEO_BFNUM']== undefined)
        data['AA_VIDEO_BFNUM'] = data['AA视频播放'];
    if(data['AA_CLICK']== undefined)
        data['AA_CLICK'] = data['AA点击'];
    var _title = 'AA数据';
    if(title != undefined){
        _title = title;
    }
    var chart = new Highcharts.Chart({
chart: {
renderTo: Container,
//width : 500,
type : Type,
//height : 400
},
title: {
text:_title
},
xAxis: {
minorTickInterval: 'auto',
reversed: true,
categories: data[Name1]
},
yAxis: [{
title: {
text: Name2
}
}, {
title: {
text: Name3
       },
opposite: true
}],

series: [{
data: data['AA_INSTALL'],
      name:'AA安装'
        },
{
data: data['AA_DOWNLOAD'],
      name: 'AA下载',
},
{
data: data['AA_SHOW'],
      name: 'AA展示'
},
{
data: data['AA_VIDEO_BFNUM'],
      name: 'AA视频播放'
}, 
{
data: data['AA_CLICK'],
      name: 'AA点击',
      yAxis: 1
}],
tooltip: 
{
useHTML: true,
         //formatter: function() 
         //{
         //  return this.x + ' <br/>' + this.series.name + ':<br/><b>' + this.y + '</b>次';
         //},
},
plotOptions: {
series: {
marker: {
enabled: true,
         radius:4
        }
        }
             },
navigation:
{
menuItemStyle:
    {
fontSize: '10px'
    }
}
});

}


/*
   这尼马是我写过最恶心的函数了。各种没谱啊
   config = {
title : 'UTCC转换日报',
containerid : 'grahpic-1',
type : 'line',
data : 
x_name : 'date',
x_reversed : true
y_names : ['次数', '次数'],
labels : {'success' : '成功' , 'failed' : '失败'}
wantseries : ['success', 'failed'],
subaxis : ['failed']
}
 */
function draw_multiaxises(config){
    var _title = 'AA数据';
    if(config.title != undefined){
        _title = config.title;
    }
    var _containerid = config.containerid;
    var _type = config.type;
    var data = config.data;
    var x_name = config.x_name;
    var x_reversed = config.x_reversed
        var y_names = config.x_name;
    var y_axis = Array();
    var x_step = 1;
    if(config.x_step){
        var x_step = config.x_step;
    }
    $(config.y_names).each(function(i, v){
            if(i % 2 == 0){
            y_axis.push({title :{text: v}});
            } else {
            y_axis.push({title :{text: v}, 'opposite' : true});
            }
            });
    var want_series = Array();
    $(config.wantseries).each(function(i, v){
            if($.inArray(v, config.subaxis) == -1){
            want_series.push({data: data[v], name: config.labels[v]});
            } else {
            want_series.push({data: data[v], name: config.labels[v], yAxis : 1});
            }
            });

    var chart = new Highcharts.Chart({
chart: {
renderTo: _containerid,
type : _type,
},
title: {
text:_title
},
xAxis: {
minorTickInterval: 'auto',
reversed: x_reversed,
categories: data[x_name],
labels :{
step : x_step
}
},
yAxis: y_axis,
series: want_series,
tooltip: 
{
useHTML: true,
},
plotOptions: {
series: {
marker: {
enabled: true,
         radius:4
        }
        }
             },
navigation:
{
menuItemStyle:
    {
fontSize: '10px'
    }
}
});
}


function get_timestamp_from_damn_vv_time(p, v){
    // var p = new Date();
    var y = v.substr(0, 4);
    var m = parseInt(v.substr(4, 2)) - 1;
    var d = v.substr(6, 2);
    var h = v.substr(8, 2);
    p.setYear(y);
    p.setMonth(m);
    p.setDate(d);
    p.setHours(h);
    p.setMinutes(0);
    p.setSeconds(0);
    p.setMilliseconds(0);
    return p.getTime();
}


function disable_table(cid, idx){
    $(cid).find('tr').each(function(i, v){
        var val = parseInt($(v).attr('val'));
        idx = parseInt(idx);
        if(val == idx){
            $(v).show();
            $(v).next().show();
        }
    });
}
