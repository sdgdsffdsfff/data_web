<?php
class UserModel
{

    private $_db;
    public function __construct($db){
        $this->_db = $db;
    }

    //check ip format
    public function check_ip($ip){
        return true;
    }
    public function add_user_old($username, $ip, $gid = 3){
        $_ip = 0;
        if($this->check_ip($ip)){
            $_ip = ip2long($ip);
        }
        else{
            //echo 'wrong ip';
            return ;
        }
        //date_default_timezone_set('Asia/Chongqing');
        //$time = date('Y-m-d H:i:s',time());
        //$data = array('name' => $username, 'lastlogin' => $time, 'lastloginip' => $_ip);
        $data = array('name' => $username, 'lastloginip' => $_ip, 'gid' => $gid);
        $table = 'xiezhi.users';
        $insert_id = $this->_db->insert(USER_TABLE, $data);
        return $insert_id;
    }

    public function add_user($username, $nickname, $email, $ip, $gid = 3){
        $_ip = 0;
        $_ip = ip2long($ip);
        //date_default_timezone_set('Asia/Chongqing');
        //$time = date('Y-m-d H:i:s',time());
        //$data = array('name' => $username, 'lastlogin' => $time, 'lastloginip' => $_ip);
        $data = array('name' => $username, 'nickname' => $nickname, 'email' => $email, 'lastloginip' => $_ip, 'gid' => $gid);
        //$table = 'xiezhi.users';
        $insert_id = $this->_db->insert(USER_TABLE, $data);
        return $insert_id;
    }


    /**
     * if user exists
     *  return user_id
     * else 
     *  return 0
     */
    public function get_user_id($username){
        $sql = 'select id from ' . USER_TABLE . ' where name="'.$username.'" ';
        $uid = $this->_db->queryOne($sql);
        $uid = (int)$uid['id'];
        return $uid;
    }


    public function delete_user($user_id){
        //delete user in table users
        //delete user_privilege in table privates
        $this->_db->query('begin');
        $sql = 'delete from ' . USER_TABLE . ' where id='.$user_id;
        $sql1 = 'delete from ' . PRIVATES_TABLE . ' where uid='.$user_id;
        $res = $this->_db->query($sql);
        $res1 = $this->_db->query($sql1);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return TRUE;
    }

    /**
     * if user_id exists
     *  return 1
     * else
     *  return true
     */
    public function update_login_info($user_id, $ip){
        $ip = ip2long($ip);
        $current_time = date('Y-m-d H:i:s');
        $data = array('lastlogin' => $current_time, 'lastloginip' => $ip);
        $where = 'id = '.$user_id;

        $this->_db->query('begin');
        $ucount = $this->_db->update(USER_TABLE, $data, $where);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return $ucount;
    }

    /**
     * if user exists
     *    return user_id
     * else 
     *    return 0
     */
    public function get_update_login_info($username, $ip){
        $user_id = $this->get_user_id($username);
        if($user_id == 0){ //no such user
            return 0;
        }
        $this->_db->query('begin');
        $this->update_login_info($user_id, $ip);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return $user_id;
    }


    /**
     * return report id array, if one, return an array with one element
     */
    public function get_privilege($user_id){
        $sql = 'select distinct rid from ( '
             . ' select distinct b.pid rid '
             . ' from ( select rid from ' . PRIVATES_TABLE . ' where uid = '.$user_id.' ) a '
             . ' join ' . REPORT_TABLE . ' b on a.rid = b.id '
             . ' union all '
             . ' select rid from ' . PRIVATES_TABLE . ' where uid = '.$user_id
             . ') x';
         
        $report_ids = $this->_db->queryAll($sql);
        $rids = array();
        foreach( $report_ids as $item){
            $rids[] = (int)$item['rid'];
        }
        return $rids;

    }

    /**
     * return url array, if one, return an array with one element
     */
    public function get_privilege_url($user_id){
        $sql = 'select a.id rid, a.code url from '. REPORT_TABLE .' a '
            .' join '. PRIVATES_TABLE .' b '
            .' on a.id = b.rid '
            .' where b.uid='.$user_id;
        
        $report_ids = $this->_db->queryAll($sql);
        $url = array();
        foreach( $report_ids as $item){
            $url[] = $item['url'];
        }
        return $url;

    }

    /**
     * @params report_id can be array or just one id
     */
    public function add_privilege($user_id, $report_id){
        $user_id = trim($user_id);
        if(!is_array($report_id)){
            $report_id = trim($report_id);
            $data = array('uid' => $user_id, 'rid' => $report_id);
            return $this->_db->insert(PRIVATES_TABLE, $data);
        }
        //1. check duplicated values
        $rids = implode(', ', $report_id);

        //transaction begin------------------------------------
        $this->_db->query('begin');
        $sql = 'select rid from '. PRIVATES_TABLE .' where uid='. $user_id
            .' and rid in ('. $rids .' )';
        $res = $this->_db->queryAll($sql);
        //var_dump($res);
        $rids = array();
        foreach( $res as $item){
            $rids[] = (int)$item['rid'];
        }
        //2. remove dup
        //remove rid rom report_id
        $report_id = array_diff($report_id, $rids);
        //3. insert un duplicated values
        $sql = 'insert into ' . PRIVATES_TABLE . ' (`uid`, `rid`) values';
        $values = '';
        foreach($report_id as $id){
            $values .= "($user_id , $id),";
        }
        $values = substr($values, 0, -1);
        $sql .= $values;
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        //transaction end--------------------------------------------
        //die($sql);
        return $this->_db->query($sql);
    }

    public function delete_privilege($user_id){
            $this->_db->query('begin');
            $sql = 'delete from ' . PRIVATES_TABLE . ' where uid=' . $user_id;
            $res = $this->_db->query($sql);
            if( $this->_db->get_errno() ){
                $this->_db->query('rollback');
                return FALSE;
            }
            $this->_db->query('commit');
            return $res;
    }
    /*
    public function delete_privilege($user_id, $report_id){
        $table = 'privates';
        if(!is_array($report_id)){
            $this->_db->query('begin');
            $sql = 'delete from ' . PRIVATES_TABLE . ' where uid=' . $user_id . ' and rid=' . $report_id;
            $res = $this->_db->query($sql);
            if( $this->_db->get_errno() ){
                $this->_db->query('rollback');
                return FALSE;
            }
            $this->_db->query('commit');
            return $res;
        }
        $sql = 'delete from ' . PRIVATES_TABLE . ' where uid=' . $user_id . ' and rid in (';
        //$rids = '';
        //foreach($report_id as $id){
        //    $rids .= $id.", ";
        //}
        //$rids = substr($rids, 0, -2);
        //$rids = implode(', ', $report_id);
        //$sql .= $rids. ")";
        //die($sql);
        $this->_db->query('begin');
        $res = $this->_db->query($sql);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return $res;
    }
     */


    public function get_user_list(){
        $sql = "SELECT * FROM  `" . USER_TABLE . "` LEFT JOIN " . USER_GROUP_TABLE . " ON ". USER_TABLE .".gid = " . USER_GROUP_TABLE . ".gid";
        return $this->_db->queryAll($sql);
    }

    public function updateuser($row, $uid){
        return $this->_db->update(USER_TABLE, $row, 'id=' . $uid);
    }

    public function get_user_by_id($uid){
        return $this->_db->queryOne("SELECT * FROM " . USER_TABLE . " WHERE id=$uid");
    }

}
