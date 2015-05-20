<?php include 'sub/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include 'sub/left.php'; ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">

            <?php include 'sub/breadcrumb.php' ?>
            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs" id="hl_vhl-refer_uv_vv_daily_tab">
                                <li class="active"><a href="#graphs_today" data-toggle="tab">今天</a></li>
                                <li><a href="#graphs_yesterday" data-toggle="tab">昨天</a></li>
                                <li><a href="#graphs_7days" data-toggle="tab">最近7天</a></li>
                                <li><a href="#graphs_30days" data-toggle="tab">最近30天</a></li>

                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane  active" id="graphs_today">
                                    <div id="graphs-today-vv"></div>
                                    <div id="graphs-today-uv"></div>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="graphs_yesterday">
                                    <div id="graphs-yesterday-vv"></div>
                                    <div id="graphs-yesterday-uv"></div>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="graphs_7days">
                                    <div id="graphs-7days-vv"></div>
                                    <div id="graphs-7days-uv"></div>
                                </div><!-- /.tab-pane -->
                                <div class="tab-pane" id="graphs_30days">
                                    <div id="graphs-30days-vv"></div>
                                    <div id="graphs-30days-uv"></div>
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div>
                    </div>

                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <script src="<?=$SITE_PREFIX?>/js/hl_vhl_refer_uv_vv_daily.js" type="text/javascript"></script>
<?php include 'sub/footer.php'; ?>