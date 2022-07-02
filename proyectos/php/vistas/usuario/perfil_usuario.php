<?php
require_once("../../config/Conexion.php");
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rol"]) == 3) {
    header("Location:../../login.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../inicio/img/logo.png" type="image/x-icon">
    <meta name="author" content="Sonia O">
    <title> PHP - Usuario - Perfil usuario </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../public/bower_components/Ionicons/css/ionicons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../../public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../../public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../public/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../public/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../public/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="skin-blue sidebar-mini hold-transition">
    <!-- Encabezado -->
    <div class="wrapper">
        <header class=" main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="../inicio/img/logo.png" width="30px;" alt="">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img src="../inicio/img/logo.png" width="40px;" alt="">
                    </span>
                </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../public/dist/img/avatar1.png" class="user-image" alt="User Image">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="hidden-xs"><?php echo $_SESSION["usuario"] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../../public/dist/img/avatar1.png" class="img-circle" alt="User Image">
                                    <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                    <p>
                                        <small><?php echo $_SESSION["usuario"] ?></small>
                                    </p>
                                </li>
                                <!-- /.row -->
                                <!--</li>-->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../config/logout.php" class="btn btn-default btn-flat">Cerrar sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <!-- sidebar menu: style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><a>MENU</a></li>
                    <li class="">
                        <a href="../../inicio2.php">
                            <i class="fa fa-home" aria-hidden="true"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            <span>Editar imagen</span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a>
                                    <input type="file" class="form-control-file-sm" style="width: 143px;">
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i> <span>Mi cuenta</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right"></i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="perfil_usuario.php" class="">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Datos usuario</span>
                                    <span class="pull-right-container badge bg-blue">
                                        <i class="fa fa-bell pull-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="alta_cliente.php">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Clientes</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right"></i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="alta_cliente.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Alta clientes</span>
                                    <span class="pull-right-container badge bg-blue">
                                        <i class="fa fa-bell pull-right">15</i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Noticias</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">5</i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="../../inicio2.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>noticias</span>
                                    <span class="pull-right-container badge bg-blue">
                                        <i class="fa fa-bell pull-right">5</i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Encabezado -->
        <div class="row"> 
            <div class="content-wrapper" style=" min-height: 850px;margin-top: -19px;">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="box" style="margin-top: 100px;">
                        <div class="panel-header" style="margin-top: 20px; margin-left: 40px;">
                            <img src="../../public/dist/img/avatar1.png" width="150px" class="img-circle" alt="User Image">
                        </div>
                        <div class="panel-body" style="padding: 25px;">
                            <form style="padding: 25px 30px;" method="post" id="cliente_form" name="cliente_form" data-ajax="false" onsubmit="return false;" role="form">
                                <div class=" content">
                                    <div id="resultados_ajax" class="mt-5 text-center"></div>
                                    <div class="form-user">
                                        <label>Usuario</label>
                                        <input type="email" name="usuario" id="usuario" class="form-control" required value="<?php echo $_SESSION["usuario"] ?>" />
                                        <br />
                                        <label>Password</label>
                                        <input type="password" name="password1" id="password1" class="form-control" maxlength="12" required />
                                        <br />
                                        <label>Confirmar password</label>
                                        <input type="password" name="password2" id="password2" class="form-control" required />
                                        <br />
                                        <div class="panel-footer text-center" style="background: transparent; border-top:none; padding: 0px;">
                                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>" />

                                            <button type="submit" name="action" id="btnGuardar" class="btn btn-success pull-left" value="Add">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                Guardar
                                            </button>

                                            <button type="button" onclick="limpiar()" class="btn btn-danger pull-right" data-dismiss="modal">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                Borrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--./content-->
                            </form>
                        </div><!-- ./panel-body -->
                    </div><!-- ./box-->
                </div><!-- ./col-sm-6 -->
                <div class="col-sm-4"></div>
            </div><!-- ./content-wrapper -->
        </div>
        <!--row-->
    </div>
    <!--container-->
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0.0
        </div>
        <strong>Copyright &copy; 2020-2021 <a href="../../inicio2.php">pages.com</a>.</strong> All rights
        reserved.
    </footer>
    <!-- jQuery 3 -->
    <script src="../../public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../public/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../../public/bower_components/raphael/raphael.min.js"></script>
    <script src="../../public/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../../public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../../public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../public/bower_components/moment/min/moment.min.js"></script>
    <script src="../../public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../../public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../public/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../public/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="../public/dist/js/pages/dashboard.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="../../public/dist/js/demo.js"></script>
    <!-- BOOTBOX -->
    <script src="../js/bootbox.min.js"></script>
    <!-- SCRIPTS -->
    <script src="../js/cliente/perfil_usuario.js"></script>
</body>

</html>