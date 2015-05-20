<?php

class UserGroupModel {
    /// Database Handler
    private $_db;

    /** 
     * constructor
     * 
     * @param db , database handler, Instance of mysql_db 
     * 
     * @return 
     */
    public function __construct($db)
    {
        $this->_db = $db;
    }


    public function add_group($row){
        $gid = $this->_db->insert(USER_GROUP_TABLE, $row);
        return $gid;
    }
    public function del_group($where){
        // 啥都不指定，太危险，不这么玩
        if(!trim($where)) return;
        $sql = "DELETE FROM " . USER_GROUP_TABLE . " WHERE gid=" . $where;
        return $this->_db->query($sql);
    }

    public function list_group(){
        return $this->_db->queryAll("SELECT * FROM " . USER_GROUP_TABLE);
    }
}
