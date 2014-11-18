<?php

var_dump($_SESSION);

$url = ( $_SERVER['REQUEST_URI']);
print_r(parse_url($url));
/*
if(!isset($_SESSION)){
    session_start();
}

$str = '';
if(isset($_SESSION["welcome"])){
    //检查$welcome变量是否注册 
    $str = "welcome变量已经注册了!"; 
}
else{ 
    $str = "welcome变量还没有注册!"; 
    $_SESSION["welcome"] = 1;
}
echo $str;
echo 'xx';
 */
?>
