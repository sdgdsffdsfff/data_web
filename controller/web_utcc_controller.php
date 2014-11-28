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
        echo $this->gene_default_display('上传视频状态分布', 'utcc/upload_video_distribution.tpl');
    }
    
    public function transcoding_task_state_distribution(){
        echo $this->gene_default_display('转码任务状态分布', 'utcc/transcoding_task_state_distribution.tpl');
    }
    
    public function transcoding_tasks_distribution(){
        echo $this->gene_default_display('转码中任务数量分布', 'utcc/transcoding_tasks_distribution.tpl');
    }
    
    public function transcoding_backlog_grouped_by_uploading_machine(){
        echo $this->gene_default_display('转码积压按上传机分组', 'utcc/transcoding_backlog_grouped_by_uploading_machine.tpl');
    }
    public function transcoding_timeconsuming_task(){
        echo $this->gene_default_display('转码耗时的任务', 'utcc/transcoding_timeconsuming_task.tpl');
    }
    public function dispatch_task_state_distribution(){
        echo $this->gene_default_display('分发任务状态分布', 'utcc/dispatch_task_state_distribution.tpl');
    }
    public function to_dispatch_and_dispatching_tasks_distribution(){
        echo $this->gene_default_display('待分发/分发中任务数量分布', 'utcc/to_dispatch_and_dispatching_tasks_distribution.tpl');
    }
    public function dispatch_timeconsuming_task(){
        echo $this->gene_default_display('分发耗时的任务', 'utcc/dispatch_timeconsuming_task.tpl');
    }
    public function today_video_upload_source_distribution(){
        echo $this->gene_default_display('今日视频上传来源分布', 'utcc/today_video_upload_source_distribution.tpl');
    }
    public function transcoding_fails_task_distribution(){
        echo $this->gene_default_display('转码失败任务状态分布', 'utcc/transcoding_fails_task_distribution.tpl');
    }
}
