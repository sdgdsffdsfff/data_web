<!DOCTYPE html>
<head>
    <!-- doc css -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/css/doc.css" />
    <!-- icon css -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/css/icons.css" />
    <!-- jQuery -->
    <script src="{$SITE_PREFIX}/js/libs/jquery.min.js" type="text/javascript"></script> 
    <!-- bootstrap -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/css/bootstrap.min.css" />
    <!--[if lt IE 9]>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/html5shiv.js"></script>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/respond.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/json2.js"></script>
    <![endif]-->
    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/fontAwesome/css/font-awesome.min.css" media="all" />
    <!-- dtGrid -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/jquery.dtGrid.js"></script>
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/i18n/zh-cn.js"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/jquery.dtGrid.css" />
    <!-- datePicker -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/WdatePicker.js" defer="defer"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/skin/WdatePicker.css" />
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/skin/default/datepicker.css" />
    
</head>
<body>
	
    <div>
        <div><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" type="button">添加机器</button></div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">添加机器</h4>
                    </div>
                    <form>	
                        <div class="modal-body form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">机器名称：</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="请输入机器名称" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">省份：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入省份" name="province" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">城市：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入城市" name="city" id="city" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">IP：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入IP" name="ip" id="ip" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">CDNID：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入CDNID" name="cdnid" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">CPU数量：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入CPU数量" name="cpuNum" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">内核数 ：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入内核数" name="coreNum" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">内存：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入内存" name="memSum" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">硬盘：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入硬盘" name="diskSum" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">ignored：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入ignored" name="ignored" id="ignored" class="form-control"></div>
                            </div>
                            <div class="form-group">	
                                <label class="col-sm-3 control-label text-right">描述：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入描述" name="descs" id="descs" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">进程列表：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入进程列表" name="processList" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label text-right">用户ID：</label>
                                <div class="col-sm-4"><input type="text" placeholder="请输入用户ID" name="userID" id="userID" class="form-control"></div>
                            </div>	
                        </div>
                    </form>			
                    <div class="modal-footer">				
                        <button data-dismiss="modal" class="btn btn-default" type="button">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;关闭
                        </button>				
                        <button  class="btn btn-primary" type="button">提交</button>
                    </div>
                </div>
            </div>
        </div>    
        <div id="dtGridContainer" class="dt-grid-container"></div>
        <div id="dtGridToolBarContainer" class="dt-grid-toolbar-container"></div>
    </div>        
    <script type="text/javascript" src="{$SITE_PREFIX}js/machine_list.js"></script>
</body>
</html>

