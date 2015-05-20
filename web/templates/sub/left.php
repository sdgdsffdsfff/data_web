<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/web/AdminLTE/img/avatar3.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?=$username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php foreach($menu as $m): ?>
            <li class="treeview <?php echo in_array($_SERVER['REQUEST_URI'],$m['urls'])?'active':'' ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-folder"></i>
                    <span><?=$m['title'] ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php foreach($m['value'] as $v): ?>
                    <li class="<?php echo $_SERVER['REQUEST_URI']==$v['url']? 'active':''; ?>"><a href="<?=$v['url'] ?>"><i class="fa fa-angle-double-right"></i> <?=$v['name']?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>