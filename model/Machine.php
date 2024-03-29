<?php
class MachineModel
{
    public function __construct($db){
        $this->_db = $db;
    }
    public function delete($id,$ip){
        //delete machine in table machineinfo
        //delete hardware in table hardware
        $id = intval($id);
        //$ip = filter_var($ip, FILTER_VALIDATE_IP);

        $this->_db->query('begin');
        $sql = "DELETE FROM  machineinfo WHERE id = {$id}";
        $sql1 = "DELETE FROM hardware where ip = '{$ip}'";
        $this->_db->query($sql);
        $this->_db->query($sql1);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return TRUE;
    }

    public function add($row){

        $this->_db->query('begin');
        $res = $this->_db->insert('machineinfo', $row);
        $res2 = $this->_db->insert('hardware', ['ip'=>$row['ip']]);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return TRUE;
    }
    
    public function getUserList() {
        $sql = "SELECT * from userInfo";
        return $this->_db->queryAll($sql);
    }
    
    public function userAdd($row) {
        if($this->_db->insert('userInfo', $row) === -1)
            return false;
        return true;
    }
    public function userDelete($id) {
        $sql = "DELETE FROM userInfo where id = {$id}";
        if($this->_db->query($sql)){
            return true;
        }
        return false;
    }
    
}
