
<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title><?=$title ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="/web/AdminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/web/AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header">用户登陆</div>
    <form action="/web/login" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="用户名@ku6.com"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="密码"/>
                <?php if(isset($_GET['redirectUrl'])): ?>
                <input type="hidden" name="redirectUrl" value="<?=$_GET['redirectUrl']?>">
                <?php endif; ?>
            </div>
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block">登陆</button>
        </div>
    </form>
</div>

</body>
</html>


