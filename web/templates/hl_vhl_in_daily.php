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
                        <div id="in_daily_chart"></div>
                        <div id="in_daily_table"></div>
                    </div>

                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <script src="<?=$SITE_PREFIX?>/js/hl_vhl_in_daily.js" type="text/javascript"></script>
<?php include 'sub/footer.php'; ?>