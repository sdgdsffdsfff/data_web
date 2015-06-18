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

                        <div class="box box-primary">
                            <div class="box-header">

                                <h4 class="box-title" id="faseQuery">
                                    <i class="fa fa-search"></i>&nbsp;&nbsp;快速查询
                                </h4>
                            </div>
                            <form id="faseQueryForm" action="/web/show/gold_amount" method="post">
                                <div class="box-body form-horizontal">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label text-right">日期：</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?=(isset($_POST['ge_date'])&&$_POST['ge_date'])?$_POST['ge_date']:''?>" name="ge_date" format="yyyy-MM-dd" placeholder="请选择开始日期" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',isShowClear:false,maxDate:'%y-%M-%d'});">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?=(isset($_POST['le_date'])&&$_POST['le_date'])?$_POST['le_date']:''?>" name="le_date" format="yyyy-MM-dd" placeholder="请选择结束日期" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',isShowClear:false,maxDate:'%y-%M-%d'});">
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="reset" class="btn btn-warning" id="resetFaseQuery"><i class="fa fa-reply"></i>&nbsp;&nbsp;参数重置</button>
                                        <button type="submit" class="btn btn-primary" id="doFaseQuery"><i class="fa fa-search"></i>&nbsp;&nbsp;执行查询</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>

                        <?php if(!empty($list)): ?>
                        <form action="/web/show/export" method="post" style="margin-bottom: 10px;">
                            <input type="hidden" name="exportDatas" value='<?=json_encode($list)?>'>
                            <input type="hidden" name="exportFileName" value="消耗查询">
                            <button type="submit" class="btn btn-info btn-flat">导出EXCEL</button>
                        </form>

                        <table class="table table-bordered table-hover table-responsive table-condensed table-striped">
                            <tbody>

                                <tr class="active">
                                <?php foreach(array_keys($list[0]) as $th): ?>
                                    <th><?=$th?></th>
                                <?php endforeach; ?>
                                </tr>
                                <?php foreach($list as $item): ?>
                                <tr>
                                    <?php foreach(array_values($item) as $v): ?>
                                    <td><?=$v?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>

                        <?php endif; ?>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">

                    </div>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <!-- datePicker -->
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/WdatePicker.js" defer="defer"></script>
    <link rel="stylesheet" type="text/css" href="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/skin/WdatePicker.css" />
    <link rel="stylesheet" type="text/css" href="<?=$SITE_PREFIX?>js/libs/dtGrid/dependents/datePicker/skin/default/datepicker.css" />
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/chaxun_uid_vid_cid.js"></script>

<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>