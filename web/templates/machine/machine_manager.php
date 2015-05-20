<?php include $TEMPLATES_PATH.'/sub/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include $TEMPLATES_PATH.'/sub/left.php'; ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">

            <?php include $TEMPLATES_PATH.'/sub/breadcrumb.php' ?>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body">

                        <a class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> 添加机器</a>
                        <div id="dtGridContainer" class="dt-grid-container"></div>
                        <div id="dtGridToolBarContainer" class="dt-grid-toolbar-container"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">

                    </div>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">添加新用户</h4>
                </div>
                <form action="<?=$SITE_PREFIX?>machine/add" method="post" id="add_machine_form">
                    <div class="modal-body form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label text-right">机器名称：<i style="color: #ff0000;">*</i></label>
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
                            <label class="col-sm-3 control-label text-right">IP：<i style="color: #ff0000;">*</i></label>
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
                            <label class="col-sm-3 control-label text-right">忽略监控：</label>
                            <div class="col-sm-4">
                                <select name="ignored"  class="form-control">
                                    <option value="0">NO</option>
                                    <option value="1">YES</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label text-right">描述：<i style="color: #ff0000;">*</i></label>
                            <div class="col-sm-6"><input type="text" placeholder="请输入描述" name="descs" id="descs" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label text-right">进程列表：</label>
                            <div class="col-sm-4"><input type="text" placeholder="请输入进程列表" name="processList" class="form-control"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label text-right">用户ID：<i style="color: #ff0000;">*</i></label>
                            <div class="col-sm-4">
                                <select name="userID"  class="form-control">
                                    <option value="0"></option>
                                    <?php foreach (json_decode($jsonUser, true) as $uid=>$item): ?>

                                    <option value="<?=$uid?>"><?=$item?></option>

                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer clearfix">

                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> 取消</button>

                        <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> 提交</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var jsonUser = <?=$jsonUser?>;
    </script>
    <!-- dtGrid -->
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/libs/dtGrid/jquery.dtGrid.js"></script>
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/libs/dtGrid/i18n/zh-cn.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=$SITE_PREFIX?>js/libs/dtGrid/jquery.dtGrid.css" />
    <!-- datePicker -->
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/WdatePicker.js" defer="defer"></script>
    <link rel="stylesheet" type="text/css" href="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/skin/WdatePicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/skin/default/datepicker.css" />
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/machine_manager.js"></script>

<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>