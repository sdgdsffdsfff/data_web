<!DOCTYPE html>
<head>
    <!-- doc css -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/css/doc.css" />
    <!-- icon css -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/css/icons.css" />
    <!-- jQuery -->
    <script src="{$SITE_PREFIX}/js/libs/jquery.min.js" type="text/javascript"></script> 
    <!-- bootstrap -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/css/bootstrap.min.css" />
    <!--[if lt IE 9]>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/html5shiv.js"></script>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/respond.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
            <script src="{$SITE_PREFIX}js/libs/dtGrid/dependents/bootstrap/plugins/ie/json2.js"></script>
    <![endif]-->
    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/fontAwesome/css/font-awesome.min.css" media="all" />
    <!-- dtGrid -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/jquery.dtGrid.js"></script>
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/i18n/zh-cn.js"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/jquery.dtGrid.css" />
    <!-- datePicker -->
    <script type="text/javascript" src="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/WdatePicker.js" defer="defer"></script>
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/skin/WdatePicker.css" />
    <link rel="stylesheet" type="text/css" href="{$SITE_PREFIX}js/libs/dtGrid/dependents/datePicker/skin/default/datepicker.css" />
    
</head>
<body>
	
    <div>
        <div id="dtGridContainer" class="dt-grid-container"></div>
        <div id="dtGridToolBarContainer" class="dt-grid-toolbar-container"></div>
    </div>
    <script>
        var jsonUser = {$jsonUser};
    </script>
    <script type="text/javascript" src="{$SITE_PREFIX}js/machine_monitor_list.js"></script>
</body>
</html>

