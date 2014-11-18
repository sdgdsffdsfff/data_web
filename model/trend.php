<?php
class TrendModel
{
    /// Database Handler
    private $_db;

    /** 
     * constructor
     * 
     * @param db , database handler, Instance of oracle_db
     * 
     * @return 
     */
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function getResult($sql){
        $stid = $this->_db->query($sql);
        if($stid === NULL) return NULL;
        return $this->_db->fetchAll();
    }
    
    //站内vv时报数据
    public function in_vv_hour($d_offset = 30, $stat_date = 'ASC', $stat_hour = 'ASC')
    {
        $d_offset = intval($d_offset);
        if($d_offset < 0 || $d_offset > 90)
            $d_offset = 30;
        $orderOptions = ['ASC','DESC','asc','desc'];
        if(!in_array($stat_date, $orderOptions) || !in_array($stat_date, $orderOptions)){
            return [];
        }
        $sql = <<<EOF
            SELECT DATE_FORMAT(stat_date, '%Y-%m-%d') as stat_date, stat_hour,
            ifnull(vv_yesterday,0) as vv_yesterday, ifnull(vv,0) as vv, ifnull(concat(round(vv_compare/100,2),' %'),0)  as vv_compare,
            ifnull(uv_yesterday,0) as uv_yesterday, ifnull(uv,0) as uv, ifnull(uv,0) as uv, ifnull(concat(round(uv_compare/100,2),' %'),0) as uv_compare
            from ku6_report_hour where stat_date >= DATE_ADD(current_date(), INTERVAL -{$d_offset} day) 
            order by stat_date {$stat_date}, stat_hour {$stat_hour};
EOF;
        return $this->getResult($sql);
    }
    
    //ku6站内VV时报来源分析
    public function refer_in_vv_hour($d_offset = 1, $stat_date = 'DESC', $stat_hour = 'DESC')
    {
        $d_offset = intval($d_offset);
        $orderOptions = ['ASC','DESC','asc','desc'];
        if(!in_array($stat_date, $orderOptions) || !in_array($stat_date, $orderOptions)){
            return [];
        }
        $sql = <<<EOF
            SELECT stat_date,stat_hour,refer,
            ifnull(uv,0) as uv, ifnull(concat(round(uv_compare /100,2),' %'),0) as uv_compare,
            ifnull(vv,0) as vv, ifnull(concat(round(vv_compare /100,2),' %'),0) as vv_compare
            FROM ku6_report_refer_hour
            WHERE  stat_date = DATE_ADD(current_date(), INTERVAL -{$d_offset} day) 
            order by stat_date {$stat_date}, stat_hour {$stat_hour}, vv desc
EOF;
        return $this->getResult($sql);
    }
}    

