<?php include $TEMPLATES_PATH.'/sub/header.php'; ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <?php include $TEMPLATES_PATH.'/sub/left.php'; ?>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">

            <?php include $TEMPLATES_PATH.'/sub/breadcrumb.php' ?>
            <!-- Main content -->
            <section class="content">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php foreach ($list['reports'] as $k => $report): ?>
                            <?php if($report['node']['pid'] == 0): ?>
                        <li class="<?=$k==0?'active':'' ?>"><a href="#tab_<?=$report['node']['id']?>" data-toggle="tab"><?=$report['node']['name'] ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </ul>
                    <form style="padding: 10px;" action="<?=$SITE_PREFIX?>admin/updateuser" method="post">
                        <div class="tab-content">

                            <?php foreach ($list['reports'] as $i => $report): ?>
                                <?php if($report['node']['pid'] == 0): ?>
                            <div class="tab-pane <?=$i==0?'active':'' ?>" id="tab_<?=$report['node']['id']?>">
                                <div class="form-group">
                                    <?php foreach($report['subitems'] as  $subreport): ?>
                                        <?php if (in_array($subreport['id'], $list['privates'])): ?>
                                    <div><input type="checkbox" name="privates[]" class="alluser"  value="<?=$subreport['id']?>" checked=true ><?=$subreport['name']?></div>
                                        <?php else: ?>
                                    <div><input type="checkbox" name="privates[]" value="<?=$subreport['id']?>"><?=$subreport['name']?></div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <hr>
                                    <div><input class="checkpage" type="checkbox" name="checkthispage" value="<?=$report['node']['id']?>">全选本页</div>

                                </div>
                            </div><!-- /.tab-pane -->
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <input type="hidden" name="uid" value="<?=$list['uid']?>">
                            <label>
                                接收报警级别:
                                <select name="grouplevel">

                                    <?php foreach($list['groups'] as $group): ?>
                                        <?php if($list['uinfo']['gid'] == $group['gid']):?>
                                    <option value="<?=$group['gid']?>" selected><?=$group['groupname']?></option>
                                        <?php else: ?>
                                    <option value="<?=$group['gid']?>"><?=$group['groupname']?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                            <input type="submit" value="更新" class="btn btn-primary">
                        </div><!-- /.tab-content -->
                    </form>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->
    <script>
        $(function(){

            $(".checkpage").on('ifUnchecked', function(event) {
                //Uncheck all checkboxes
                var rid = $(this).val();
                $("input[type='checkbox']", "#tab_"+rid).iCheck("uncheck");
            });
            //When checking the checkbox
            $(".checkpage").on('ifChecked', function(event) {
                //Check all checkboxes
                var rid = $(this).val();
                $("input[type='checkbox']", "#tab_"+rid).iCheck("check");
            });

        });

    </script>

    <!-- COMPOSE MESSAGE MODAL -->
<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>