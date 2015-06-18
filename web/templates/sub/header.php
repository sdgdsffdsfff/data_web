<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="http://www.ku6.com/favicon.ico" />
    <!-- bootstrap 3.0.2 -->
    <link href="/web/AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="/web/AdminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="/web/AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="<?=$SITE_PREFIX?>/js/libs/jquery-1.11.3.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?=$SITE_PREFIX?>/js/libs/html5shiv.min.js"></script>
    <script src="<?=$SITE_PREFIX?>/js/libs/respond.min.js"></script>
    <![endif]-->

    <script src="<?=$SITE_PREFIX?>/js/helper.js" type="text/javascript"></script>

    <script language="javascript">
        <?php if(isset($username) && $username): ?>
            var username = '<?=$username?>';
            var token = '<?=$token?>';
        <?php else: ?>
            var user = '';
            var token = '';
        <?php endif; ?>
        var SITE_PREFIX = "<?=$SITE_PREFIX?>";
        var API_PREFIX = "<?=$API_PREFIX?>";
    </script>
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="/" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        KU6 数据查询平台
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?=$username ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="/web/AdminLTE/img/avatar3.png" class="img-circle" alt="User Image" />
                            <p>
                                <?=$username ?> - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="/web/logout" class="btn btn-default btn-flat">注销</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>