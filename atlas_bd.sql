-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2025 a las 20:21:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atlas_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atractivos_tb`
--

CREATE TABLE `atractivos_tb` (
  `atrac_id` int(3) NOT NULL COMMENT 'Id del atractivo',
  `atrac_muni_id` int(3) NOT NULL COMMENT 'Id del municipio al que pertenece',
  `atrac_type` int(2) NOT NULL COMMENT 'Tipo de atractivo',
  `atrac_reg_id` int(2) NOT NULL COMMENT 'ID de la region al que pertenece',
  `atrac_name` varchar(50) NOT NULL COMMENT 'Nombre del atractivo',
  `atrac_cover_text` varchar(250) NOT NULL COMMENT 'Texto de la portada',
  `atrac_desc` varchar(900) NOT NULL COMMENT 'Descripción general',
  `atrac_latitud` double NOT NULL COMMENT 'Latitud del atractivo',
  `atrac_longitud` double NOT NULL COMMENT 'Longitud del atractivo',
  `atrac_direcc` varchar(150) DEFAULT NULL COMMENT 'Dirección de la atraccion',
  `atrac_horario` varchar(80) DEFAULT NULL COMMENT 'Horario de la atracción',
  `atrac_mail` varchar(100) DEFAULT NULL COMMENT 'Correo de contacto de la atracción',
  `atrac_tel` varchar(10) DEFAULT NULL COMMENT 'Teléfono de contacto de la atracción',
  `atrac_price` decimal(7,0) DEFAULT NULL COMMENT 'Precio de la atracción ',
  `atrac_soc_face` varchar(150) DEFAULT NULL COMMENT 'Red social de la atracción',
  `atrac_soc_inst` varchar(200) DEFAULT NULL COMMENT 'Liga de red social instagram',
  `atrac_status` int(11) NOT NULL DEFAULT 1 COMMENT 'status del atractivo (1 activo, 0 inactivo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atractivos_tb`
--

INSERT INTO `atractivos_tb` (`atrac_id`, `atrac_muni_id`, `atrac_type`, `atrac_reg_id`, `atrac_name`, `atrac_cover_text`, `atrac_desc`, `atrac_latitud`, `atrac_longitud`, `atrac_direcc`, `atrac_horario`, `atrac_mail`, `atrac_tel`, `atrac_price`, `atrac_soc_face`, `atrac_soc_inst`, `atrac_status`) VALUES
(12, 1, 1, 1, 'Grutas Nombre de Dios', 'Adéntrate en el fascinante mundo subterráneo de las Grutas Nombre de Dios, una maravilla natural ubicada en Chihuahua Capital.', 'A sólo 20 minutos del centro de la ciudad, en la Sierra de Nombre de Dios, se localizan estas cavidades naturales.\r\n', 28.709567403477926, -106.07679614594073, 'Vialidad Sacramento S/N, 31146 Chihuahua, Chih.', 'Lunes a sabado de 10am a 4pm', 'test@gmail.com', '6142004800', 250, 'https://www.facebook.com/GrutasCUUOficial/', '', 1),
(13, 3, 1, 1, 'Cascada de Basaseachi', 'La leyenda de la cascada de Basaseachi narra la historia de una joven tarahumara que se arrojó a un abismo y se convirtió en una cascada', 'Parque nacional de México es conocido por la caída de agua que le da su nombre, considerada como la segunda más alta del país', 28.180149852273832, -108.21051023882741, '33326 Chih', 'Mie a Lun 5am - 8pm / Mar 1am - 8pm', 'test@gmail.com', '6143259875', 200, '', '', 1),
(16, 5, 2, 1, 'Paquime', 'Zona arqueológica de Paquimé (Casas Grandes)', 'Paquimé fue un asentamiento que influyó en el noroeste de la Sierra Madre Occidental, la mayor parte del oeste de Chihuahua y algunas áreas de Sonora, Arizona y Nuevo México. Los restos de esta ciudad testimonian el desarrollo cultural del norte del México antiguo y la perfección de la arquitectura de tierra de la región serrana de Chihuahua, una mezcla de las técnicas constructivas de Mesoamérica y del suroeste de Estados Unidos.', 28.67980247508923, -106.12708311895072, '31120 Chihuahua, Chih.', '24/7', 'test2@gmail.com', '6145687968', 123, 'https://www.facebook.com/share/12Fu9Mef6Cv/', '', 1),
(17, 1, 1, 2, 'Valle de los Monjes', 'La leyenda dice que fueron monjes que se quedaron petrificados realizando profundas reflexiones. La ciencia explica que son formaciones rocosas que se han desgastado por la lluvia y el viento, de cualquier forma son espectaculares', 'Dentro de la Sierra Tarahumara, en el estado de Chihuahua, se esconde un lugar repleto de rocas gigantes y puntiagudas que han estado ahí desde hace millones de años. El sitio se llama Valle de los Monjes.', 28.690328850170403, -106.0104891441744, '31313 Chihuahua, Chih.', '24/7', 'test3@gmail.com', '6144563210', 99, '', '', 1),
(18, 4, 1, 1, 'Museo de Arte de Ciudad Juárez', '\r\n¡Ven a vistar nuestro museo!', 'Este Museo se construyó en 1963, como parte del PROGRAMA NACIONAL FRONTERIZO (PRONAF). Se abrió al público en 1964 en el periodo presidencial de Adolfo López Mateos. Uno de los objetivos que el PRONAF tenía era la creación de centros culturales y de diversión a lo largo de toda la franja fronteriza de México con los Estados Unidos.', 31.74150548086293, -106.45439163040076, 'C. C 51 Parque Público de El Chamizal CP 32030 Juárez, Juárez, Chihuahua', 'De martes a sábado, 10:00 - 18:00 hrs. Domingo, 12:00 - 17:00 hrs.', 'test4@gmail.com', '6141269573', 0, '', '', 1),
(19, 1, 1, 1, 'Zoológico San Jorge', 'Grandes felinos y camellos en recintos arbolados, además de una piscina con toboganes y barbacoas.', 'Este parque es ideal para la recreación de toda la familia, ya que cuenta con áreas verdes, albercas poco profundas y con salvavidas certificados, toboganes, canchas de basquetbol, voleibol y futbol, así como asadores y senderos.\r\n\r\nPor supuesto, la mayor atracción es el zoológico con una gran variedad de especies como aves, monos, reptiles y grandes felinos como los tigres.', 31.60942865792134, -106.32231240739097, 'Mariano Abasolo 1016, El Sauzal, 32599 Juárez, Chih.', 'Lun a Vie 9:300 - 6:30', 'test5@gmail.com', '6145623589', 100, '', '', 0),
(20, 2, 1, 2, 'Lago de Arareco', 'El lago de Arareco se ubica en lo alto de la Sierra Madre Occidental en el estado mexicano de Chihuahua, a 5 km de Creel, Chihuahua, en el municipio de Bocoyna, junto al ejido tarahumara de San Ignacio de Arareco.', 'A tan solo 5 kilómetros de Creel se localiza San Ignacio de Arareko, comunidad tarahumara que  se extiende en una superficie de 20 mil hectáreas de bosque. El centro de la comunidad está asentado en el Valle de Arareko en donde se encuentra la Misión de San Ignacio, sitio de reunión de la comunidad local en los días domingo.\r\nEn el valle se encuentran peculiares formaciones rocosas de origen natural, las cuales se multiplican sobre el terreno en perfiles y figuras singulares. La visita lago es impresionante cuando flotas en el con un bote de remos, déjate llevar por la mágica escena.', 27.71193211742632, -107.59160073252612, '33237 Chih.', 'Todo el día', 'test6@gmail.com', '614321569', 50, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_tb`
--

CREATE TABLE `gallery_tb` (
  `gal_id` int(4) NOT NULL COMMENT 'ID de la imagen',
  `gal_url` text NOT NULL COMMENT 'ruta de la imagen ',
  `gal_type` int(2) NOT NULL COMMENT 'Caterogia de la img',
  `gal_dif` int(2) NOT NULL COMMENT 'Diferenciador de la imagen',
  `gal_url_img` varchar(250) DEFAULT NULL COMMENT 'URL de las imagenes (logos de cintillo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `gallery_tb`
--

INSERT INTO `gallery_tb` (`gal_id`, `gal_url`, `gal_type`, `gal_dif`, `gal_url_img`) VALUES
(21, '_images/imgAtractivos/Cascada de Basaseachi1.jpeg', 2, 13, NULL),
(23, '_images/imgAtractivos/Grutas Nombre de Dios.png', 3, 12, NULL),
(24, '_images/imgAtractivos/Paquime.jpg', 3, 16, NULL),
(25, '_images/imgAtractivos/Paquime1.jpg', 2, 16, NULL),
(26, '_images/imgAtractivos/Valle de los Monjes.jpg', 3, 17, NULL),
(27, '_images/imgAtractivos/Valle de los Monjes1.jpg', 2, 17, NULL),
(28, '_images/imgAtractivos/Cascada de Basaseachi.jpg', 3, 13, NULL),
(29, '_images/imgAtractivos/Museo de Arte de Ciudad Juárez.jpg', 3, 18, NULL),
(30, '_images/imgAtractivos/Museo de Arte de Ciudad Juárez1.jpg', 2, 18, NULL),
(31, '_images/imgAtractivos/Zoológico San Jorge.jpg', 3, 19, NULL),
(32, '_images/imgAtractivos/Zoológico San Jorge1.jpg', 2, 19, NULL),
(33, '_images/imgAtractivos/Lago de Arareco.jpg', 3, 20, NULL),
(34, '_images/imgAtractivos/Lago de Arareco1.jpg', 2, 20, NULL),
(36, '_images/_svg/fondoCh.svg', 4, 0, NULL),
(37, '_images/imagenesPlat/rnt.png.png', 6, 0, 'https://rnt.sectur.gob.mx/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios_tb`
--

CREATE TABLE `municipios_tb` (
  `muni_id` int(3) NOT NULL COMMENT 'Id del municipio',
  `muni_reg_id` int(2) NOT NULL COMMENT 'iD de la region a la que pertenece el municipio',
  `muni_name` varchar(50) NOT NULL COMMENT 'Nombre del municipio',
  `muni_cover_text` varchar(250) NOT NULL COMMENT 'Texto de la portada',
  `muni_desc` varchar(500) NOT NULL COMMENT 'Descripción general',
  `muni_temp` varchar(150) NOT NULL COMMENT 'Datos sobre el clima',
  `muni_cult` varchar(150) NOT NULL COMMENT 'Datos sobre la cultura',
  `muni_nat` varchar(150) NOT NULL COMMENT 'Datos sobre la naturaleza'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios_tb`
--

INSERT INTO `municipios_tb` (`muni_id`, `muni_reg_id`, `muni_name`, `muni_cover_text`, `muni_desc`, `muni_temp`, `muni_cult`, `muni_nat`) VALUES
(1, 1, 'municipio 1', 'descripcion corta (como subtitulo)', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'Sed ut perspiciatis 50º unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, ', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore'),
(2, 2, 'municipio 2', 'Equis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo vo', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or', 'clima de 40° en toda la region', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i'),
(3, 2, 'municipio 3', 'descripcion corta (como subtitulo)', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'Sed ut perspiciatis 80º unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inven', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore'),
(4, 1, 'municipio 4', 'descripcion corta (como subtitulo)', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'eaque ipsa70° quae ab illo inven', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', ''),
(5, 2, 'municipio 5', 'Equis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo vo', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or', '20° en la noche y 60° en el día', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones_tb`
--

CREATE TABLE `regiones_tb` (
  `reg_id` int(3) NOT NULL COMMENT 'ID de la región ',
  `reg_name` varchar(30) NOT NULL COMMENT 'Nombre de la región'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `regiones_tb`
--

INSERT INTO `regiones_tb` (`reg_id`, `reg_name`) VALUES
(1, 'Region 1'),
(2, 'Region 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_atrac_tb`
--

CREATE TABLE `type_atrac_tb` (
  `id_typ_atrac` int(11) NOT NULL,
  `name_typ_atrac` varchar(50) NOT NULL COMMENT 'nombre del tipo de atractivo',
  `status_typ_atrac` int(1) NOT NULL DEFAULT 1 COMMENT 'estaus del tipo de atracativo (1 activo, 0 inactivo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type_atrac_tb`
--

INSERT INTO `type_atrac_tb` (`id_typ_atrac`, `name_typ_atrac`, `status_typ_atrac`) VALUES
(1, 'Tipo 1', 1),
(2, 'Tipo 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_img_tb`
--

CREATE TABLE `type_img_tb` (
  `type_img_id` int(2) NOT NULL,
  `type_img_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `type_img_tb`
--

INSERT INTO `type_img_tb` (`type_img_id`, `type_img_name`) VALUES
(1, 'Carrusel de atractivo'),
(2, 'Galeria de atractivo'),
(3, 'Portada'),
(4, 'Fondo dinamico'),
(5, 'Logo de región'),
(6, 'Logos cintillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_tb`
--

CREATE TABLE `users_tb` (
  `id_users` int(2) NOT NULL COMMENT 'id del usuario	',
  `name_user` varchar(15) NOT NULL COMMENT 'nombre de acceso del usuario	',
  `contra_user` varchar(100) NOT NULL COMMENT 'contraseña del usuario	',
  `status_user` int(1) NOT NULL DEFAULT 1 COMMENT 'estatus de usuario (1 activo, 2 inactivo)	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_tb`
--

INSERT INTO `users_tb` (`id_users`, `name_user`, `contra_user`, `status_user`) VALUES
(1, 'admin', 'c8f027e3e01b50712a7248b7a295ccc9f66690d5', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atractivos_tb`
--
ALTER TABLE `atractivos_tb`
  ADD PRIMARY KEY (`atrac_id`);

--
-- Indices de la tabla `gallery_tb`
--
ALTER TABLE `gallery_tb`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indices de la tabla `municipios_tb`
--
ALTER TABLE `municipios_tb`
  ADD PRIMARY KEY (`muni_id`);

--
-- Indices de la tabla `regiones_tb`
--
ALTER TABLE `regiones_tb`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indices de la tabla `type_img_tb`
--
ALTER TABLE `type_img_tb`
  ADD PRIMARY KEY (`type_img_id`);

--
-- Indices de la tabla `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atractivos_tb`
--
ALTER TABLE `atractivos_tb`
  MODIFY `atrac_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id del atractivo', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `gallery_tb`
--
ALTER TABLE `gallery_tb`
  MODIFY `gal_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID de la imagen', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `municipios_tb`
--
ALTER TABLE `municipios_tb`
  MODIFY `muni_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id del municipio', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `regiones_tb`
--
ALTER TABLE `regiones_tb`
  MODIFY `reg_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID de la región ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `type_img_tb`
--
ALTER TABLE `type_img_tb`
  MODIFY `type_img_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_users` int(2) NOT NULL AUTO_INCREMENT COMMENT 'id del usuario	', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
