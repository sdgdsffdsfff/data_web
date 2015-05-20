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

                        <a style="margin-bottom: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> 添加新组</a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>组名</th>
                                <th>组级别</th>
                                <th>操作</th>
                            </tr>

                            <?php foreach($list as $item): ?>
                                <tr>
                                    <td><?=$item['groupname']?></td>
                                    <td><?=$item['level']?></td>
                                    <td><a href="/web/admin/delusergroup?gid=<?=$item['gid']?>">删除</a></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
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
                    <h4 class="modal-title">添加新用户组</h4>
                </div>
                <form action="/web/admin/add_usergroup" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="groupname">组名</label>
                            <input type="text" name="groupname" class="form-control" placeholder="组名">
                        </div>
                        <div class="form-group">
                            <label>组级别</label>
                            <select class="form-control" name="grouplevel">
                                <option value="1">监控人员级别</option>
                                <option value="2">系统管理员</option>
                                <option value="3">高层</option>

                            </select>
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

<?php include $TEMPLATES_PATH.'/sub/footer.php'; ?>