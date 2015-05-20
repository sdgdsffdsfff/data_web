<?php include $TEMPLATES_PATH.'/sub/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include $TEMPLATES_PATH.'/sub/left.php'; ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">

            <?php include $TEMPLATES_PATH.'/sub/breadcrumb.php' ?>
            <!-- Main content -->
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div id="graphs-30days-vvuv"></div>

                    </div>

                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

    <script src="<?=$SITE_PREFIX?>/js/trend_in_vv_hour.js" type="text/javascript"></script>
<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>