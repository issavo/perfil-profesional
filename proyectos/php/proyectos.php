<?php
require_once("config/Conexion.php");
require_once("models/Proyectos.php");
$objPro = new Proyectos();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="vistas/inicio/img/logo.png" type="image/x-icon">
    <meta name="author" content="Sonia O">
    <title>PHP - Proyectos </title>
    <!-- CSS -->
    <link rel="stylesheet" href="vistas/inicio/css/portfolio.css">
    <link rel="stylesheet" href="vistas/inicio/css/menu.css">
    <link rel="stylesheet" href="vistas/inicio/css/pie.css">
    <!-- FONTANWESOME  CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <header class="header">
        <nav>
            <div id="contenedor_encabezado" class="">
                <a href="inicio2.php"> <img id="logo" src="vistas/inicio/img/logo.png" alt="logo manos"> </a>
                <a id="boton">Pages</a>
                <ul id="menu_nav">
                    <li> <a class="menu " href="inicio2.php"> Inicio</a></li>
                    <li> <a class="menu active" href="proyectos.php"> Proyectos</a></li>
                    <li><a class="menu" href="vistas/pags/portfolio.html">Porfolio</a></li>
                    <li> <a class="menu" href="vistas/pags/servicios.html"> Servicios</a> </li>
                    <li><a class="menu" href="login.php">Clientes</a></li>
                    <li><a class="menu" href="vistas/pags/ubicacion.html">Ubicaci&oacute;n</a></li>
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
    <!-- SECCION PORTFOLIO -->
    <section class="secciones" id="portfolio">
        <h1>Proyectos</h1>
        <div id="contenedor_portfolio">
            <?php
            $datos = $objPro->get_mostrar_proyectos();
            if (count($datos) == 0) {
                echo "<h1>no hay registros que mostrar</h1>";
            } else {

                for ($i = 0; $i < count($datos); $i++) {
                    if ($datos[$i]["imagen"] != '') {
            ?>
                        <div id="imagen_1">
                            <?php
                            echo '
                                <img  src="vistas/upload/' . $datos[$i]["imagen"] . '" class=" transform" height="200" width="500px"/><input type="hidden" name="hidden_proyecto_imagen" value="' . $datos[$i]["imagen"] . '" />';
                            ?>
                            <p id="texto_1">
                                <?php
                                echo "<h4>";
                                echo $datos[$i]["titulo"];
                                echo "</h4>";
                                echo "<h5>";
                                echo $datos[$i]["subtitulo"];
                                echo "</h5>";
                                echo "<br/>";
                                echo "<span>";
                                echo $datos[$i]["descripcion"];
                                echo "<br/></span>";
                                ?>
                                <?php echo $datos[$i]["tecnologias"]; ?>
                                <br />
                                Tiempo estimado: <?php echo $datos[$i]["duracion"]; ?>&nbsp;horas
                            </p>
                        <?php
                    } else {
                        echo '<input type="hidden" name="hidden_proyecto_imagen" value="" />';
                    } ?>
                        </div>
                <?php
                } //for
            } //if
                ?>
        </div>
    </section>
    <footer>
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
</body>

</html>