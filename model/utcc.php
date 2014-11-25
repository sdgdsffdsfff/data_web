<?php
class UtccModel
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
    
    public function upload_video_distribution()
    {
       
        $sql = <<<EOF
            select `status`,count(1) as cnt 
            from Source_Video_Info where upload_create_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            GROUP BY `status`
EOF;
        return $this->getResult($sql);
    }
    
    public function transcoding_task_state_distribution()
    {
        $sql = <<<EOF
            SELECT transcode_status,COUNT(*) as cnt 
            from Task where task_create_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            group by transcode_status
EOF;
        return $this->getResult($sql);
    }
    
    public function transcoding_tasks_distribution($limit = 100)
    {
        $limit = intval($limit);
        if($limit < 0 || $limit > 100)
            $limit = 100;
        $sql = <<<EOF
            select transcode_server, count(1) as cnt 
            from Task where transcode_status=1 and task_create_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            group by transcode_server order by cnt desc limit {$limit}
EOF;
        return $this->getResult($sql);
    }
    
    public function transcoding_backlog_grouped_by_uploading_machine()
    {
        $sql = <<<EOF
            select upload_server,count(1) as num 
            from Task where transcode_status=0 and task_create_time>DATE_ADD(NOW(), INTERVAL -24 hour)
            GROUP BY upload_server ORDER BY num DESC
EOF;
        return $this->getResult($sql);
    }
    
    public function transcoding_timeconsuming_task()
    {
        $sql = <<<EOF
            select task_id,task_create_time,seg_count,round(play_time/1000) as play_time_secs,transcode_server,transcode_start_time,transcode_finish_time,(unix_timestamp(transcode_finish_time)-unix_timestamp(transcode_start_time)) as cost_secs
            from Task where transcode_status=2 and transcode_finish_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            order by cost_secs desc limit 10
EOF;
        return $this->getResult($sql);
    }
    public function dispatch_task_state_distribution()
    {
        $sql = <<<EOF
            SELECT dispatch_status,COUNT(*) as cnt 
            from Task where transcode_finish_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            group by dispatch_status
EOF;
        return $this->getResult($sql);
    }
    public function to_dispatch_and_dispatching_tasks_distribution()
    {
        $sql = <<<EOF
            select dispatch_src_ip, count(1) as cnt 
            from Task where dispatch_status in (1,2) and transcode_finish_time>DATE_ADD(NOW(), INTERVAL -24 hour) 
            group by dispatch_src_ip order by cnt desc limit 100
EOF;
        return $this->getResult($sql);
    }
    public function dispatch_timeconsuming_task()
    {
        $sql = <<<EOF
            select task_id,task_create_time,seg_count,round(play_time/1000) as play_time_secs,dispatch_src_ip,dispatch_start_time,dispatch_finish_time,(unix_timestamp(dispatch_finish_time)-unix_timestamp(dispatch_start_time)) as cost_secs
            from Task where dispatch_status in (1,2) and transcode_finish_time>DATE_ADD(NOW(), INTERVAL -24 hour)
            order by cost_secs desc limit 10
EOF;
        return $this->getResult($sql);
    }
    public function today_video_upload_source_distribution()
    {
        $sql = <<<EOF
            SELECT cfrom, count(*) as cnt 
            from Source_Video_Info where upload_create_time>date_format(current_date(),'%Y-%m-%d %H:%i:%s') and `status` in(402,403)
            group by cfrom ORDER BY cnt DESC
EOF;
        return $this->getResult($sql);
    }

}    

