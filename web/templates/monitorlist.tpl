{include file='header.tpl'}
    <!-- Right Side/Main Content Start -->
    <div id="rightside">
<div class="contentcontainer">
    <div class="headings altheading">
        <h2>{$title}</h2>
    </div>
    <div class="contentbox" id="table">
        <div>
            <input type="button" class="btn" id="btn_add_user_group" value="添加新监控" />
        </div>
        <table width="100%">
            <tbody>
                <tr>
                    <td>日报名</td>
                    <td>检测语句</td>
                    <td>时间间隔</td>
                    <td>执行日(月)</td>
                    <td>执行日(周)</td>
                    <td>执行时</td>
                    <td>执行分</td>
                    <td>最近执行时间</td>
                    <td>执行次数</td>
                    <td>删除</td>
                </tr>
                {foreach from=$list item=item}
                <tr>
                    <td>{$item['name']}</td>
                    <td>{$item['query_sql']}</td>
                    <td>{$item['cinterval']}</td>
                    <td>{$item['month_day']}</td>
                    <td>{$item['week_day']}</td>
                    <td>{$item['hour']}</td>
                    <td>{$item['minute']}</td>
                    <td>{$item['exec_time']}</td>
                    <td>{$item['exec_count']}</td>
                    <td><a href="{$SITE_PREFIX}admin/delmonitor/id/{$item['tid']}">删除</a></td>
                </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>
</div>
    <div class="notifibox" id="new_user_group" style="left: 769.5px; position: absolute; top: 52px; z-index: 9999; display: none;">
        <h4>添加新监控</h4>
        <form action="{$SITE_PREFIX}admin/monitor" method="post">
        <ul>
            <li>
            <input type="text" placeholder="report_id" name="rid" class="inputbox" />
            </li>
            <li>
            <input type="text" placeholder="query_sql" name="query_sql" class="inputbox" />
            </li>
            <li>
            <label for="textfiled" style="width:80px;">
                <strong>时间间隔</strong>
            <select name="cinterval" id="intval_selector">
            <option value="1">月</option>
            <option value="2">周</option>
            <option value="3">日</option>
            <option value="4">时</option>
            </select></label>
            </li>
            <li>
            <label for="textfiled" style="width:80px;">
                <strong>选择器</strong>
            <div id="month_selector">
            <select name="month_day">
            {$index = 0}
            {while $index < 32}
            <option value="{$index}">{$index}</option>
            {$index++}
            {/while}
            </select>日
                </div>
            <div id="week_selector">
            周
            <select name="week_day">
            {$index = 1}
            {while $index < 8}
            <option value="{$index}">{$index}</option>
            {$index++}
            {/while}
            </select>
                </div>
            <div id="day_selector">
            <select name="hour">
            {$index = 0}
            {while $index < 24}
            <option value="{$index}">{$index}</option>
            {$index++}
            {/while}
            </select>时
                </div>
            <div>
            <select name="minute" id="hour_selector">
            {$index = 0}
            {while $index < 60}
            <option value="{$index}">{$index}</option>
            {$index++}
            {/while}
            </select>分
            </div>
             </label>
            </li>
            <li>
                <input type="submit" class="btn" value="创建" />
            </li>
        </ul>
        </form>
    </div>
<script>
$(document).ready(function(){
    $('#week_selector').hide();
    $('#btn_add_user_group').click(function(){
        $('#new_user_group').bPopup();
    });
$('#intval_selector').change(function(){
    var new_id = 'month_selector';
    switch(parseInt($(this).val())){
    case 1: { 
        $('#week_selector').hide();
        $('#month_selector').show();
        $('#day_selector').show();
        $('#hour_selector').show();
    } break;
    case 2: {   
        $('#week_selector').show();
        $('#month_selector').hide();
        $('#day_selector').show();
        $('#hour_selector').show();
    } break;
    case 3: { 
        $('#week_selector').hide();
        $('#month_selector').hide();
        $('#day_selector').show();
        $('#hour_selector').show();
    } break;
    case 4: { 
        $('#week_selector').hide();
        $('#month_selector').hide();
        $('#day_selector').hide();
        $('#hour_selector').show();
    } break;
    }
});
        
});

</script>
{include file='footer.tpl'}
