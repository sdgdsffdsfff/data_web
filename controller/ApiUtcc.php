<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}

class ApiUtccController extends BaseController
{
    public $utccModel;
    public function __construct($app)
    {
        parent::__construct($app);

        $this->utccModel = new UtccModel($app->db_new_utcc);
        
    }
    public function upload_video_distribution(){
        $this->ok($this->utccModel->upload_video_distribution());
    }
    
    public function transcoding_task_state_distribution(){
        $this->ok($this->utccModel->transcoding_task_state_distribution());
    }
    
    public function transcoding_tasks_distribution(){
        $params = $this->params([
            'limit' => 100
        ]);
        $this->ok($this->utccModel->transcoding_tasks_distribution($params['limit']));
    }
    
    public function transcoding_backlog_grouped_by_uploading_machine(){
       
        $this->ok($this->utccModel->transcoding_backlog_grouped_by_uploading_machine());
    }
    
    public function transcoding_timeconsuming_task(){
       
        $this->ok($this->utccModel->transcoding_timeconsuming_task());
    }
    public function dispatch_task_state_distribution(){
       
        $this->ok($this->utccModel->dispatch_task_state_distribution());
    }
    public function to_dispatch_and_dispatching_tasks_distribution(){
       
        $this->ok($this->utccModel->to_dispatch_and_dispatching_tasks_distribution());
    }
    public function dispatch_timeconsuming_task(){
       
        $this->ok($this->utccModel->dispatch_timeconsuming_task());
    }
    public function today_video_upload_source_distribution(){
       
        $this->ok($this->utccModel->today_video_upload_source_distribution());
    }
    public function transcoding_fails_task_distribution(){
       
        $this->ok($this->utccModel->transcoding_fails_task_distribution());
    }
}
