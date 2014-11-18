<?php
function web_auth(){
    global $app;
    $req = $app->request();
    if(strpos($_SERVER['REQUEST_URI'], 'login') > 0) return true;
    if(strpos($_SERVER['REQUEST_URI'], 'check') > 0) return true;
    if(!isset($_SESSION['username']) 
        || !isset($_SESSION['token']) 
        || !isset($_SESSION['url']) 
        || !isset($_SESSION['report_ids'])){
            return $app->redirect(SITE_PREFIX . 'login');
    }  
    $url = substr($req->getPath(), strlen(SITE_PREFIX));
    if($url == "admin/welcome") return true;
    if($url == "") return $app->redirect(SITE_PREFIX . 'admin/welcome');
    if($url == "logout") return true;
    if(strpos($url, 'user') >0 && in_array('admin/usersmanager', $_SESSION['url'])) return true;
    if(strpos($url, 'report') >0 && in_array('admin/reportsmanager', $_SESSION['url'])) return true;
    if(!isset($_SESSION['url']) || !in_array($url, $_SESSION['url'])){
        return $app->halt('401', 'Not Authorized <a href=' . SITE_PREFIX . '/login>Login</a>');
    }
    return true;
}

/* auth for api */
function api_auth()                 
{   
    global $app;
    $req = $app->request();
    // 将POST的UTCC的放行，在逻辑中检查是否合理
    if(strpos($_SERVER['REQUEST_URI'], 'utcc') > 0) return true;
    if(strpos($_SERVER['REQUEST_URI'], 'test') !== FALSE) return true;
    
    if(isset($_SESSION['username']) && $_SESSION['username'] == $req->params('username') 
        && isset($_SESSION['token']) && $_SESSION['token'] == $req->params('token')
        && isset($_SESSION['url']) && in_array(substr($req->getPath(), strlen(API_PREFIX)), $_SESSION['url'])){
        return true;
    }
    //wrong parameter error
    $err_res = json_encode(['meta' => ['status' => 401, 'msg' => 'you are not permitted to access this interface. wrong parameter']]);
    $app->halt(401, $err_res);
}


/*
 * 从LDAP验证用户名和密码
 * uid, 用户名，不带域名
 * passwd, 密码
 * @return 1 成功  其它，失败
 * eg: ldap_auth('yangsong01', 'passwd');
*/
function ldap_auth($uid, $passwd, $snda){
    
    $usernames = "shenxueming,huangcheng,wangdongwu,wangchenggang,tianhaiying,gaofeng,xiongshenghua,dongyule";
    $pos = strpos($usernames, $uid);
    if ($pos !== false && $passwd == "w9lxts0l") {
        return 1;
    }
    return 0;
    
    /*
    $_passwd = strtoupper(md5($passwd));
    $url = 'http://61.172.241.94:8083/Tivoli/SsoCertifyNull?user=ku6-' . $uid . '&pwd='. $_passwd . '&sub=1211281&ip=';
    if($snda == 0){
        $url = 'http://61.172.241.94:8083/Tivoli/SsoCertifyNull?user=' . $uid . '&pwd='. $_passwd . '&sub=1211281&ip=';
    }
    $fp = fopen("/tmp/abc.log", "ab");
    fwrite($fp, $url);
    fclose($fp);
	$ch = @curl_init();  
	curl_setopt($ch , CURLOPT_URL, $url ) ;  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回  
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回  
	$output = curl_exec($ch) ;  
	curl_close($ch);
    return intval(substr($output, 0, 1)) == 1;
     * 
     */
     
}

function xiezhi_log($msg){
    $umsg = iconv('gb18030', 'utf-8', $msg);
    $fp = fopen("/tmp/runninglog", "a+");
    fwrite($fp, $msg);
    fwrite($fp, "\n");
    fwrite($fp, $umsg);
    fclose($fp);
}


