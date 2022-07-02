
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../inicio/img/logo.png" type="image/x-icon">
    <meta name="author" content="Sonia O">
    <title>PHP - Formulario alta usuario</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="../inicio/bootstrap4/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../login/css/estilos.css">
    <link rel="stylesheet" href="../login/css/font-awesome.css">
    <link rel="stylesheet" href="../inicio/css/menu.css">
    <link rel="stylesheet" href="../inicio/css/pie.css">
    <!-- FONTANWESOME CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>
<body>
    <!-- MENU ENCABEZADO -->
    <header class="header">
        <nav>
            <div id="contenedor_encabezado" class="">
                <a href="../../inicio2.php"> <img id="logo" src="../inicio/img/logo.png" alt="logo manos"> </a>
                <a id="boton">Pages</a>
                <ul id="menu_nav">
                    <li> <a class="menu " href="../../inicio2.php"> Inicio</a></li>
                    <li> <a class="menu " href="../../proyectos.php"> Proyectos</a></li>
                    <li><a class="menu" href="../pages/portfolio.html">Porfolio</a></li>
                    <li> <a class="menu" href="../pages/servicios.html"> Servicios</a> </li>
                    <li> <a class="menu" href="vistas/pags/contacto.html"> Contacto</a> </li>
                    <li><a class="menu active" href="../../login.php">Clientes</a></li>
                    <li><a class="menu" href="../pages/ubicacion.html">Ubicaci&oacute;n</a></li>
                </ul>
                <div id="miCuenta">
                    <i class="fas fa-user"></i>
                    <span>
                        <a href="../../login.php">Mi cuenta</a>
                    </span>
                </div>
            </div>
        </nav>
    </header>
    <!-- FIN MENU ENCABEZADO -->
    <!-- CONTENEDOR SECTION - FORM -->
    <section class="form_wrap">
        <!-- SECTION INFO -->
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span>soporte@pages.com</p>
                <p><span class="fa fa-mobile"></span> 96 359 5637</p>
            </section>
        </section>
        <!-- FORMULARIO ALTA -->
        <form method="post" class="form_contact" id="usuario_form" name="usuario_form" data-ajax="false" onsubmit="return false" role="form">
            <h2>Alta de usuarios</h2>
            <div id="resultados_ajax" class="alert"></div>
            <div class="user_info">
                <label for="usuario">Usuario *</label>
                <input type="email" id="usuario" name="usuario" maxlength="50" required>
                <label for="password1">Password *</label>
                <input type="password" id="password1" name="password1" minlength="8" maxlength="12" required>
                <label for="password2">Repetir password *</label>
                <input type="password" id="password2" name="password2" minlength="8" maxlength="12" required>
                <input type="hidden" name="rol" id="rol" value="3">
                <input type="hidden" name="estado" id="estado" value="1">
                <input type="hidden" name="id_usuario" id="id_usuario" value="">
                <input type="hidden" name="enviar" id="enviar" value="si">
                <input type="submit" value="Enviar" id="btnSend">
            </div>
        </form>
    </section>
    <!-- PIE PAG -->
    <footer>
        <div id="section_pie">
            <div id="column1" class="columns">
                <img src="../inicio/img/logo_pie_182x50.png" alt="logo_empresa">
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
                &copy; copyright 2020 - <a href="../../inicio2.php">Pages.com</a>
            </p>
        </div>
    </footer>
    <!-- SCRIPTS Jquery -->
    <script src="../login/js/jquery-3.5.1.js"></script>
    <!-- SCRIPTS BOOTSTRAP -->
    <script src="../inicio/bootstrap4/bootstrap.min.js"></script>
    <script src="../inicio/bootstrap4/popper.min.js"></script>
    <!-- BOOTBOX -->
    <script src="../js/bootbox.min.js"></script>
    <!-- scripts -->
    <script src="../js/usuario/alta_usuario.js"></script>
</body>
</html>