{include file='header.tpl'}
<script>
function draw_graphic(data)
{
   // var _index = prepare_data(data, '站外');
   // console.log(_index);
    data['AA展示'] = convert(data['AA展示']);
    data['AA安装'] = convert(data['AA安装']);
    data['AA下载'] = convert(data['AA下载']);
    data['AA点击'] = convert(data['AA点击']);
    data['AA展示比昨日'] = convert(data['AA展示比昨日']);
    data['AA视频播放'] = convert(data['AA视频播放']);
    data['CTR'] = convert(data['CTR']);
    data['CV'] = convert(data['CV']);
    data['IV'] = convert(data['IV']);
    data['PV'] = convert(data['PV']);
    data['UV'] = convert(data['UV']);
    data['VV'] = convert(data['VV']);
    data['VVAUV'] = convert(data['VVAUV']);
    data['广告覆盖率(有广告的IV/IV)'] = convert(data['广告覆盖率(有广告的IV/IV)']);
    data['直接UV'] = convert(data['直接UV']);
    data['视频VV比昨日'] = convert(data['视频VV比昨日']);
    data['视频播放成功率(成功VV/总VV)'] = convert(data['视频播放成功率(成功VV/总VV)']);
    data['PVAUV'] = convert(data['PVAUV']);

    data['DATA_DESC'] = convert_date(data['DATA_DESC']);
    //console.log(data);
    var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'grapha',
                type: 'line'
            },
            title: {
                text: '核心数据日报'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: data['DATA_DESC']
            },
            yAxis: {
                title: {
                    text: '次数'
                },
                gridLineWidth: 0,
                alternateGridColor: null,
            },
            tooltip: {
                formatter: function() {
                        return ''+
                        this.x +': '+ this.y +' 次';
                }
            },
            plotOptions: {
                spline: {
                    lineWidth: 4,
                    states: {
                        hover: {
                            lineWidth: 5
                        }
                   },
                    marker: {
                        enabled: false,
                        states: {
                            hover: {
                                enabled: true,
                                symbol: 'circle',
                                radius: 5,
                                lineWidth: 1
                            }
                        }
                    },
                }
            },
            series: [{
                name: 'AA安装',
                data: data['AA安装']
            }, {
                name: 'AA展示',
                data: data['AA展示']
            }, {
                name: 'AA下载',
                data: data['AA下载']
            },
            {
                name: 'AA展示比昨日',
                data: data['AA下载']
            },
            {
                name: 'AA点击',
                data: data['AA下载']
            },
            {
                name: 'AA视频播放',
                data: data['AA视频播放']
            },
            {
                name: 'CTR',
                data: data['CTR']
            },
            {
                name: 'CV',
                data: data['CV']
            },
            {
                name: 'IV',
                data: data['IV']
            },
            {
                name: 'PV',
                data: data['PV']
            },
            {
                name: 'PVAUV',
                data: data['PVAUV']
            },
            {
                name: 'UV',
                data: data['UV']
            },
            {
                name: 'VV',
                data: data['VV']
            },
            {
                name: 'VVAUV',
                data: data['VVAUV']
            },
            {
                name: '广告覆盖率(有广告的IV/IV)',
                data: data['广告覆盖率(有广告的IV/IV)']
            },
            {
                name: '直接UV',
                data: data['直接UV']
            },
            {
                name: '视频VV比昨日',
                data: data['视频VV比昨日']
            },
            {
                name: '视频播放成功率(成功VV/总VV)',
                data: data['视频播放成功率(成功VV/总VV)']
            }],
            navigation: 
            {
                menuItemStyle: 
                {
                    fontSize: '10px'
                }
            }
    });

var i;
var  tableHtml = "";
tableHtml = "<table width='100%'><tr><td>日期<td>";
for(i in data['DATA_DESC'])
{
    tableHtml += "<td>" + data['DATA_DESC'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>AA下载<td>";
for(i in data['AA下载'])
{
    tableHtml += "<td>" + data['AA下载'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>AA安装<td>";
for(i in data['AA安装'])
{
    tableHtml += "<td>" + data['AA安装'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>AA展示<td>";
for(i in data['AA展示'])
{
    tableHtml += "<td>" + data['AA展示'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>AA展示比昨日<td>";
for(i in data['AA展示比昨日'])
{
    tableHtml += "<td>" + data['AA展示比昨日'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>AA点击<td>";
for(i in data['AA展示比昨日'])
{
    tableHtml += "<td>" + data['AA点击'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>AA视频播放<td>";
for(i in data['AA展示比昨日'])
{
    tableHtml += "<td>" + data['AA视频播放'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>CTR<td>";
for(i in data['CTR'])
{
    tableHtml += "<td>" + data['CTR'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>CV<td>";
for(i in data['CV'])
{
    tableHtml += "<td>" + data['CV'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>IV<td>";
for(i in data['IV'])
{
    tableHtml += "<td>" + data['IV'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>PV<td>";
for(i in data['PV'])
{
    tableHtml += "<td>" + data['PV'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>PVAUV<td>";
for(i in data['PVAUV'])
{
    tableHtml += "<td>" + data['PVAUV'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>UV<td>";
for(i in data['UV'])
{
    tableHtml += "<td>" + data['UV'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>VV<td>";
for(i in data['VV'])
{
    tableHtml += "<td>" + data['VV'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>VVAUV<td>";
for(i in data['VVAUV'])
{
    tableHtml += "<td>" + data['VVAUV'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>广告覆盖率(有广告的IV/IV)<td>";
for(i in data['广告覆盖率(有广告的IV/IV)'])
{
    tableHtml += "<td>" + data['广告覆盖率(有广告的IV/IV)'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>直接UV<td>";
for(i in data['直接UV'])
{
    tableHtml += "<td>" + data['直接UV'][i] +  "</td>";
}
tableHtml += "</tr><tr class='alt'>";
tableHtml += "<td>视频VV比昨日<td>";
for(i in data['视频VV比昨日'])
{
    tableHtml += "<td>" + data['视频VV比昨日'][i] +  "</td>";
}
tableHtml += "</tr><tr>";
tableHtml += "<td>视频播放成功率(成功VV/总VV)<td>";
for(i in data['视频播放成功率(成功VV/总VV)'])
{
    tableHtml += "<td>" + data['视频播放成功率(成功VV/总VV)'][i] +  "</td>";
}
tableHtml += "</tr></table>";
var Table = jQuery(tableHtml);
jQuery("#table").append(Table);
}

$(document).ready(function(){
        load_data("{$API_PREFIX}hl/vhl/core_data_daily", parse_page);
});
 </script>
{include file='footer.tpl'}

