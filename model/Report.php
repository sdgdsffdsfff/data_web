<?php
class ReportModel
{
    public function __construct($db){
        $this->_db = $db;
    }
    public function get_report_list(){
        return $this->_db->queryAll("SELECT * FROM  " . REPORT_TABLE . " ORDER BY pid ASC");
    }
    public function rm_reports($pid){
        //delete user in table report
        //delete user_privilege in table privates
        $this->_db->query('begin');
        $sql = "DELETE FROM  " . REPORT_TABLE . " WHERE pid = $pid or id = $pid";
        $sql1 = "DELETE FROM " . PRIVATES_TABLE . " where rid = $pid";
        $res = $this->_db->query($sql);
        $res1 = $this->_db->query($sql1);
        if( $this->_db->get_errno() ){
            $this->_db->query('rollback');
            return FALSE;
        }
        $this->_db->query('commit');
        return TRUE;
    }

    public function newreport($row){
        return $this->_db->insert(REPORT_TABLE, $row);
    }

}
