function convert_time(php_time){
    var d = new Date(php_time * 1000);
    var date_str = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
    var hour = d.getHours();
    var minute = d.getMinutes();
    var second = d.getSeconds();
    hour = hour.toString().length == 1 ? "0" + hour : hour;
    minute = minute.toString().length == 1 ? "0" + minute : minute;
    second = second.toString().length == 1 ? "0" + second : second;
    var time_str = date_str + ' ' + hour + ":" + minute + ":" + second;
    return time_str;
}

