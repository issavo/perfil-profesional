<?php
require_once("config/Conexion.php");
require_once("models/Noticias.php");
$objNot = new Noticias();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="vistas/inicio/img/logo.png" type="image/x-icon">
    <meta name="author" content="Sonia O">
    <title> PHP - index </title>
    <!-- CSS-->
    <link rel="shortcut icon" href="vistas/inicio/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="vistas/inicio/css/menu.css">
    <link rel="stylesheet" href="vistas/inicio/css/noticias.css">
    <link rel="stylesheet" href="vistas/inicio/css/inicio.css">
    <link rel="stylesheet" href="vistas/inicio/css/pie.css">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- iconos -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <header class="header">
        <nav>
            <div id="contenedor_encabezado" class="">
                <a href="#"> <img id="logo" src="vistas/inicio/img/logo.png" alt="logo manos"> </a>
                <a id="boton">Pages</a>
                <ul id="menu_nav">
                    <li> <a class="menu active" href="inicio2.php"> Inicio</a></li>
                    <li> <a class="menu" href="proyectos.php"> Proyectos</a></li>
                    <li> <a class="menu" href="vistas/pags/portfolio.html">Porfolio</a></li>
                    <li> <a class="menu" href="vistas/pags/servicios.html"> Servicios</a> </li>
                    <li> <a class="menu" href="vistas/pags/contacto.html"> Contacto</a> </li>
                    <li> <a class="menu" href="login.php">Clientes</a></li>
                    <li> <a class="menu" href="vistas/pags/ubicacion.html">Ubicaci&oacute;n</a></li>
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
    <!---------  SECCIONES -------->

    <div id="contenedor_cuerpo" class="secciones">

        <!-- SECCION INICIO -->

        <div class="secciones" id="dinamico">
            <div id="contenedor_inicio">
                <img src="vistas/inicio/img/technology1500x800.png" width="1500" height="560" />
            </div>
            <div id="contenedor_inicio2">
                <p>Tu P&aacute;gina web profesional</p>
                <p>a la medida de tus necesidades</p>
            </div>
        </div>
    </div>
    <!------ SECCION NOTICIAS ------->
    <!--Contenido-->
    <!--  Contains page content -->
    <!-- Main content -->
    <section class="secciones text-center" id="section_noticias">
        <h1>Noticias</h1>
        <div id="noticias">
            <!-- NOTICIA 1 -->
            <?php
            $datos = $objNot->get_noticia1();
            /*si el array $datos es igual a 0 entonces no tiene registros que mostrar*/
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {
            ?>
                <!-- NOTICIA 1 BREVE-->
                <div class="container">
                    <ul>
                        <li>
                            <?php
                            echo "<h4 class=''><strong> ";
                            echo $datos["titulo"];
                            echo "</strong></h4>";
                            ?>
                        </li>
                        <li>
                            <?php
                            echo "<h5 class=''><strong>";
                            echo $datos["subtitulo"];
                            echo "</strong></h5>";
                            ?>
                        </li>
                        <li>
                            <div>
                                <!--el método corta_palabra es estática por lo tanto se llama con la clase Conectar-->
                                <?php echo Conectar::corta_palabra($datos["texto"], 77); ?>...
                            </div>
                        </li>
                        <li>
                            <button id="<?php echo $datos['id_noticia'] ?>" class="btn btn-sm btn-primary text-center" role="button" style="margin-top:10px; color: #fff; font-weight: bolder;" onclick="mostrar1('<?php echo $datos['id_noticia'] ?>');">Leer m&aacute;s</button>
                        </li>
                        <!-- MOSTRAR NOTICIA 1-->
                        <di id="caja1">
                            <table id="noticia1">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">
                                            <h4 id="titulo">
                                                <?php echo $datos["titulo"]; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="subtitulo">
                                                <?php echo $datos["subtitulo"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <p style='text-align:justify;' id="texto_noticia">
                                                <?php echo $datos["texto"]; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="tecnologias">
                                                <?php echo $datos["tecnologias"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button role="button" class="btn btn-sm btn-primary" id="<?php echo $datos['id_noticia']; ?>" onclick="cerrar1('<?php echo $datos['id_noticia']; ?>');" value="Cerrar"> Cerrar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </di>
                    </ul>
                </div>
            <?php
            }
            // NOTICIA 2
            $datos = $objNot->get_noticia2();
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {
            ?>
                <!-- NOTICIA 2 BREVE-->
                <div class="container">
                    <ul>
                        <li>
                            <?php
                            echo "<h4 class=''><strong> ";
                            echo $datos["titulo"];
                            echo "</strong></h4>";
                            ?>
                        </li>
                        <li>
                            <?php
                            echo "<h5 class=''><strong>";
                            echo $datos["subtitulo"];
                            echo "</strong></h5>";
                            ?>
                        </li>
                        <li>
                            <div>
                                <?php echo Conectar::corta_palabra($datos["texto"], 80); ?>...
                            </div>
                        </li>
                        <li>
                            <button id="<?php echo $datos['id_noticia'] ?>" class="btn btn-sm btn-primary text-center" role="button" style="margin-top:10px; color: #fff; font-weight: bolder;" onclick="mostrar2('<?php echo $datos['id_noticia'] ?>');">Leer m&aacute;s</button>
                        </li>
                        <!-- MOSTRAR NOTICIA 2-->
                        <di id="caja2">
                            <table id="noticia2">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">
                                            <h4 id="titulo">
                                                <?php echo $datos["titulo"]; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="subtitulo">
                                                <?php echo $datos["subtitulo"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <p style='text-align:justify;' id="texto_noticia">
                                                <?php echo $datos["texto"]; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="tecnologias">
                                                <?php echo $datos["tecnologias"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button role="button" class="btn btn-sm btn-primary" id="<?php echo $datos['id_noticia']; ?>" onclick="cerrar2('<?php echo $datos['id_noticia']; ?>');" value="Cerrar"> Cerrar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </di>
                    </ul>
                </div>
            <?php
            }
            // NOTICIA 3
            $datos = $objNot->get_noticia3();
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {
            ?>
                <!-- NOTICIA 3 BREVE-->
                <div class="container">
                    <ul>
                        <li>
                            <?php
                            echo "<h4 class=''><strong> ";
                            echo $datos["titulo"];
                            echo "</strong></h4>";
                            ?>
                        </li>
                        <li>
                            <?php
                            echo "<h5 class=''><strong>";
                            echo $datos["subtitulo"];
                            echo "</strong></h5>";
                            ?>
                        </li>
                        <li>
                            <div id="texto">
                                <?php echo Conectar::corta_palabra($datos["texto"], 75); ?>...
                            </div>
                        </li>
                        <li>
                            <button id="<?php echo $datos['id_noticia'] ?>" class="btn btn-sm btn-primary text-center" role="button" style="margin-top:10px; color: #fff; font-weight: bolder;" onclick="mostrar3('<?php echo $datos['id_noticia'] ?>');">Leer m&aacute;s</button>
                        </li>
                        <!-- MOSTRAR NOTICIA 3-->
                        <di id="caja3">
                            <table id="noticia3">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">
                                            <h4 id="titulo">
                                                <?php echo $datos["titulo"]; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="subtitulo">
                                                <?php echo $datos["subtitulo"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <p style='text-align:justify;' id="texto_noticia">
                                                <?php echo $datos["texto"]; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="tecnologias">
                                                <?php echo $datos["tecnologias"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button role="button" class="btn btn-sm btn-primary" id="<?php echo $datos['id_noticia']; ?>" onclick="cerrar3('<?php echo $datos['id_noticia']; ?>');" value="Cerrar"> Cerrar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </di>
                    </ul>
                </div>
            <?php
            }
            // NOTICIA 4
            $datos = $objNot->get_noticia4();
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {
            ?>
                <!-- NOTICIA 4 BREVE-->
                <div class="container">
                    <ul>
                        <li>
                            <?php
                            echo "<h4 class=''><strong> ";
                            echo $datos["titulo"];
                            echo "</strong></h4>";
                            ?>
                        </li>
                        <li>
                            <?php
                            echo "<h5 class=''><strong>";
                            echo $datos["subtitulo"];
                            echo "</strong></h5>";
                            ?>
                        </li>
                        <li>
                            <div id="texto" class="">
                                <?php echo Conectar::corta_palabra($datos["texto"], 83); ?>...
                            </div>
                        </li>
                        <li>
                            <button id="<?php echo $datos['id_noticia'] ?>" class="btn btn-sm btn-primary text-center" role="button" style="margin-top:10px; color: #fff; font-weight: bolder;" onclick="mostrar4('<?php echo $datos['id_noticia'] ?>');">Leer m&aacute;s</button>
                        </li>
                        <!-- MOSTRAR NOTICIA 4-->
                        <di id="caja4">
                            <table id="noticia4">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">
                                            <h4 id="titulo">
                                                <?php echo $datos["titulo"]; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="subtitulo">
                                                <?php echo $datos["subtitulo"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <p style='text-align:justify;' id="texto_noticia">
                                                <?php echo $datos["texto"]; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="tecnologias">
                                                <?php echo $datos["tecnologias"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button role="button" class="btn btn-sm btn-primary" id="<?php echo $datos['id_noticia']; ?>" onclick="cerrar4('<?php echo $datos['id_noticia']; ?>');" value="Cerrar"> Cerrar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </di>
                    </ul>
                </div>
            <?php
            }
            // NOTICIA 5 
            $datos = $objNot->get_noticia5();
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {
            ?>
                <!-- NOTICIA 5 BREVE -->
                <div class="container">
                    <ul>
                        <li>
                            <?php
                            echo "<h4 class=''><strong> ";
                            echo $datos["titulo"];
                            echo "</strong></h4>";
                            ?>
                        </li>
                        <li>
                            <?php
                            echo "<h5 class=''><strong>";
                            echo $datos["subtitulo"];
                            echo "</strong></h5>";
                            ?>
                        </li>
                        <li>
                            <div id="texto">
                                <?php echo Conectar::corta_palabra($datos["texto"], 93); ?>...
                            </div>
                        </li>
                        <li>
                            <button id="<?php echo $datos['id_noticia'] ?>" class="btn btn-sm btn-primary text-center" role="button" style="margin-top:10px; color: #fff; font-weight: bolder;" onclick="mostrar5('<?php echo $datos['id_noticia'] ?>');">Leer m&aacute;s</button>
                        </li>
                        <!-- MOSTRAR NOTICIA 5 -->
                        <di id="caja5">
                            <table id="noticia5">
                                <tbody>
                                    <tr>
                                        <td style="border: none;">
                                            <h4 id="titulo">
                                                <?php echo $datos["titulo"]; ?>
                                            </h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="subtitulo">
                                                <?php echo $datos["subtitulo"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <p style='text-align:justify;' id="texto_noticia">
                                                <?php echo $datos["texto"]; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <h5 id="tecnologias">
                                                <?php echo $datos["tecnologias"]; ?>
                                            </h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border: none;">
                                            <button role="button" class="btn btn-sm btn-primary" id="<?php echo $datos['id_noticia']; ?>" onclick="cerrar5('<?php echo $datos['id_noticia']; ?>');" value="Cerrar"> Cerrar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </di>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <!--Fin-Contenido-->
    <!-- PIE DE PAGINA -->
    <footer style="background-color: #FFF; margin-top: 30px;">
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
                &copy; copyright 2020 - <a href="#">Pages.com</a>
            </p>
        </div>
    </footer>
    <!-- jQuery 3 -->
    <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- scripts --->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- SCRIPTS -->
    <script src="vistas/inicio/js/index.js"></script>
    <script src="vistas/inicio/js/carga_noticias.js"></script>
</body>
</html>