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

                        <a class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> 添加新用户</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>用户名</th>
                                    <th>昵称</th>
                                    <th>邮箱</th>
                                    <th>所属组</th>
                                    <th>最近登陆</th>
                                    <th>最后登陆IP</th>
                                    <th>权限</th>
                                    <th>操作</th>
                                </tr>

                                <?php foreach($list as $item): ?>
                                    <tr>
                                        <td><?=$item['name']?></td>
                                        <td><?=$item['nickname']?></td>
                                        <td><?=$item['email']?></td>
                                        <td><?=$item['groupname']?></td>
                                        <td><?=$item['lastlogin']?> </td>
                                        <td><?=long2ip($item['lastloginip'])?></td>
                                        <td><a href="<?=$SITE_PREFIX?>admin/modifyuser/id/<?=$item['id']?>">展示权限</a></td>
                                        <td><a href="<?=$SITE_PREFIX?>admin/deluser?id=<?=$item['id']?>">删除</a></td>
                                    </tr>

                                <?php endforeach; ?>

                            </table>
                        </div>

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
                <form action="<?=$SITE_PREFIX?>/admin/newuser" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>用户名</label>
                            <input type="text" name="username" class="form-control" placeholder="用户名">
                        </div>
                        <div class="form-group">
                            <label>昵称</label>
                            <input type="text" name="nickname" class="form-control" placeholder="昵称">
                        </div>
                        <div class="form-group">
                            <label>邮箱</label>
                            <input type="email" name="email" class="form-control" placeholder="邮箱">
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