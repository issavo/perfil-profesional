-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2021 a las 14:13:03
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pages`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(18) NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `fecha_alta` date NOT NULL,
  `usuario_alta` varchar(150) NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `nombre`, `apellidos`, `telefono`, `usuario`, `dia`, `hora`, `fecha_alta`, `usuario_alta`, `estado`) VALUES
(7, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-02-26', '14:14:00', '2021-02-25', 'soporte@pages.com', '1'),
(8, 'pepe', 'pruebas', '124569874', 'soporte@pages.com', '2021-02-26', '12:17:00', '2021-02-25', 'soporte@pages.com', '0'),
(9, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-02-26', '13:20:00', '2021-02-25', 'soporte@pages.com', '0'),
(10, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-02-26', '13:20:00', '2021-02-25', 'soporte@pages.com', '1'),
(12, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-02-26', '18:50:00', '2021-02-25', 'soporte@pages.com', '1'),
(13, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-03-01', '14:50:00', '2021-02-25', 'soporte@pages.com', '1'),
(14, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-03-08', '15:50:00', '2021-02-25', 'soporte@pages.com', '1'),
(17, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-03-02', '16:00:00', '2021-02-26', 'admin@admin.com', '1'),
(18, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-03-02', '16:00:00', '2021-02-26', 'admin@admin.com', '0'),
(19, '', '', '', '', '2021-02-25', '13:55:00', '2021-02-26', 'admin@admin.com', '0'),
(20, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-02-25', '13:55:00', '2021-02-26', 'admin@admin.com', '1'),
(25, 'info', 'info', '963258747', 'info@pages.com', '2021-03-04', '13:00:00', '2021-02-26', 'admin@admin.com', '1'),
(26, 'soporte', 'soporte', '215478962', 'soporte@pages.com', '2021-03-04', '13:20:00', '2021-02-26', 'admin@admin.com', '1'),
(27, 'pepe', 'pruebas', '124569874', 'soporte@pages.com', '2021-03-12', '18:20:00', '2021-02-26', 'admin@admin.com', '1'),
(28, 'info', 'info', '963258747', 'info@pages.com', '2021-03-01', '17:00:00', '2021-02-28', 'info@pages.com', '1'),
(29, '', '', '', '', '2021-03-09', '13:40:00', '2021-02-28', 'sonia@pruebas.com', '0'),
(32, 'Sonia', 'pruebas', '021365487', 'isavo70@gmail.com', '2021-03-16', '18:00:00', '2021-03-02', 'isavo70@gmail.com', '0'),
(34, 'bruce', 'wayne', '16096515004', 'batman@batman.com', '2021-04-09', '16:00:00', '2021-03-04', 'batman@batman.com', '1'),
(35, 'bruce', 'wayne', '16096515004', 'batman@batman.com', '2021-03-03', '17:20:00', '2021-03-04', 'batman@batman.com', '1'),
(36, 'bruce', 'wayne', '16096515004', 'batman@batman.com', '2021-03-02', '17:00:00', '2021-03-04', 'batman@batman.com', '1'),
(37, 'bruce', 'wayne', '16096515004', 'batman@batman.com', '2021-03-19', '17:20:00', '2021-03-04', 'batman@batman.com', '1'),
(38, 'Anthony Edward  (Tony)', 'stark', '2129704133', 'ironMan@gmail.com', '2021-05-25', '17:20:00', '2021-03-04', 'ironMan@gmail.com', '1'),
(40, 'Steven', 'Grand Rogers', '6781367092', 'capitan@america.com', '2021-03-31', '16:40:00', '2021-03-06', 'admin@admin.com', '1'),
(41, 'Maria de las mercedes', 'Perez', '215478962', 'info@info.com', '2021-05-06', '10:40:00', '2021-03-06', 'admin@admin.com', '1'),
(42, 'bruce', 'wayne', '16096515004', 'batman@batman.com', '2021-03-22', '17:40:00', '2021-03-06', 'admin@admin.com', '1'),
(43, 'Manolo', 'olivares del rey', '963258741', 'soporte1@pages.com', '2021-03-26', '11:40:00', '2021-03-06', 'admin@admin.com', '1'),
(44, 'Maria de las mercedes', 'Perez', '215478962', 'info@info.com', '2021-04-15', '16:00:00', '2021-03-06', 'admin@admin.com', '0'),
(45, 'Anthony Edward  (Tony)', 'stark', '2129704133', 'ironMan@gmail.com', '2021-03-26', '13:20:00', '2021-03-06', 'admin@admin.com', '1'),
(46, 'Peter', 'Benjamin Parker ', '2125559977', 'spider@man.com', '2021-03-29', '16:00:00', '2021-03-17', 'admin@admin.com', '1'),
(47, 'Juan Antonio', 'Vallejo', '365998712', 'juan@gmail.com', '2021-04-07', '10:00:00', '2021-03-19', 'admin@admin.com', '1'),
(51, 'Steven', 'Grand Rogers', '6781367092', 'capitan@america.com', '2021-04-09', '17:20:00', '2021-03-19', 'admin@admin.com', '1'),
(52, 'soporte', 'soporte', '3654125487', 'soporte@pages.com', '2021-04-09', '17:00:00', '2021-03-19', 'soporte@pages.com', '1'),
(53, 'soporte', 'soporte', '3654125487', 'soporte@pages.com', '2021-04-08', '18:00:00', '2021-03-19', 'soporte@pages.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(18) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('0','1') COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellidos`, `direccion`, `telefono`, `usuario`, `correo`, `fecha_alta`, `estado`, `rol`) VALUES
(5, 'asd', 'asdasd', '                    	sdfzdfbfgmcghjdg			', '012664580', 'asdasd@asd.com', 'asd@asd.com', '2021-02-13', '0', '2'),
(6, 'soporte', 'soporte', 'Plaza del ayuntamiento,1-46000 Valencia', '3654125487', 'soporte@pages.com', 'soporte@pages.com', '2021-02-20', '0', '2'),
(17, 'Sonia', 'pruebas', 'Lorem ipsum, 56-10', '021365487', 'isavo70@gmail.com', 'isavo70@gmail.com', '2021-03-02', '1', '2'),
(18, 'bruce', 'wayne', 'Gotham City, E.E:U.U', '16096515004', 'batman@batman.com', 'hombreMurcielago@gmail.com', '2021-03-04', '1', '2'),
(19, 'Anthony Edward  (Tony)', 'stark', 'Mansión Stark , Nueva York', '2129704133', 'ironMan@gmail.com', 'tonny@stark.com', '2021-03-04', '1', '2'),
(21, 'Steven', 'Grand Rogers', 'Washington, D.C. - América', '6781367092', 'capitan@america.com', 'capitan@america.com', '2021-03-04', '1', '2'),
(25, 'Manuel', 'olivares del rey', 'Plaza del ayuntamiento,1-46000 Valencia', '963258741', 'soporte5@pages.com', 'soporte5@pages.com', '2021-03-05', '1', '2'),
(26, 'Isabel', 'Perez', 'Plaza del ayuntamiento,1-46000 Valencia', '534 205 697', 'soporte3@pages.com', 'soporte3@pages.com', '2021-03-05', '0', '2'),
(27, 'Manolo', 'olivares del rey', 'Plaza del ayuntamiento,1-46000 Valencia', '963258741', 'soporte1@pages.com', 'soporte1@pages.com', '2021-03-05', '1', '2'),
(28, 'Benito', 'Perez  Galdos', 'Primado Reig,125-Valencia', '215478985', 'ejemplo@ejemplo.com', 'ejemplo@ejemplo.com', '2021-03-06', '0', '2'),
(29, 'asdasd', 'asdasd', 'dvzdffgmgh', '321548796', 'ejemplo2@ejemplo.com', 'ejemplo2@ejemplo.com', '2021-03-06', '0', '2'),
(30, 'Maria de las mercedes', 'Perez', 'C/el Sol,125', '215478962', 'info@info.com', 'info@info.com', '2021-03-06', '1', '2'),
(31, 'info', 'info', 'Plaza del ayuntamiento,1-46000 Valencia', '534 205 697', 'sonia@pruebas.com', 'sonia@pruebas.com', '2021-03-06', '1', '2'),
(32, 'pepe', 'martinez', 'Avda. de la Constitución,5-20', '124569874', 'soporte12@pages.com', 'soporte12@pages.com', '2021-03-06', '0', '2'),
(33, 'Peter', 'Benjamin Parker ', 'Forest Hills, New York City', '2125559977', 'spider@man.com', 'spider@man.com', '2021-03-08', '1', '2'),
(34, 'Juan Antonio', 'Vallejo', 'Avenida de los Pinares,5 - Castellón', '365998712', 'juan@gmail.com', 'juan@gmail.com', '2021-03-17', '1', '2'),
(35, 'LUIS', 'peinado', 'c/El progreso,12-42006 Museros', '598223654', 'luispp@hotmail.com', 'luispp@hotmail.com', '2021-03-19', '1', '2'),
(36, 'prudencio', 'perez', 'La rioja - España', '689224581', 'pp@gmail.com', 'pp@gmail.com', '2021-03-19', '1', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(150) NOT NULL,
  `texto` text NOT NULL,
  `tecnologias` text NOT NULL,
  `usuario` varchar(150) NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `subtitulo`, `texto`, `tecnologias`, `usuario`, `fecha_alta`, `estado`) VALUES
(1, 'Reservas o Citas desde la web', '¿Necesitas una web con reservas o citas?', 'Desde hace tiempo ya es más que recomendable que si tienes un establecimiento de estética, médico, hotelero o de restauración tengas no solo una web corporativa sino un sistema de reservas o citas online. Con la denominada “nueva normalidad” producida por las crisis sanitaria del Covid-19, ahora no solo es recomendable darles esa facilidad a tus clientes, sino que es obligatorio y se extiende no solo a los negocios anteriormente mencionados, si no a la práctica totalidad de los comercios abiertos cara al público: talleres, tiendas de todo tipo, despachos, centros de ocio y deporte, etc.\r\n\r\nTanto las citas previas como el control del aforo son ahora necesarios.\r\nTambién lo es en las piscinas de comunidades de vecinos, por ejemplo, donde se deben limitar el nº de reservas.\r\n\r\nTener un sistema de citas o reservas online es una funcionalidad que al usuario le resulta de lo más interesante y cómoda, es una verdad innegable que cada vez se emplea más el móvil y PC para buscar los productos o servicios que queremos y si tenemos a nuestra disposición un calendario online donde visualizar al momento la disponibilidad y poder realizar la reserva o la cita, se ganan muchos clientes fieles a la vez que se ahorra tiempo en la gestión de las reservas o citas pudiendo tenerlo centralizado en la web en lugar de que te tengan que llamar, que enviar un whasapp o un mensaje por Facebook o Instagram, ya que es fácil que nos confundamos, que el cliente no recuerde bien el día/hora de la cita etc.', 'Diseño web, Desarrollo programación autogestionable', 'admin@admin.com', '2021-02-05', '1'),
(2, 'Diseño webs  corporativas', '1er puesto término principal MICROBLADING', 'Un  diseño, completamente personalizado y a medida se realizó mediante código HTML optimizado para SEO. Además, toda la página está perfectamente adaptada a todo tipo de dispositivos móvil y tablet para mejorar la usabilidad.\r\n\r\nEn cuanto al sistema de citas, se creó un formulario personalizado y adaptado al modelo de negocio que permite solicitar la cita a través de la página web.\r\n\r\nPosicionamiento SEO, un análisis e investigación SEO tanto de la competencia como de las palabras clave más apropiadas para cada servicio, aumentando la visibilidad de cada uno de los servicios y logrando un posicionamiento adecuado en los motores de búsqueda.\r\n\r\nCampaña de publicidad a través de la plataforma de Google Adwords para potenciar y aumentar las visitas de algunos de los servicios.', 'Diseño web corporativa,  SEO, Google Adwords, diseño responsive', 'admin@admin.com', '2021-02-06', '1'),
(3, '25 años con PHP', 'Han pasado 25 años desde PHP 1.0', 'Fue el 8 de junio del año 1995, cuando el programador Rasmus Lerdorf lo anunció bajo la denominación de “Personal Home Page Tools”. Tal fue su importancia, que 25 años después está presente en la mayor parte de las páginas web que necesitan programación del lado del servidor.\r\nEl objetivo que perseguía  era crear un lenguaje muy sencillo de utilizar en cualquier servidor web ¡Y vaya si lo consiguió!.\r\nPara desarrollar la versión de PHP 7 se tuvo en cuenta  su impacto en el cambio climático. Con  PHP 7, el ahorro energético global sería de 15.000 millones de kilovatios-hora cada año, por lo que se evitaría la emisión de 7.500 millones de kilos de dióxido de carbono.\r\nHay que destacar que las páginas web de versiones antiguas de PHP, como por ejemplo 5.x y 5.6, están expuestas a problemas de seguridad al no tener soporte y actualizaciones en seguridad desde el 31 de diciembre de 2019. Si quieres saber más al respecto puedes consultar en nuestro blog el artículo: ¡Urgente! Actualiza la versión PHP de tu\r\nAlgunos de los desarrollos más famosos del planeta, como WordPress, Wikipedia o Facebook, están basados en parte en PHP. De la misma forma, también es el lenguaje más implementado por las empresas de hosting, que ofrecen la herramienta PHPMyAdmin para administrar las bases de datos MySQL a sus clientes.', 'PHP', 'admin@admin.com', '2021-02-06', '1'),
(4, 'Diseño webs PYMES', 'Adaptación del diseño web a las necesidades del cliente', 'Diseño de página web para AUTO TAXI , una empresa de alquiler de vehículos con conductor en Salamanca. Para esta página web, el cliente escogió una web PYME que se personalizó y adaptó a la imagen de la empresa. Esta web está diseñada y optimizada para todo tipo de dispositivos móviles y tablets. Además, al tratarse de una página web de desarrollo propio, todo el código, así como la estructura web y los archivos que la componen, están perfectamente optimizados y realizados para potenciar y favorecer el posicionamiento SEO y la indexación en los motores de búsqueda.\r\n\r\n', 'Diseño web PYME, web responsive, desarrollo web', 'admin@admin.com', '2021-02-06', '1'),
(5, 'Tiendas online en época de pandemia', 'Las tiendas online creciendo por el coronavirus', 'Durante el confinamiento fueron muchas las personas que realizaron compras online por primera vez. A todas estas hay que sumar las que ya lo hacían de manera habitual antes de la pandemia, y la operación ofrece como resultado un boom del comercio electrónico que se mantendrá en el tiempo.\r\nEl futuro del comercio digital es prometedor, y actualmente está viviendo un incremento muy importante de su actividad. Esto ha evidenciado que es posible cambiar los hábitos de consumo de las personas drásticamente, y para ello solo hay que consultar el crecimiento que ha registrado el e-commerce en solo unos meses.\r\n\r\nMuchas personas han podido comprobar todas las facilidades que ofrecen los e-commerce, por ejemplo ofreciendo múltiples opciones de pago seguras. Por supuesto a esto también contribuyen las páginas web responsive, con buena usabilidad y que carguen rápido, entre otras virtudes que en Rana Negra ponemos de manifiesto constantemente.\r\nPor todos estos motivos, si dispones de un comercio online no dudes en aprovechar para sacarle el máximo partido, ya que este es el momento óptimo para hacerlo. Tanto si quieres mejorar aspectos de desarrollo web, como si quieres adaptar tu marketing en tiempos de pandemia, entre otras, opciones  sabemos cómo ayudarte ¡Consultanos!', 'e-commerce,  web responsive,  pagos seguros, usabilidad', 'admin@admin.com', '2021-02-06', '1'),
(6, 'Dejan de indexar webs no  responsive ', 'Google deja de indexar webs que no sean responsive ', 'Ya en 2018 Google lanzó el primer algoritmo Mobile First Index, que utiliza como referencia para el posicionamiento web la versión móvil lo que ya significa un mejor posicionamiento para webs adaptadas a la navegación móvil. \r\n\r\nAhora no solo es que priorice la versión móvil, es que ahora no va a incluir en su índice páginas web que no se visualicen correctamente en móviles.\r\n \r\nNo hay que hacer otra versión, solo hay que hacer que la web sea responsive, es decir, con los mismos elementos, contenidos y estructura, solo que organizados para una correcta visualización y navegación en dispositivos móviles. \r\n\r\nTodos aquellos que no tengáis la web responsive, será como si no tuvierais web a partir de marzo. Pero todavía quedan 5 meses así que es momento de ponerse manos a la obra. \r\n\r\nSi no sabes si tu web tiene una buen responsive y además quieres aprovechar para hacerle una puesta a punto ¡este es el momento! ', 'Diseño web, web responsive', 'admin@admin.com', '2021-02-06', '1'),
(7, 'Ventajas de añadir Bizum a tu ecommerce', 'Ventajas de añadir Bizum como método de pago', 'Para facilitar el proceso de compra en tu ecommerce, Hoy te mostramos las ventajas de Bizum.\r\nBizum es la solución de pagos a través del móvil, con la que tus clientes solo tendrán que introducir su número de teléfono móvil y validar la operación para comprar tus productos.¡Así de fácil!\r\nImpulsada por la banca española, instantánea, rápida, cómoda y universal.\r\nActualmente, permite realizar pagos entre particulares, donaciones a ONG y pagar en los comercios online asociados.\r\nLos usuarios de Bizum son los más activos en banca digital y compras online. Están familiarizados a utilizar Bizum para realizar pagosa otras personas. Una encuesta realizada por Bizum reveló que 6 de cada 10 usuarios de Bizum ha pedido poder pagar con este método en una tienda online.\r\nVentajas:\r\nMás conversiones, Protección y rapidez, Facilidad de uso, Adaptabilidad, Mejor experiencia del cliente, Notoriedad.', 'tienda online, Ecommerce', 'soporte@pages.com', '2021-02-11', '1'),
(8, 'Diseño web a medida y Wordpress', 'Ventajas y diferencias entre una web a medida y wordpress', 'Existen dos opciones para la creación de un proyecto web: realizar un diseño web a medida o utilizar un CMS como Wordpress. \r\nLas ventajas de Wordpress se pueden resumir en: bajo coste y tiempo de implementación, así como fácil implementación de la web (no necesitas entender de programación para realizar y mantener tu web).\r\n\r\nLa desventaja más importante de la herramienta es el diseño y la personalización del proyecto. Aunque hay muchas plantillas disponibles, al final, uno siempre se queda atrapado por las limitaciones de la plantilla escogida. \r\nLa herramienta (debido principalmente a su bajo coste) presenta un soporte técnico inexistente.  \r\n\r\nLas ventajas de una web a medida, son que permiten una personalización total del proyecto, mayor seguridad, soporte técnico al cliente, SEO, diseño Responsive,...\r\nLas principales desventajas son el tiempo y el dinero que deben ser invertidos. ', 'Programación web, Diseño web', 'admin@admin.com', '2021-02-11', '1'),
(9, 'Página web autogestionable', '1ª Posición para el término de búsqueda principal cocinas zaragoza', 'Cuando creamos una web  es muy importante tener en cuenta que debe ofrecer una buena experiencia al usuario y resultar atractiva.\r\nSeguro que te interesa saber qué es lo que has podido hacer y que no deberías, ya que perjudica seriamente tu página web. Un diseño poco profesional, contenido de poco valor, no se ha trabajado el seo, el dominio es confuso, pop-ups inmediatos, funciones dañadas, la carga de la web es lenta, no es responsive, estructura de contenido poco intuitiva, enlaces rotos.', 'Diseño web corporativa, Programación zona autogestionable, SEO', 'admin@admin.com', '2021-02-11', '1'),
(10, 'Contenidos de calidad para el blog', '¿Cómo escribir contenidos de calidad?', 'La creación de contenidos para el blog no debe tomarse como algo a la ligera.\r\nCada artículo debe tener un objetivo, es decir, que finalidad queremos que tenga el blog: más suscriptores, remuneración económica… ya que eso nos determinará qué tipo de comunicación queremos transmitir en el blog.\r\n Debemos buscar un tema relevante para nuestros usuarios, y  a la hora de escribir un post deberás tener claro a quién se lo estás escribiendo, si es para adultos o para juveniles, ya que no utilizan la misma comunicación. \r\nEl contenido debe estar enfocado a cómo el usuario lo buscaría en Internet, pero tenemos que escribir también para Google ya que él será el que nos posicione en las primeras posiciones por la búsqueda que el usuario ha realizado. Aquí deberás escribir de manera estructurada: etiquetas H1, H2, negritas, enlaces...\r\nLo aconsejable es ir publicando frecuentemente y para ello qué mejor que hacer una planificación mensual o trimestral de los artículos que se van a crear.\r\n\r\nPara enganchar al usuario y evitar que abandone antes de finalizar el artículo, deberás poner algo para engancharlo o si no lo perderás.', 'Marketing  online, contenidos web', 'soporte@pages.com', '2021-02-11', '1'),
(11, 'Premio Pixel Adwrdas', 'Diseño web', 'Los premios Pixel Awards son uno de los concursos de premios más importantes de nuestra industria. Desde los jueces que seleccionan hasta las agencias y marcas que se envían, ganar un premio Pixel significa que estás creando algunos de los mejores trabajos en la red.\r\n\r\nEl diseño digital extraordinario es la nueva normalidad de hoy en día, por lo que ganar un premio Pixel es uno de los principales logros de los premios web.', 'Desarrollo web', 'admin@admin.com', '2021-02-18', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `descripcion`, `rol`) VALUES
(1, 'administrador', 1),
(2, 'cliente', 2),
(3, 'usuario', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `tecnologias` text NOT NULL,
  `duracion` int(11) NOT NULL,
  `estado` enum('0','1') NOT NULL,
  `imagen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `titulo`, `subtitulo`, `descripcion`, `tecnologias`, `duracion`, `estado`, `imagen`) VALUES
(1, 'Marketing online', 'Según objetivos de tu empresa adaptamos la estrategia para triunfar', 'Trabajamos con posicionamiento web o seo, sem, redes sociales, email marketing, analítica web.  ', 'Diseño web, responsive, desarrollo programación, instalación tpv', 200, '1', '588258117.png'),
(2, 'Desarrollo y Programación de aplicaciones web', 'Soluciones eficientes y adaptadas para empresas', 'Programación exclusiva y a medida para cada empresa. Sistema de administración de usuarios y administradores. Gestión pedidos, clientes, ventas, presupuestos, contactos...', 'Desarrollo web, Diseño web responsive, SEO', 200, '1', '1980043338.png'),
(3, 'web corporativa', 'Primer puesto término principal MICROBLANDING', 'Diseño único y personalizado. Páginas web adaptadas a todo tipo de dispositivos con una optimización para posicionamiento en buscadores.', 'Diseño web corporativa, SEO, Google Adwords', 140, '1', '1550875833.png'),
(4, 'Tienda Online', 'Mejor ecommerce de 2021', 'Diseño exclusivo y adaptado a cada modelo de negocio. Tienda online con plataforma autogestionable y posicionamiento SEO.', 'Diseño tienda online, Instalación tpv, SEO', 200, '1', '639692585.png'),
(5, 'Diseño web PYME', 'Low cost para pymes y autónomos.', 'La página web más económica, responsive y una optimización para posicionamiento en buscadores.', 'Diseño web pyme, red de sitios web, SEO, Redacción de contenidos, Google adwords', 120, '1', '1017984495.png'),
(6, 'Blog autogestionable', 'Actualización de contenidos de forma rápida y sencilla', 'Diseños únicos y adaptados a tus necesidades. Sistema de gestión de contenidos: Wordpress y Blogger. Optimización para posicionamiento.', 'Uso de código abierto, programación a medida, uso de CMS', 80, '1', '1820980461.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `rep_password` varchar(250) NOT NULL,
  `rol` int(2) NOT NULL,
  `fecha_alta` date NOT NULL,
  `estado` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `rep_password`, `rol`, `fecha_alta`, `estado`) VALUES
(1, 'admin@admin.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, '2021-02-02', '1'),
(2, 'soporte@pages.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-02-02', '1'),
(3, 'soporte1@pages.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-02', '1'),
(4, 'soporte12@pages.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-02', '0'),
(6, 'info@pages.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-02', '1'),
(7, 'soporte3@pages.com', '9c56cc51b374c3ba189210d5b6d4bf57790d351c96c47c02190ecf1e430635ab', '9c56cc51b374c3ba189210d5b6d4bf57790d351c96c47c02190ecf1e430635ab', 3, '2021-02-03', '1'),
(8, 'soporte5@pages.com', 'f959c2c3d668fd26ee1354827c3d2ce5062f43c7a1a8b2431da6669d0ee18857', 'f959c2c3d668fd26ee1354827c3d2ce5062f43c7a1a8b2431da6669d0ee18857', 3, '2021-02-03', '1'),
(9, 'ejemplo@ejemplo.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-04', '1'),
(16, 'ejemplo2@ejemplo.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 1, '2021-02-05', '1'),
(22, 'isavo@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-12', '1'),
(23, 'info@info.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-19', '1'),
(26, 'pru@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-02-20', '0'),
(27, 'sonia@pruebas.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-02-28', '1'),
(29, 'isavo80@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 3, '2021-03-02', '1'),
(30, 'isavo70@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-03-02', '1'),
(31, 'batman@batman.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-03-04', '1'),
(32, 'ironMan@gmail.com', '9c56cc51b374c3ba189210d5b6d4bf57790d351c96c47c02190ecf1e430635ab', '9c56cc51b374c3ba189210d5b6d4bf57790d351c96c47c02190ecf1e430635ab', 2, '2021-03-04', '1'),
(33, 'capitan@america.com', 'f14f286ca435d1fa3b9d8041e8f06aa0af7ab28ea8edcd7e11fd485a100b632b', 'f14f286ca435d1fa3b9d8041e8f06aa0af7ab28ea8edcd7e11fd485a100b632b', 2, '2021-03-04', '1'),
(34, 'spider@man.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-03-08', '1'),
(35, 'juan@gmail.com', 'f14f286ca435d1fa3b9d8041e8f06aa0af7ab28ea8edcd7e11fd485a100b632b', 'f14f286ca435d1fa3b9d8041e8f06aa0af7ab28ea8edcd7e11fd485a100b632b', 2, '2021-03-17', '1'),
(36, 'luispp@hotmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-03-19', '1'),
(37, 'pp@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 2, '2021-03-19', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
