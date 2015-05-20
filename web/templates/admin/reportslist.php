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

                        <a class="btn btn-primary" style="margin-bottom: 10px;" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> 添加新组</a>

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>报表名</th>
                                <th>报表组</th>
                                <th>删除</th>
                            </tr>

                            <?php foreach($list as $item): ?>
                                <?php if($item['node']['pid']==0): ?>
                                    <tr>
                                        <td><span class="label label-primary">组【<?=$item['node']['name']?>】</span></td>
                                        <td>

                                        </td>
                                        <td><a href="/web/admin/delreport?id=<?=$item['node']['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endif; ?>
                                <?php foreach($item['subitems'] as $sub): ?>
                                    <tr>
                                        <td><?=$sub['name']?></td>
                                        <td>
                                            <?=$item['node']['name']?>
                                        </td>
                                        <td><a href="/web/admin/delreport?id=<?=$sub['id'] ?>">删除</a></td>
                                    </tr>
                                <?php endforeach; ?>
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
                    <h4 class="modal-title">添加新报表</h4>
                </div>
                <form action="/web/admin/newreport" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reportname">报表名</label>
                            <input type="text" name="reportname" class="form-control" id="reportname" placeholder="报表名">
                        </div>
                        <div class="form-group">
                            <label>隶属组</label>
                            <select class="form-control" name="parent_group">
                                <option value="0">新组</option>
                                <?php foreach($list as $item): ?>
                                    <?php if($item['node']['pid'] == 0): ?>
                                <option value="<?=$item['node']['id']?>"><?=$item['node']['name']?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="code">报表URL</label>
                            <input type="text" name="code" class="form-control" id="code" placeholder="报表URL">
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