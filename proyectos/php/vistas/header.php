<?php
require_once("../config/Conexion.php");
if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rol"]) == 1) {
    header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="inicio/img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sonia O">
    <title> PHP - Administrador </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- FONTANWESOME 4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../public/bower_components/Ionicons/css/ionicons.min.css">

    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="../public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
    <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../public/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../public/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../public/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!--ESTILOS-->
    <link rel="stylesheet" href="../public/css/estilos.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">

                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">
                    <img src="inicio/img/logo.png" width="30px;" alt="">
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img src="inicio/img/logo.png" width="40px;" alt="">
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

                                <img src="../public/dist/img/avatar6.png" class="user-image" alt="User Image">
                                <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                <span class="hidden-xs"><?php echo $_SESSION["usuario"]  ?></span>

                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../public/dist/img/avatar6.png" class="img-circle" alt="User Image">
                                    <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                                    <p>
                                        <small><?php echo $_SESSION["usuario"]  ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="perfil_admin.php" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../config/logout.php" class="btn btn-default btn-flat">Cerrar sesion</a>
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

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><a>MENU</a></li>
                    <li class="">
                        <a href="../inicio2.php">
                            <i class="fa fa-home" aria-hidden="true"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-id-card-o" aria-hidden="true"></i> <span>Mi cuenta</span>
                                <span class="pull-right-container badge bg-blue">
                                    <i class="fa fa-bell pull-right"></i>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>

                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="perfil_usuAdm.php">
                                    <i class="fa fa-circle-o"></i>
                                    <span>Datos usuario</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i> <span>Usuarios</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">  15 </i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="usuarios.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users" aria-hidden="true"></i> <span>Clientes</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">  10 </i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="clientes.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Clientes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <span>Citas</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">  20 </i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="citas.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Nueva cita</span>

                                </a>
                            </li>
                            <li>
                                <a href="consultar_citas.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Consultar citas</span>

                                </a>
                            </li>
                            <li>
                                <a href="consultar_citas_mes.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Consultar citas mes</span>

                                </a>
                            </li>
                            <li>
                                <a href="consultar_citas_fecha.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Consultar citas fechas</span>

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Noticias</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">  5 </i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="noticias.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Alta noticias</span>

                                </a>
                            </li>
                            <li>
                                <a href="../inicio2.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>ver noticias</span>
                                    <span class="pull-right-container badge bg-blue">
                                        <i class="fa fa-eye pull-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <span>Proyectos</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right">  6 </i>
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="proyectos.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>Alta proyectos</span>

                                </a>
                            </li>
                            <li>
                                <a href="../proyectos.php">
                                    <i class="fa fa-circle-o" aria-hidden="true"></i>
                                    <span>ver proyectos</span>
                                    <span class="pull-right-container badge bg-blue">
                                        <i class="fa fa-eye pull-right"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print" aria-hidden="true"></i> <span>Reportes</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right"> 8 </i>
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-database" aria-hidden="true"></i> <span>BackUp</span>
                            <span class="pull-right-container badge bg-blue">
                                <i class="fa fa-bell pull-right"> 3 </i>
                            </span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>