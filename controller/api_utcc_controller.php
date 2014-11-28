<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
require_once(CODE_BASE . 'model/utcc.php');
class ApiUtccController extends BaseController
{
    public $utccModel;
    public function __construct($app)
    {
        parent::__construct($app);
        $this->_db = $this->_app->config('mysql_utcc_db');
        $this->utccModel = new UtccModel($this->_db);
        
    }
    public function upload_video_distribution(){
        echo $this->format_obj_response($this->utccModel->upload_video_distribution());
    }
    
    public function transcoding_task_state_distribution(){
        echo $this->format_obj_response($this->utccModel->transcoding_task_state_distribution());
    }
    
    public function transcoding_tasks_distribution(){
        $params = $this->get_param_from_all([
            'limit' => 100
        ]);
        echo $this->format_obj_response($this->utccModel->transcoding_tasks_distribution($params['limit']));
    }
    
    public function transcoding_backlog_grouped_by_uploading_machine(){
       
        echo $this->format_obj_response($this->utccModel->transcoding_backlog_grouped_by_uploading_machine());
    }
    
    public function transcoding_timeconsuming_task(){
       
        echo $this->format_obj_response($this->utccModel->transcoding_timeconsuming_task());
    }
    public function dispatch_task_state_distribution(){
       
        echo $this->format_obj_response($this->utccModel->dispatch_task_state_distribution());
    }
    public function to_dispatch_and_dispatching_tasks_distribution(){
       
        echo $this->format_obj_response($this->utccModel->to_dispatch_and_dispatching_tasks_distribution());
    }
    public function dispatch_timeconsuming_task(){
       
        echo $this->format_obj_response($this->utccModel->dispatch_timeconsuming_task());
    }
    public function today_video_upload_source_distribution(){
       
        echo $this->format_obj_response($this->utccModel->today_video_upload_source_distribution());
    }
    public function transcoding_fails_task_distribution(){
       
        echo $this->format_obj_response($this->utccModel->transcoding_fails_task_distribution());
    }
}
