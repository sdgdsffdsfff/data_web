<?php
if(!defined("CODE_BASE")){
    die("Bad Request");
}
require_once(CODE_BASE . 'controller/base.php');
class WebUtccController extends WebController
{
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function upload_video_distribution(){
        $this->render('上传视频状态分布', 'utcc/upload_video_distribution.php');
    }
    
    public function transcoding_task_state_distribution(){
        $this->render('转码任务状态分布', 'utcc/transcoding_task_state_distribution.php');
    }
    
    public function transcoding_tasks_distribution(){
        $this->render('转码中任务数量分布', 'utcc/transcoding_tasks_distribution.php');
    }
    
    public function transcoding_backlog_grouped_by_uploading_machine(){
        $this->render('转码积压按上传机分组', 'utcc/transcoding_backlog_grouped_by_uploading_machine.php');
    }
    public function transcoding_timeconsuming_task(){
        $this->render('转码耗时的任务', 'utcc/transcoding_timeconsuming_task.php');
    }
    public function dispatch_task_state_distribution(){
        $this->render('分发任务状态分布', 'utcc/dispatch_task_state_distribution.php');
    }
    public function to_dispatch_and_dispatching_tasks_distribution(){
        $this->render('待分发/分发中任务数量分布', 'utcc/to_dispatch_and_dispatching_tasks_distribution.php');
    }
    public function dispatch_timeconsuming_task(){
        $this->render('分发耗时的任务', 'utcc/dispatch_timeconsuming_task.php');
    }
    public function today_video_upload_source_distribution(){
        $this->render('今日视频上传来源分布', 'utcc/today_video_upload_source_distribution.php');
    }
    public function transcoding_fails_task_distribution(){
        $this->render('转码失败任务状态分布', 'utcc/transcoding_fails_task_distribution.php');
    }
}
