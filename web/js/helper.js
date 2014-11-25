/**
* 日期处理工具类
*/
var DateUtil = function(){
    /**
     * 日期对象转换为指定格式的字符串
     * @param f 日期格式,格式定义如下 yyyy-MM-dd HH:mm:ss
     * @param date Date日期对象, 如果缺省，则为当前时间
     *
     * YYYY/yyyy/YY/yy 表示年份 
     * MM/M 月份 
     * W/w 星期 
     * dd/DD/d/D 日期 
     * hh/HH/h/H 时间 
     * mm/m 分钟 
     * ss/SS/s/S 秒 
     * @return string 指定格式的时间字符串
     */
    this.dateToStr = function(formatStr, date){
        formatStr = arguments[0] || "yyyy-MM-dd HH:mm:ss";
        date = arguments[1] || new Date();
        var str = formatStr;  
        var Week = ['日','一','二','三','四','五','六']; 
        str=str.replace(/yyyy|YYYY/,date.getFullYear());  
        str=str.replace(/yy|YY/,(date.getYear() % 100)>9?(date.getYear() % 100).toString():'0' + (date.getYear() % 100));  
        str=str.replace(/MM/,date.getMonth()>=9?(date.getMonth() + 1):'' + (date.getMonth() + 1));  
        str=str.replace(/M/g,date.getMonth());  
        str=str.replace(/w|W/g,Week[date.getDay()]);  
       
        str=str.replace(/dd|DD/,date.getDate()>=9?date.getDate().toString():'0' + date.getDate());  
        str=str.replace(/d|D/g,date.getDate());  
       
        str=str.replace(/hh|HH/,date.getHours()>=9?date.getHours().toString():'0' + date.getHours());  
        str=str.replace(/h|H/g,date.getHours());  
        str=str.replace(/mm/,date.getMinutes()>=9?date.getMinutes().toString():'0' + date.getMinutes());  
        str=str.replace(/m/g,date.getMinutes());  
       
        str=str.replace(/ss|SS/,date.getSeconds()>=9?date.getSeconds().toString():'0' + date.getSeconds());  
        str=str.replace(/s|S/g,date.getSeconds());  
       
        return str;  
    }
 
     
    /**
    * 日期计算 
    * @param strInterval string  可选值 y 年 m月 d日 w星期 ww周 h时 n分 s秒 
    * @param num int
    * @param date Date 日期对象
    * @return Date 返回日期对象
    */
    this.dateAdd = function(strInterval, num, date){
        date =  arguments[2] || new Date();
        switch (strInterval) {
            case 's' :return new Date(date.getTime() + (1000 * num)); 
            case 'n' :return new Date(date.getTime() + (60000 * num)); 
            case 'h' :return new Date(date.getTime() + (3600000 * num)); 
            case 'd' :return new Date(date.getTime() + (86400000 * num)); 
            case 'w' :return new Date(date.getTime() + ((86400000 * 7) * num)); 
            case 'm' :return new Date(date.getFullYear(), (date.getMonth()) + num, date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds()); 
            case 'y' :return new Date((date.getFullYear() + num), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds()); 
        } 
    } 
     
    /**
    * 比较日期差 dtEnd 格式为日期型或者有效日期格式字符串
    * @param strInterval string  可选值 y 年 m月 d日 w星期 ww周 h时 n分 s秒 
    * @param dtStart Date  可选值 y 年 m月 d日 w星期 ww周 h时 n分 s秒
    * @param dtEnd Date  可选值 y 年 m月 d日 w星期 ww周 h时 n分 s秒
    */
    this.dateDiff = function(strInterval, dtStart, dtEnd) {  
        switch (strInterval) {  
            case 's' :return parseInt((dtEnd - dtStart) / 1000); 
            case 'n' :return parseInt((dtEnd - dtStart) / 60000); 
            case 'h' :return parseInt((dtEnd - dtStart) / 3600000); 
            case 'd' :return parseInt((dtEnd - dtStart) / 86400000); 
            case 'w' :return parseInt((dtEnd - dtStart) / (86400000 * 7)); 
            case 'm' :return (dtEnd.getMonth()+1)+((dtEnd.getFullYear()-dtStart.getFullYear())*12) - (dtStart.getMonth()+1); 
            case 'y' :return dtEnd.getFullYear() - dtStart.getFullYear(); 
        } 
    }
 
    /**
    * 字符串转换为日期对象
    * @param date Date 格式为yyyy-MM-dd HH:mm:ss，必须按年月日时分秒的顺序，中间分隔符不限制
    */
    this.strToDate = function(dateStr){
        var data = dateStr; 
        var reCat = /(\d{1,4})/gm;  
        var t = data.match(reCat);
        t[1] = t[1] - 1;
        eval('var d = new Date('+t.join(',')+');');
        return d;
    }
 
    /**
    * 把指定格式的字符串转换为日期对象yyyy-MM-dd HH:mm:ss
    *
    */
    this.strFormatToDate = function(formatStr, dateStr){
        var year = 0;
        var start = -1;
        var len = dateStr.length;
        if((start = formatStr.indexOf('yyyy')) > -1 && start < len){
            year = dateStr.substr(start, 4);
        }
        var month = 0;
        if((start = formatStr.indexOf('MM')) > -1  && start < len){
            month = parseInt(dateStr.substr(start, 2)) - 1;
        }
        var day = 0;
        if((start = formatStr.indexOf('dd')) > -1 && start < len){
            day = parseInt(dateStr.substr(start, 2));
        }
        var hour = 0;
        if( ((start = formatStr.indexOf('HH')) > -1 || (start = formatStr.indexOf('hh')) > 1) && start < len){
            hour = parseInt(dateStr.substr(start, 2));
        }
        var minute = 0;
        if((start = formatStr.indexOf('mm')) > -1  && start < len){
            minute = dateStr.substr(start, 2);
        }
        var second = 0;
        if((start = formatStr.indexOf('ss')) > -1  && start < len){
            second = dateStr.substr(start, 2);
        }
        return new Date(year, month, day, hour, minute, second);
    }
 
 
    /**
    * 日期对象转换为毫秒数
    */
    this.dateToLong = function(date){
        return date.getTime();
    }
 
    /**
    * 毫秒转换为日期对象
    * @param dateVal number 日期的毫秒数
    */
    this.longToDate = function(dateVal){
        return new Date(dateVal);
    }
 
    /**
    * 判断字符串是否为日期格式
    * @param str string 字符串
    * @param formatStr string 日期格式， 如下 yyyy-MM-dd
    */
    this.isDate = function(str, formatStr){
        if (formatStr == null){
            formatStr = "yyyyMMdd";   
        }
        var yIndex = formatStr.indexOf("yyyy");    
        if(yIndex==-1){
            return false;
        }
        var year = str.substring(yIndex,yIndex+4);    
        var mIndex = formatStr.indexOf("MM");    
        if(mIndex==-1){
            return false;
        }
        var month = str.substring(mIndex,mIndex+2);    
        var dIndex = formatStr.indexOf("dd");    
        if(dIndex==-1){
            return false;
        }
        var day = str.substring(dIndex,dIndex+2);    
        if(!isNumber(year)||year>"2100" || year< "1900"){
            return false;
        }
        if(!isNumber(month)||month>"12" || month< "01"){
            return false;
        }
        if(day>getMaxDay(year,month) || day< "01"){
            return false;
        }
        return true;  
    }
     
    this.getMaxDay = function(year,month) {    
        if(month==4||month==6||month==9||month==11)    
            return "30";    
        if(month==2)    
            if(year%4==0&&year%100!=0 || year%400==0)    
                return "29";    
            else    
                return "28";    
        return "31";    
    }    
    /**
    *   变量是否为数字
    */
    this.isNumber = function(str)
    {
        var regExp = /^\d+$/g;
        return regExp.test(str);
    }
     
    /**
    * 把日期分割成数组 [年、月、日、时、分、秒]
    */
    this.toArray = function(myDate) 
    {  
        myDate = arguments[0] || new Date();
        var myArray = Array(); 
        myArray[0] = myDate.getFullYear(); 
        myArray[1] = myDate.getMonth(); 
        myArray[2] = myDate.getDate(); 
        myArray[3] = myDate.getHours(); 
        myArray[4] = myDate.getMinutes(); 
        myArray[5] = myDate.getSeconds(); 
        return myArray; 
    } 
     
    /**
    * 取得日期数据信息 
    * 参数 interval 表示数据类型 
    * y 年 M月 d日 w星期 ww周 h时 n分 s秒 
    */
    this.datePart = function(interval, myDate) 
    {  
        myDate = arguments[1] || new Date();
        var partStr=''; 
        var Week = ['日','一','二','三','四','五','六']; 
        switch (interval) 
        {  
            case 'y' :partStr = myDate.getFullYear();break; 
            case 'M' :partStr = myDate.getMonth()+1;break; 
            case 'd' :partStr = myDate.getDate();break; 
            case 'w' :partStr = Week[myDate.getDay()];break; 
            case 'ww' :partStr = myDate.WeekNumOfYear();break; 
            case 'h' :partStr = myDate.getHours();break; 
            case 'm' :partStr = myDate.getMinutes();break; 
            case 's' :partStr = myDate.getSeconds();break; 
        } 
        return partStr; 
    } 
     
    /**
    * 取得当前日期所在月的最大天数 
    */
    this.maxDayOfDate = function(date) 
    {  
        date = arguments[0] || new Date();
        date.setDate(1);
        date.setMonth(date.getMonth() + 1);
        var time = date.getTime() - 24 * 60 * 60 * 1000;
        var newDate = new Date(time);
        return newDate.getDate();
    };
    return this;
}();

//Highcharts全局设置
$(function(){
    Highcharts.setOptions({
	lang: {
            weekdays:["星期日","星期一","星期二","星期三","星期四","星期五","星期六"],
            rangeSelectorZoom:"选择时间范围：",
            contextButtonTitle : '导出',
            printChart:'打印图表'
	}
    });
});
var Helper = function(){
    /**************************************************************************
    ajax GET 加载数据 
    @param : string url  
    @param {json} data json数据
    @paran :callable  callback 回调函数
     **************************************************************************/
    
    this.loadData = function (url,data,callback){
        var reqData = jQuery.extend({username:user, token:token}, data);
        $.ajax({
            type: "get",
            dataType: "json",
            url: url,
            cache: false,
            data : reqData,
            complete :function() {
                
            },
            success: function(msg){
                //console.log(reqData);
                callback(reqData, msg);
            }
        });
    };
    
    this.JSONLength = function (obj) {
        var size = 0, key;
        for (key in obj) {
            if (obj.hasOwnProperty(key)) size++;
        }
        return size;
    };
    
    this.groupMsg = function(msg, groupKey, itemValueKeys){        
        var data = {};
        var response = msg.response;
        for(i in response){
            if($.inArray(groupKey, itemValueKeys) === -1)
                var group = response[i][groupKey];
            else
                var group = groupKey;
            group = $.trim(group) == ''?'未知':group;
            if(data[group] === undefined)
                data[group] = [];
            var tmp = {};
            for(j in itemValueKeys)
                tmp[itemValueKeys[j]] = response[i][itemValueKeys[j]];
            data[group].push(tmp);
        };
        return data;
    };
    
    this.getGroupDataSeriesOptions = function(groupData, name, dateKey, hourKey){
        var seriesOptions = [];
        var flag = 0;
        dateKey = dateKey?dateKey:'stat_date';
        hourKey = hourKey?hourKey:'stat_hour';
        for(group in groupData){
            var data = [];
            groupData[group].reverse();
            $.each(groupData[group], function(i,ele){
                var d = DateUtil.strToDate(ele[dateKey]);
                var timestamp = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate());
                if(ele[hourKey] !== undefined){
                    d = DateUtil.strToDate(ele[dateKey] + ' '+ ele[hourKey]);
                    timestamp = Date.UTC(d.getFullYear(), d.getMonth(), d.getDate(), d.getHours());
                }
                data.push({x:timestamp, y:ele[name], compare:ele[name+'_compare']});
            });
            seriesOptions.push ({
                name: group,
                data: data,
                visible: flag === 0 ? true:false,
                selected: flag === 0 ? true:false
            });
            flag++;
        }
        return seriesOptions;
    };
    
    this.drawStockChart = function(container, title, options){
        var defaults = {
            rangeSelector: {
                inputEnabled: $('#' + container).width() > 480,
                buttons: [{
                        type: 'day',  
                        count: 1,  
                        text: '1天'  
                },{  
                        type: 'day',  
                        count: 3,  
                        text: '3天'  
                },{  
                        type: 'week',  
                        count: 1,  
                        text: '1周'  
                },{  
                        type: 'all',
                        text: '30天'  
                }], 
                inputDateFormat:'%Y-%m-%d',
                selected: 0
            },

            title : {
                text : title
            },
            subtitle: {
                text: 'Source: ku6.com'
            },
            credits: {
                    enabled: false
            },
            exporting:{
                    enabled:false
            },
            xAxis: {
                    type:'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        hour:"%H:%M",
                        day: '%Y-%m-%d',
                        month: '%m.%d',
                        year: '%b'
                    }
            },
            tooltip: {
                shared: true,
                crosshairs:true,
                xDateFormat: '%Y-%m-%d %H:%M',
                useHTML: true,
                headerFormat: '<b>{point.key}</b><table>',
                pointFormat: '<tr><td style="color: {series.color}"><span>\u25CF</span> {series.name}: </td>' +
                    '<td><b>{point.y}</b></td>'+
                    '<td><b>{point.compare}</b></td></tr>',
                footerFormat: '</table>'

            },
            plotOptions: {
                line: {
                    
                    enableMouseTracking: true
                }
            },
            series: []
        };
        var settings={};
        $.extend(true, settings, defaults, options);
        $('#' + container).highcharts('StockChart', settings);
    };
    
    this.drawCommonChart = function(container, title, options){
        var defaults = {
            title: {
                text: title,
                x: -20 //center
            },
            subtitle: {
                text: 'Source: ku6.com',
                x: -20
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
                    day: '%m.%d',
                    month: '%m.%d',
                    year: '%b'
                }
            },
            credits: {
                    enabled: false
            },
            exporting:{
                    enabled:false
            },
            plotOptions:{
                series: {
                    showCheckbox: true
                },
                line:{
                    events :{
                        checkboxClick: function(event) {
                            if(event.checked==true) {
                                this.show();
                            }
                            else {
                                this.hide();
                            }
                        },
                        legendItemClick:function(event) {//return false 即可禁用LegendIteml，防止通过点击item显示隐藏系列
                            return false;
                        }
                    }
                }
            },
            
            yAxis: {
                title: {
                    text: '数量 (次)'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                shared: true,
                xDateFormat: '%Y-%m-%d %A',
                crosshairs:true,
                useHTML: true,
                headerFormat: '<b>{point.key}</b><table>',
                pointFormat: '<tr><td style="color: {series.color}"><span>\u25CF</span> {series.name}: </td>' +
                    '<td><b>{point.y}</b></td>'+
                    '<td tyle="text-align: left;">对比前一天：<b>{point.compare}</b></td></tr>',
                footerFormat: '</table>'

            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0,
                itemMarginBottom:5,
                itemHiddenStyle: {
                    color: '#666'
                }
            },
            series: []
        };
        var settings = {};
        $.extend(true, settings, defaults, options);
        $('#' + container).highcharts(settings);
    };
    
    this.drawPieChart = function(container, title, options){
        var defaults = {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: title,
                x: -20 //center
            },
            subtitle: {
                text: 'Source: ku6.com',
                x: -20
            },
            credits: {
                    enabled: false
            },
            tooltip: {
                useHTML: true,
                headerFormat: '<b>{point.key}</b><table>',
                pointFormat: '<tr><td>{series.name}:<b>{point.y}</b></td>' +
                    '<td>对比前一天:<b>{point.compare}</b></td></tr>',
                footerFormat: '</table>'
            },
            exporting:{
                    enabled:false
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        format: '<b>{point.name}</b>:{point.percentage:.1f} %'
                    }
                }
            },
            series: []
        };
        var settings = {};
        $.extend(true, settings, defaults, options);
        $('#'+container).highcharts(settings);
    };
    
    this.drawColumnChar = function(container, title, options){
        var defaults ={
            chart: {
                type: 'column'
            },
            credits: {
                    enabled: false
            },
            exporting:{
                    enabled:false
            },
            legend: {
                enabled: false
            },
            title: {
                text: title
            },
            subtitle: {
                text: 'Source: data.ku6.com'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                min: 0,
                title: {
                    text: '数量 (个)'
                }
            },
            tooltip: {
                headerFormat: '<b>{point.key}</b><table>',
                pointFormat: '<tr><td style="color:{series.color};">{series.name}: </td>' +
                    '<td><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: false,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: []
        };
        var settings = {};
        $.extend(true, settings, defaults, options);
        $('#'+container).highcharts(settings);
    };
    
    this.drawTable = function (container, title, msg){
        var tableHtml = '';
        var rowNum = msg.response.length;//行数
        var columnNum = Helper.JSONLength(msg.response[0]);//列数
        console.log(columnNum);
        tableHtml += '<table>';
        //thead
        tableHtml += '<thead>';
        tableHtml += '<tr><th colspan="'+columnNum+'">' + title +'</th></tr>';
        tableHtml += '<tr>';
        for(var index in msg.response[0]){
            tableHtml += '<th>'+ index +'</th>';
        }
        tableHtml += '</tr>';
        tableHtml += '</thead>';
        
        //tbody
        tableHtml += '<tbody>';
        for(var k in msg.response){
            if(k !== 0 && k%2 !== 0){
                tableHtml += '<tr class="odd">';
            }else{
                tableHtml += '<tr>';
            }
            
            //console.log(msg.response[k]);
            for(var key in msg.response[k]){
                var tdClass = '';
                //日期是第一列
                if(key == 'stat_date') tdClass += 'column1';
                //字符串可以match 数字报错！
                if(!$.isNumeric(msg.response[k][key])&&msg.response[k][key] != null){
                    if(msg.response[k][key].match(/^-(.*)%$/)) tdClass += ' red';
                    if(msg.response[k][key].match(/^(.*)%$/)) tdClass += ' green';
                }
                tableHtml += '<td class="' + tdClass + '">';
                tableHtml += msg.response[k][key];
                tableHtml += '</td>';
            }
            
            tableHtml += '</tr>';
        }
        tableHtml += '</tbody>';
        
        tableHtml += '</table>';
        
        var Table = jQuery(tableHtml);
        jQuery("#" + container).html(Table);
    };
    
    
    return this;
    
}();


