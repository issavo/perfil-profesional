<?php
require_once("config/Conexion.php");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="vistas/inicio/img/logo.png" type="image/x-icon">
  <meta name="author" content="Sonia O">
  <title>PHP - Formulario Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- FONTANWESOME 4 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/plugins/iCheck/square/blue.css">
  <!-- iconos -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!-- CSS -->
  <link rel="stylesheet" href="vistas/inicio/css/menu.css">
  <link rel="stylesheet" href="vistas/inicio/css/pie.css">
  <link rel="stylesheet" href="vistas/login/css/login.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition">
  <header class="header">
    <nav>
      <div id="contenedor_encabezado" class="">
        <a href="inicio2.php"> <img id="logo" src="vistas/inicio/img/logo.png" alt="logo manos"> </a>
        <a id="boton">Pages</a>
        <ul id="menu_nav">
          <li> <a class="menu" href="inicio2.php"> Inicio</a></li>
          <li> <a class="menu " href="proyectos.php"> Proyectos</a></li>
          <li><a class="menu" href="vistas/pags/portfolio.html">Porfolio</a></li>
          <li> <a class="menu" href="vistas/pags/servicios.html"> Servicios</a> </li>
          <li><a class="menu active" href="login.php">Clientes</a></li>
          <li><a class="menu " href="vistas/pags/ubicacion.html">Ubicaci&oacute;n</a></li>
        </ul>
        <div id="miCuenta">
          <i class="fas fa-user"></i>
          <span>
            <a href="login.php">Mi cuenta</a>
          </span>
        </div>
      </div>
    </nav>
  </header>

  <div class="login-box login-page" style="margin-bottom: 2%;">
    <div class="login-box-body" style="margin-top: -50px;">
      <h2 class="text-center" style="margin-bottom: 100px; margin-top: -5px">Acceso clientes</h2>


      <!--login-box-msg-->
    </div>
    <p class="text-center pad text-bold bg-primary margin-bottom">Introduzca los datos</p>
    <form method="post" id="form_login" name="form_login" style="padding: 10px;" role="form">
      <div class="form-group has-feedback">
        <input type="email" name="usuario" id="usuario" class="form-control" placeholder="usuario" maxlength="50" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" minlength="8" maxlength="12" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <input type="hidden" name="enviar" id="enviar" class="form-control" value="si">

      </div>
      <div class="row">

        <div class="col-xs-7 col-xs-offset-3 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp; Acceso</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="text-center pb-4">
      <a href="vistas/usuario/alta_usuario.php">Crear cuenta</a><br>
    </div>

    <!-- /.login-box-body -->
  </div>
  <!--INICIO MENSAJES DE ALERTA-->
  <div class="container" style="margin-top: 10px;">
    <div class="row">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">

        <div class="box-body">
          <!-- mensajes respuesta -->
          <div id="resultados_ajax" class="alert text-center"></div>
        </div>
      </div>
      <div class="col-sm-3"></div>
    </div>
    <!--/row-->
  </div>
  <!--/container-->
  <!-- FIN MENSAJES DE ALERTA-->

  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h4>Atención al cliente</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item text-left">
          Lunes-viernes:
        </li>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-rigth">Mañanas de &nbsp;9:00 - 14:00 h </li>
          <li class="list-group-item text-rigth border-bottom">Tardes de &nbsp;15:00 - 19:30 h</li>
        </ul>
        </li>
        </li>
      </ul>
      <br>
      <h5>Soporte</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item text-left">
          Lunes-viernes: &nbsp;19:30 - 8:00 h
        </li>
        <li class="list-group-item text-left">
          Sábados - Domingos - Festivos:&nbsp; 24 h
        </li>
      </ul>
      <br>
      <h5>Puede contactarnos de:</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item text-left">
          Lunes-viernes:
        </li>
        <ul class="list-group list-group-flush">
          <li class="list-group-item text-center">Teléfono:&nbsp; +34 534 205 797</li>
          <li class="list-group-item text-center">Email:&nbsp; info@pages.com</li>
        </ul>
        <li class="list-group-item text-left">
          Sábados - Domingos - Festivos:
        <li class="list-group-item text-center">Teléfono:&nbsp; +34 534 205 697</li>
        <li class="list-group-item text-center border-bottom">Email:&nbsp; soporte@pages.com</li>
        </li>
      </ul>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <!-- /.login-box -->
  <footer style="margin-top: 100px;">
    <div id="section_pie">
      <div id="column1" class="columns">
        <img src="vistas/inicio/img/logo_pie_182x50.png" alt="logo_empresa">
        <div>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, voluptatum. Quasi omnis dolor earum sapiente facere voluptatem esse dolores illum.
          </p>
          <span>
            <i class="fab fa-facebook f"></i>
            <i class="fab fa-facebook-messenger"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
          </span>

        </div>
      </div>
      <div id="column2" class="columns">
        <h4>Enlaces ùtiles</h4>
        <ul>
          <li>
            <a href="#">Sobre nosotros</a>
          </li>
          <li>
            <a href="#">FAQ</a>
          </li>
          <li>
            <a href="#">Localización</a>
          </li>
          <li>
            <a href="#">Contacto</a>
          </li>
        </ul>

      </div>
      <div id="column3" class="columns">
        <h4>Categorias</h4>
        <ul>
          <li>
            <a href="#">Aplicaciones personalizadas</a>
          </li>
          <li>
            <a href="#">Tienda online </a>
          </li>
          <li>
            <a href="#">Diseños web</a>
          </li>
          <li>
            <a href="#">Gestión administrativa BBDD</a>
          </li>
        </ul>
      </div>
      <div id="column4" class="columns">
        <h4>Información contacto</h4>
        <ul class="fa-ul">
          <li>
            <span class="fa-li">
              <i class="fab fa-periscope fa-lg" style="color: #202060;"></i>
            </span>
            Plaza del Ayuntamiento, <br />
            1, 46002 València
          </li>
          <li>
            <span class="fa-li">
              <i class="fab fa-whatsapp " style="color: #202060;"></i>
            </span>
            +34 666 99 55 23
          </li>
          <li>
            <span class="fa-li">
              <i class="fas fa-envelope" style="color: #202060;"></i>
            </span>
            pages@pages.com
          </li>
        </ul>
      </div>
    </div>
    <div id="section_pie_footer">
      <p>
        &copy; copyright 2020 - <a href="inicio2.php">Pages.com</a>
      </p>
    </div>
  </footer>
  <!-- jQuery 3 -->
  <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="public/plugins/iCheck/icheck.min.js"></script>
  <!-- BOOTBOX -->
  <script src="vistas/js/bootbox.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
  <script src="vistas/login/js/login.js"></script>
</body>

</html>