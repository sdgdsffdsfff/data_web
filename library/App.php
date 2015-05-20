<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
class App {

    const APP_LOADER_CONTROLLER	= 'Controller';
    const APP_LOADER_MODEL = 'Model';

    const APP_LIBRARY_DIRECTORY_NAME = 'library';
    const APP_CONTROLLER_DIRECTORY_NAME= 'controller';
    const APP_MODEL_DIRECTORY_NAME= 'model';

    public static function registerAutoloader(){

        spl_autoload_register("App::autoload");
    }

    protected static function autoload($class)
    {
        $className = $class;
        if (
            class_exists($className, false)
            ||
            interface_exists($className, false)
        ) {
            return true;
        }
        $directory = '';
        if (App::isCategoryType($class, self::APP_LOADER_MODEL)) {
            //this is a model
            $directory = CODE_BASE .
                DIRECTORY_SEPARATOR .
                self::APP_MODEL_DIRECTORY_NAME .
                DIRECTORY_SEPARATOR;
            $class = App::resolveCategory(
                $class, self::APP_LOADER_MODEL
            );
        }  else if (App::isCategoryType($class, self::APP_LOADER_CONTROLLER)) {
            //this is a controller
            $directory = CODE_BASE .
                DIRECTORY_SEPARATOR .self::APP_CONTROLLER_DIRECTORY_NAME;
            $class = App::resolveCategory(
                $class, self::APP_LOADER_CONTROLLER
            );
        } else {
            //this is used library
            $directory = CODE_BASE .
                DIRECTORY_SEPARATOR .self::APP_LIBRARY_DIRECTORY_NAME;
        }
        $file = $directory.DIRECTORY_SEPARATOR.$class.'.php';
        if (is_file($file)) {

            include $file;

        }

        return true;
    }

    private static function isCategoryType($className, $category)
    {

        //we should check at the end of the class name
        if (
            $category == substr(
                $className,
                strlen($className)-strlen($category),
                strlen($category)
            )
        ) {
            return true;
        }

        return false;

    }

    private static function resolveCategory($className, $category)
    {
        //we should remove from the end of classname
        return substr(
            $className,
            0,
            strlen($className)-strlen($category)

        );

    }

    public static function auth($email, $password){
        //return App::ldap_auth($email, $password);
    }

    /*
     * 从LDAP验证用户名和密码
     */
    public static function ldap_auth($email, $password){
        /*
        $usernames = "shenxueming,huangcheng,wangdongwu,wangchenggang,tianhaiying,gaofeng,xiongshenghua,dongyule";
        $pos = strpos($usernames, $uid);
        if ($pos !== false && $passwd == "w9lxts0l") {
            return 1;
        }
        return 0;
        */

        require __DIR__ . '/Xxtea.php';
        $encryptpassword = base64_encode(xxtea_encrypt($password, XXTEA_KEY));
        $encryptpassword = str_replace('+', '-', $encryptpassword);
        $encryptpassword = str_replace('/', '_', $encryptpassword);
        $encryptpassword = str_replace('=', '.', $encryptpassword);
        $url = "http://122.11.33.16:8081/ldap.jsp?email={$email}&pwd={$encryptpassword}";
        $ch = @curl_init();
        curl_setopt($ch , CURLOPT_URL, $url ) ;
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
        $output = curl_exec($ch) ;
        curl_close($ch);
        $result = @json_decode($output, true);

        if(isset($result['status'])){
            switch ($result['status']) {
                case 1:
                    return true;
                default:
                    return false;
            }
        }
        return false;
    }

    public static function resolveSqlInCondition($str,$itemIsNum = true){
        $arrItem = preg_split('/\s+/',$str);
        if($itemIsNum){
            return join(",",$arrItem);
        }else{
            return "'".join("','",$arrItem)."'";
        }
    }

}