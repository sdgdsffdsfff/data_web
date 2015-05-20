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
                        <div id="dtGridContainer" class="dt-grid-container"></div>
                        <div id="dtGridToolBarContainer" class="dt-grid-toolbar-container"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">

                    </div>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

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
    <script type="text/javascript" src="<?=$SITE_PREFIX?>js/machine_monitor.js"></script>

<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>