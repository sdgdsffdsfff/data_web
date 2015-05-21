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
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="<?=(isset($_POST['search_type'])&&$_POST['search_type']==1)||!isset($_POST['search_type'])?'active':''?>"><a href="#tab_1" data-toggle="tab">精确查询</a></li>
                                <li class="<?=(isset($_POST['search_type'])&&$_POST['search_type']==2)?'active':''?>"><a href="#tab_2" data-toggle="tab">模糊查询</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane <?=(isset($_POST['search_type'])&&$_POST['search_type']==1)||!isset($_POST['search_type'])?'active':''?>" id="tab_1">
                                    <div class="box box-primary">
                                        <div class="box-header">

                                        </div>
                                        <form id="faseQueryForm_1" action="/web/chaxun/url" method="post">
                                            <div class="box-body form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">url：</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" name="url" rows="10" placeholder="请输入url,多个以空格或换行分割"><?=(isset($_POST['url'])&&$_POST['url']&&$_POST['search_type']==1)?$_POST['url']:''?></textarea>
                                                    </div>
                                                </div>

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
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">显示：</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="show_type" value="1"  <?=(isset($_POST['show_type'])&&$_POST['show_type']==1)||(!isset($_POST['show_type']))?'checked':''?> > 按天显示
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="show_type"  value="2" <?=(isset($_POST['show_type'])&&$_POST['show_type']==2)?'checked':''?>> 合并显示
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="search_type" value="1">
                                            </div>

                                            <div class="box-footer">
                                                <div class="pull-right">
                                                    <button type="reset" class="btn btn-warning"><i class="fa fa-reply"></i>&nbsp;&nbsp;参数重置</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;执行查询</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>

                                </div><!-- /.tab-pane -->

                                <div class="tab-pane <?=(isset($_POST['search_type'])&&$_POST['search_type']==2)?'active':''?>" id="tab_2">
                                    <div class="box box-primary">
                                        <div class="box-header">

                                        </div>
                                        <form id="faseQueryForm_2" action="/web/chaxun/url" method="post">
                                            <div class="box-body form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">refer：</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control" value="<?=(isset($_POST['url'])&&$_POST['url']&&$_POST['search_type']==2)?$_POST['url']:''?>" name="url" placeholder="请输入一个模糊url" >

                                                    </div>
                                                </div>

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
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label text-right">显示：</label>
                                                    <div class="col-sm-4">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="show_type" value="1"  <?=(isset($_POST['show_type'])&&$_POST['show_type']==1)||(!isset($_POST['show_type']))?'checked':''?> > 按天显示
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="show_type"  value="2" <?=(isset($_POST['show_type'])&&$_POST['show_type']==2)?'checked':''?>> 合并显示
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="search_type" value="2">
                                            </div>

                                            <div class="box-footer">
                                                <div class="pull-right">
                                                    <button type="reset" class="btn btn-warning"><i class="fa fa-reply"></i>&nbsp;&nbsp;参数重置</button>
                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;&nbsp;执行查询</button>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div>
                        <?php if($error): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Alert!</b> <?=$error?>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($list)): ?>
                        <form action="/web/chaxun/export" method="post" style="margin-bottom: 10px;">
                            <input type="hidden" name="exportDatas" value='<?=json_encode($list)?>'>
                            <input type="hidden" name="exportFileName" value="url查询PV,UV">
                            <button type="submit" class="btn btn-info btn-flat">导出EXCEL</button>
                        </form>

                        <table class="table table-bordered table-hover table-responsive table-condensed table-striped">
                            <tbody>

                                <tr>
                                <?php foreach(array_keys($list[0]) as $th): ?>
                                    <th><?=$th?></th>
                                <?php endforeach; ?>
                                </tr>
                                <?php foreach($list as $item): ?>
                                <tr>
                                    <?php foreach(array_values($item) as $v): ?>
                                    <td style="max-width: 300px; overflow: auto;"><?=$v?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="alert alert-info alert-dismissable">
                            <i class="fa fa-info"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>呵呵!</b> 没有记录。
                        </div>
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

<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>