<?php
class MachineModel
{
    public function __construct($db){
        $this->_db = $db;
    }
    public function get_machine_list(){
        return $this->_db->queryAll("SELECT * FROM  machineinfo order by createtime");
    }
    public function delete($id,$ip){
        return false;
        //delete machine in table machineinfo
        //delete hardware in table hardware
        $id = intval($id);
        $ip = filter_var($ip, FILTER_VALIDATE_IP);
        if($ip === false)
                return false;
        $this->_db->query('begin');
        $sql = "DELETE FROM  machineinfo WHERE id = {$id}";
        $sql1 = "DELETE FROM hardware where ip = $ip";
        $res = $this->_db->query($sql);
        $res1 = $this->_db->query($sql1);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return TRUE;
    }

    public function new_machine($row){
        return $this->_db->insert(REPORT_TABLE, $row);
    }

}
