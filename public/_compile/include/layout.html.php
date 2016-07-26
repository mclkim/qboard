<?php /* Template_ 2.2.8 2016/05/30 08:53:15 D:\phpdev\workspace\qboard\public\_template\include\layout.html 000005022 */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="_template/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="_template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="_template/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="_template/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="_template/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="_template/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="_template/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="_template/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="_template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery 2.2.0
    <script src="_template/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php $this->print_("main_header",$TPL_SCP,1);?>

    <!-- Left side column. contains the logo and sidebar -->
<?php $this->print_("main_sidebar",$TPL_SCP,1);?>

    <!-- Content Wrapper. Contains page content -->
<?php $this->print_("content_wrapper",$TPL_SCP,1);?>

    <!-- /.content-wrapper -->
<?php $this->print_("main_footer",$TPL_SCP,1);?>

    <!-- Control Sidebar -->
<?php $this->print_("control_sidebar",$TPL_SCP,1);?>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="_template/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="_template/plugins/morris/morris.min.js"></script>
-->
<!-- Sparkline -->
<script src="_template/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="_template/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="_template/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="_template/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="_template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="_template/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="_template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="_template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="_template/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="_template/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="_template/dist/js/pages/dashboard.js"></script>
-->
<!-- AdminLTE for demo purposes -->
<script src="_template/dist/js/demo.js"></script>
</body>
</html>