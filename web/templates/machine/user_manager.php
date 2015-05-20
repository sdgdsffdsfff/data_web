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
                        <?php if($error != ''): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?=$error?>
                        </div>
                        <?php endif; ?>
                        <a style="margin-bottom: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> 添加新组</a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>电话</th>
                                <th>操作</th>
                            </tr>

                            <?php foreach($list as $item): ?>
                                <tr>
                                    <td><?=$item['id']?></td>
                                    <td><?=$item['name']?></td>
                                    <td><?=$item['email']?></td>
                                    <td><?=$item['phone']?></td>
                                    <td><a href="/web/machine/userdelete?id=<?=$item['id']?>">删除</a></td>
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
                    <h4 class="modal-title">添加新用户</h4>
                </div>
                <form action="/web/machine/useradd" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">用户名</label>
                            <input type="text" name="name" class="form-control" placeholder="组名">
                        </div>
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input type="text" name="email" class="form-control" placeholder="邮箱">
                        </div>
                        <div class="form-group">
                            <label for="phone">电话</label>
                            <input type="text" name="phone" class="form-control" placeholder="电话">
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