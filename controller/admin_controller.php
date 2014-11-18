<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');

class AdminController extends WebController
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

    // TODO 确认login
    // 高层报表
    public function login(){
        echo $this->gene_default_display($this->LANG['login'], 'login2.tpl');
    }

    public function show_login()
    {
        $msg = isset($_SESSION['errmsg']) ? $_SESSION['errmsg'] : '';
        $_SESSION['errmsg'] = '';
        $this->gene_default_display($this->LANG['login'], 'login.tpl', array('error' => $msg));
        return;
    }

}
