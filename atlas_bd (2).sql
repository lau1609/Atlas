-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 08:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atlas_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `atractivos_tb`
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
-- Dumping data for table `atractivos_tb`
--

INSERT INTO `atractivos_tb` (`atrac_id`, `atrac_muni_id`, `atrac_type`, `atrac_reg_id`, `atrac_name`, `atrac_cover_text`, `atrac_desc`, `atrac_latitud`, `atrac_longitud`, `atrac_direcc`, `atrac_horario`, `atrac_mail`, `atrac_tel`, `atrac_price`, `atrac_soc_face`, `atrac_soc_inst`, `atrac_status`) VALUES
(1, 4, 2, 2, 'Lago Arareko', 'Un paraíso natural con aguas cristalinas.', 'El Lago Arareko es un espectacular cuerpo de agua rodeado de bosques de pino y encino, ideal para paseos en kayak, pesca y camping. Su tranquilidad y belleza lo convierten en un destino imperdible en la Sierra Tarahumara.', 27.6458, -107.5746, 'Carretera Creel-Bocoyna Km 5, Bocoyna, Chihuahua', '08:00 - 18:00', 'info@lagoarareko.com', '6141234567', 50, 'facebook.com/LagoArareko', 'instagram.com/LagoArareko', 1),
(2, 4, 3, 2, 'Valle de los Hongos', 'Impresionantes formaciones rocosas en la Sierra.', 'El Valle de los Hongos destaca por sus peculiares estructuras de piedra que, por su forma, asemejan hongos gigantes. Es un sitio perfecto para la fotografía y la exploración de paisajes naturales únicos.', 27.6532, -107.5893, 'Valle de los Hongos, Bocoyna, Chihuahua', '09:00 - 17:00', 'info@valledeloshongos.com', '6147654321', 30, 'facebook.com/ValleHongos', 'instagram.com/ValleHongos', 1),
(3, 4, 1, 2, 'Valle de los Monjes', 'Paisajes místicos con formaciones verticales.', 'El Valle de los Monjes es famoso por sus imponentes columnas de piedra que emergen de la tierra, semejando figuras religiosas en oración. Un lugar ideal para el senderismo y la contemplación de la naturaleza.', 27.6401, -107.5752, 'Valle de los Monjes, Bocoyna, Chihuahua', '07:00 - 19:00', 'info@valledelosmonjes.com', '6149876543', 30, 'facebook.com/ValleMonjes', 'instagram.com/ValleMonjes', 1),
(4, 4, 4, 2, 'Presa Sisoguichi', 'Un cuerpo de agua rodeado de montañas.', 'La Presa Sisoguichi es un lugar ideal para la pesca, paseos en lancha y el descanso en medio de la Sierra Tarahumara. Su belleza natural y tranquilidad lo convierten en un refugio perfecto para desconectarse del ruido urbano.', 27.648, -107.572, 'Carretera Bocoyna - Sisoguichi Km 12, Bocoyna, Chihuahua', '07:00 - 18:00', 'info@presasiso.com', '6145678901', 30, 'facebook.com/PresaSisoguichi', 'instagram.com/PresaSisoguichi', 1),
(5, 6, 3, 2, 'Cañón del Jaguar', 'Un espectacular paisaje natural en Guachochi.', 'El Cañón del Jaguar ofrece imponentes paredes rocosas y senderos para los amantes del ecoturismo. Su biodiversidad y la belleza de su entorno lo convierten en un destino ideal para la exploración y la fotografía.', 27.3551, -107.6235, 'Carretera Guachochi-Barranca del Cobre, Guachochi, Chihuahua', '07:00 - 18:00', 'info@canonjaguar.com', '6148765432', 40, 'facebook.com/CanonJaguar', 'instagram.com/CanonJaguar', 1),
(6, 6, 1, 2, 'Kokoyame', 'Miradores naturales con vistas espectaculares.', 'Kokoyame es un lugar rodeado de imponentes formaciones rocosas que ofrecen una vista impresionante de la Sierra Tarahumara. Un destino perfecto para senderismo y aventura.', 27.32, -107.5603, 'Barranca de Kokoyame, Guachochi, Chihuahua', '08:00 - 17:00', 'info@kokoyame.com', '6147654321', 30, 'facebook.com/Kokoyame', 'instagram.com/Kokoyame', 1),
(7, 6, 2, 2, 'Lago Las Garzas', 'Espejo de agua rodeado de naturaleza.', 'Este lago es un sitio ideal para paseos en kayak, avistamiento de aves y senderismo. Su tranquilidad y biodiversidad lo convierten en un refugio perfecto para el descanso en medio de la Sierra.', 27.3251, -107.5598, 'Carretera Guachochi - Creel Km 15, Guachochi, Chihuahua', '08:00 - 17:00', 'info@lagolasgarzas.com', '6147654321', 30, 'facebook.com/LagoLasGarzas', 'instagram.com/LagoLasGarzas', 1),
(8, 6, 4, 2, 'Cascada El Salto', 'Impresionante caída de agua rodeada de bosque.', 'La Cascada El Salto es uno de los principales atractivos naturales de Guachochi. Su belleza y altura la convierten en un destino espectacular para senderismo y fotografía.', 27.3105, -107.5532, 'Barranca de El Salto, Guachochi, Chihuahua', '08:00 - 17:00', 'info@cascadaelsalto.com', '6147654321', 40, 'facebook.com/CascadaElSalto', 'instagram.com/CascadaElSalto', 1),
(9, 3, 4, 4, 'Cañón del Peguis', 'Impresionantes paisajes naturales.', 'El Cañón del Peguis ofrece vistas espectaculares con enormes paredes rocosas y un río que lo atraviesa, ideal para senderismo y kayak.', 29.5703, -104.4485, 'Ojinaga, Chihuahua', '07:00 - 19:00', 'info@canonpeguis.com', '6158765432', 60, 'facebook.com/CanonPeguis', 'instagram.com/CanonPeguis', 1),
(10, 3, 2, 4, 'Cañón del Mulato', 'Imponentes formaciones rocosas.', 'Ubicado en la frontera de Chihuahua, este cañón ofrece senderos con vistas espectaculares y áreas ideales para escalada.', 29.5753, -104.4492, 'Cañón del Mulato, Ojinaga, Chihuahua', '07:00 - 19:00', 'info@canonmulato.com', '6158765432', 40, 'facebook.com/CanonMulato', 'instagram.com/CanonMulato', 1),
(11, 3, 3, 4, 'Sierra Rica', 'Imponente sierra con paisajes únicos.', 'Ubicada en Ojinaga, esta sierra ofrece vistas panorámicas, rutas de senderismo y oportunidades para explorar la biodiversidad del desierto.', 29.5731, -104.4452, 'Sierra Rica, Ojinaga, Chihuahua', '07:00 - 19:00', 'info@sierrarica.com', '6158765432', 60, 'facebook.com/SierraRica', 'instagram.com/SierraRica', 1),
(12, 5, 3, 7, 'Catedral de Guadalupe', 'Impresionante templo histórico en Parral.', 'La Catedral de Nuestra Señora de Guadalupe en Hidalgo del Parral es una joya arquitectónica con una historia que data del siglo XVIII. Su fachada de cantera y sus impresionantes vitrales la convierten en un sitio imperdible.', 26.9358, -105.6692, 'Av. Independencia #200, Hidalgo del Parral, Chihuahua', '07:00 - 19:00', 'info@catedralguadalupe.com', '6143456789', 0, 'facebook.com/CatedralGuadalupe', 'instagram.com/CatedralGuadalupe', 1),
(13, 5, 4, 7, 'Tumba de Francisco Villa', 'Sitio histórico de descanso del legendario revolucionario.', 'Aquí reposan los restos de Francisco Villa, líder de la Revolución Mexicana. Es un sitio de gran significado histórico, visitado por turistas y estudiosos de la historia.', 26.9365, -105.6701, 'Cementerio Municipal, Hidalgo del Parral, Chihuahua', '08:00 - 18:00', 'info@tumbafranciscovilla.com', '6149876543', 20, 'facebook.com/TumbaVilla', 'instagram.com/TumbaVilla', 1),
(14, 5, 2, 7, 'Museo Mina La Prieta', 'Vestigios históricos de la minería en Parral.', 'Este museo presenta la historia minera de Hidalgo del Parral, con túneles restaurados y exhibiciones de herramientas antiguas. Es un recorrido fascinante por la riqueza del pasado minero de la región.', 26.9392, -105.6713, 'Calle Mina La Prieta #101, Hidalgo del Parral, Chihuahua', '09:00 - 18:00', 'info@minalaprieta.com', '6147654321', 50, 'facebook.com/MinaLaPrieta', 'instagram.com/MinaLaPrieta', 1),
(15, 5, 1, 7, 'Templo de San José', 'Arquitectura colonial en Hidalgo del Parral.', 'Este templo es un ícono de la ciudad, con una estructura colonial impresionante y detalles históricos en su interior. Su belleza arquitectónica y su importancia cultural lo convierten en un punto obligado para visitantes.', 26.9388, -105.6698, 'Calle San José #78, Hidalgo del Parral, Chihuahua', '07:00 - 19:00', 'info@templosanjose.com', '6145678901', 20, 'facebook.com/TemploSanJose', 'instagram.com/TemploSanJose', 1),
(16, 4, 1, 2, 'Cascada de Rukíraso', 'Bellísima caída de 30 metros de altura al inicio de la Barranca de Tararecua. La cascada se forma con las aguas del Arroyo de San Ignacio.', 'Este templo es un ícono de la ciudad, con una estructura colonial impresionante y detalles históricos en su interior. Su belleza arquitectónica y su importancia cultural lo convierten en un punto obligado para visitantes.', 26.9388, -105.6698, 'Calle San José #78, Hidalgo del Parral, Chihuahua', '07:00 - 19:00', 'info@templosanjose.com', '6145678901', 20, 'facebook.com/TemploSanJose', 'instagram.com/TemploSanJose', 1),
(17, 2, 1, 5, 'Museo de Arte de Ciudad Juárez', '\r\n¡Ven a vistar nuestro museo!', 'Este Museo se construyó en 1963, como parte del PROGRAMA NACIONAL FRONTERIZO (PRONAF). Se abrió al público en 1964 en el periodo presidencial de Adolfo López Mateos. Uno de los objetivos que el PRONAF tenía era la creación de centros culturales y de diversión a lo largo de toda la franja fronteriza de México con los Estados Unidos.', 31.74150548086293, -106.45439163040076, 'C. C 51 Parque Público de El Chamizal CP 32030 Juárez, Juárez, Chihuahua', 'De martes a sábado, 10:00 - 18:00 hrs. Domingo, 12:00 - 17:00 hrs.', 'test4@gmail.com', '6141269573', 0, '', '', 1),
(100, 1, 1, 3, 'Grutas Nombre de Dios', 'Adéntrate en el fascinante mundo subterráneo de las Grutas Nombre de Dios, una maravilla natural ubicada en Chihuahua Capital.', 'A sólo 20 minutos del centro de la ciudad, en la Sierra de Nombre de Dios, se localizan estas cavidades naturales.\r\n', 28.709567403477926, -106.07679614594073, 'Vialidad Sacramento S/N, 31146 Chihuahua, Chih.', 'Lunes a sabado de 10am a 4pm', 'test@gmail.com', '6142004800', 250, 'https://www.facebook.com/GrutasCUUOficial/', '', 0),
(1300, 1, 1, 2, 'Cascada de Basaseachi', 'La leyenda de la cascada de Basaseachi narra la historia de una joven tarahumara que se arrojó a un abismo y se convirtió en una cascada', 'Parque nacional de México es conocido por la caída de agua que le da su nombre, considerada como la segunda más alta del país', 28.180149852273832, -108.21051023882741, '33326 Chih', 'Mie a Lun 5am - 8pm / Mar 1am - 8pm', 'test@gmail.com', '6143259875', 200, '', '', 1),
(1600, 1, 2, 3, 'Paquime', 'Zona arqueológica de Paquimé (Casas Grandes)', 'Paquimé fue un asentamiento que influyó en el noroeste de la Sierra Madre Occidental, la mayor parte del oeste de Chihuahua y algunas áreas de Sonora, Arizona y Nuevo México. Los restos de esta ciudad testimonian el desarrollo cultural del norte del México antiguo y la perfección de la arquitectura de tierra de la región serrana de Chihuahua, una mezcla de las técnicas constructivas de Mesoamérica y del suroeste de Estados Unidos.', 28.67980247508923, -106.12708311895072, '31120 Chihuahua, Chih.', '24/7', 'test2@gmail.com', '6145687968', 123, 'https://www.facebook.com/share/12Fu9Mef6Cv/', '', 1),
(1700, 1, 1, 2, 'Valle de los Monjes', 'La leyenda dice que fueron monjes que se quedaron petrificados realizando profundas reflexiones. La ciencia explica que son formaciones rocosas que se han desgastado por la lluvia y el viento, de cualquier forma son espectaculares', 'Dentro de la Sierra Tarahumara, en el estado de Chihuahua, se esconde un lugar repleto de rocas gigantes y puntiagudas que han estado ahí desde hace millones de años. El sitio se llama Valle de los Monjes.', 28.690328850170403, -106.0104891441744, '31313 Chihuahua, Chih.', '24/7', 'test3@gmail.com', '6144563210', 99, '', '', 1),
(1900, 1, 1, 6, 'Zoológico San Jorge', 'Grandes felinos y camellos en recintos arbolados, además de una piscina con toboganes y barbacoas.', 'Este parque es ideal para la recreación de toda la familia, ya que cuenta con áreas verdes, albercas poco profundas y con salvavidas certificados, toboganes, canchas de basquetbol, voleibol y futbol, así como asadores y senderos.\r\n\r\nPor supuesto, la mayor atracción es el zoológico con una gran variedad de especies como aves, monos, reptiles y grandes felinos como los tigres.', 31.60942865792134, -106.32231240739097, 'Mariano Abasolo 1016, El Sauzal, 32599 Juárez, Chih.', 'Lun a Vie 9:300 - 6:30', 'test5@gmail.com', '6145623589', 100, '', '', 0),
(2000, 2, 0, 7, 'Lago de Arareco', 'El lago de Arareco se ubica en lo alto de la Sierra Madre Occidental en el estado mexicano de Chihuahua, a 5 km de Creel, Chihuahua, en el municipio de Bocoyna, junto al ejido tarahumara de San Ignacio de Arareco.', 'A tan solo 5 kilómetros de Creel se localiza San Ignacio de Arareko, comunidad tarahumara que  se extiende en una superficie de 20 mil hectáreas de bosque. El centro de la comunidad está asentado en el Valle de Arareko en donde se encuentra la Misión de San Ignacio, sitio de reunión de la comunidad local en los días domingo.\r\nEn el valle se encuentran peculiares formaciones rocosas de origen natural, las cuales se multiplican sobre el terreno en perfiles y figuras singulares. La visita lago es impresionante cuando flotas en el con un bote de remos, déjate llevar por la mágica escena.', 27.71193211742632, -107.59160073252612, '33237 Chih.', 'Todo el día', 'test6@gmail.com', '614321569', 55, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_tb`
--

CREATE TABLE `gallery_tb` (
  `gal_id` int(4) NOT NULL COMMENT 'ID de la imagen',
  `gal_url` text NOT NULL COMMENT 'ruta de la imagen ',
  `gal_type` int(2) NOT NULL COMMENT 'Caterogia de la img',
  `gal_dif` int(2) NOT NULL COMMENT 'Diferenciador de la imagen',
  `gal_url_img` varchar(250) DEFAULT NULL COMMENT 'URL de las imagenes (logos de cintillo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_tb`
--

INSERT INTO `gallery_tb` (`gal_id`, `gal_url`, `gal_type`, `gal_dif`, `gal_url_img`) VALUES
(1, 'administrador\\_images/imgAtractivos/ararekoport.jpg', 3, 1, NULL),
(2, 'administrador\\_images/imgAtractivos/cascadasaltoport.jpg', 3, 8, NULL),
(3, 'administrador\\_images/imgAtractivos/catedralguadalupeport.jpg', 3, 12, NULL),
(4, 'administrador\\_images/imgAtractivos/jaguarport.jpg', 3, 5, NULL),
(5, 'administrador\\_images/imgAtractivos/kokoyameport.jpg', 3, 6, NULL),
(6, 'administrador\\_images\\imgAtractivos\\lagogarzasport.jpg', 3, 7, NULL),
(7, 'administrador\\_images/imgAtractivos/minaprietaport.jpg', 3, 14, NULL),
(8, 'administrador\\_images/imgAtractivos/mulatoport.jpg', 3, 10, NULL),
(9, 'administrador\\_images/imgAtractivos/peguisport.jpg', 3, 9, NULL),
(10, 'administrador\\_images/imgAtractivos/sierraricaport.jpg', 3, 11, NULL),
(11, 'administrador\\_images/imgAtractivos/sisoguichiport.jpg', 3, 4, NULL),
(12, 'administrador\\_images/imgAtractivos/templosanjoseport.jpg', 3, 15, NULL),
(13, 'administrador\\_images/imgAtractivos/tumbavillaport.jpg', 3, 13, NULL),
(14, 'administrador\\_images/imgAtractivos/valle_hongosport.jpg', 3, 2, NULL),
(15, 'administrador\\_images/imgAtractivos/valle_monjesport.jpg', 3, 3, NULL),
(16, 'administrador\\_images/imgAtractivos/arareko1.jpg***administrador\\_images/imgAtractivos/arareko2.jpg***administrador\\_images/imgAtractivos/arareko3.jpg', 2, 1, NULL),
(17, 'administrador\\_images/imgAtractivos/cascadasalto1.jpg***administrador\\_images/imgAtractivos/cascadasalto2.jpg***administrador\\_images/imgAtractivos/cascadasalto3.jpg', 2, 8, NULL),
(18, 'administrador\\_images/imgAtractivos/catedralguadalupe1.jpg***administrador\\_images/imgAtractivos/catedralguadalupe2.jpg***administrador\\_images/imgAtractivos/catedralguadalupe3.jpg', 2, 12, NULL),
(19, 'administrador\\_images/imgAtractivos/jaguar1.jpeg*** administrador\\_images/imgAtractivos/jaguar2.jpg*** administrador\\_images/imgAtractivos/jaguar3.jpg', 2, 5, NULL),
(20, 'administrador\\_images/imgAtractivos/kokoyame1.jpg***administrador\\_images/imgAtractivos/kokoyame2.jpg***administrador\\_images/imgAtractivos/kokoyame3.jpg', 2, 6, NULL),
(21, 'administrador\\_images/imgAtractivos/lagogarzas1.jpg***administrador\\_images/imgAtractivos/lagogarzas2.jpg', 2, 7, NULL),
(22, 'administrador\\_images/imgAtractivos/minaprieta1.jpg***administrador\\_images/imgAtractivos/minaprieta2.jpg***administrador\\_images/imgAtractivos/minaprieta3.jpg', 2, 14, NULL),
(23, 'administrador\\_images/imgAtractivos/mulato1.jpg***administrador\\_images/imgAtractivos/mulato2.jpg***administrador\\_images/imgAtractivos/mulato3.jpg', 2, 10, NULL),
(24, 'administrador\\_images/imgAtractivos/peguis1.jpg***administrador\\_images/imgAtractivos/peguis2.jpg***administrador\\_images/imgAtractivos/peguis3.jpg', 2, 9, NULL),
(25, 'administrador\\_images/imgAtractivos/sierrarica1.jpg***administrador\\_images/imgAtractivos/sierrarica2.jpg***administrador\\_images/imgAtractivos/sierrarica3.jpg', 2, 11, NULL),
(26, 'administrador\\_images/imgAtractivos/sisoguichi1.jpg***administrador\\_images/imgAtractivos/sisoguichi2.jpg***administrador\\_images/imgAtractivos/sisoguichi3.jpg', 2, 4, NULL),
(27, 'administrador\\_images/imgAtractivos/templosanjose1.jpg***administrador\\_images/imgAtractivos/templosanjose2.jpg', 2, 15, NULL),
(28, 'administrador\\_images/imgAtractivos/tumbavilla1.jpg***administrador\\_images/imgAtractivos/tumbavilla2.jpg', 2, 13, NULL),
(29, 'administrador\\_images/imgAtractivos/valle_hongos1.jpg***administrador\\_images/imgAtractivos/valle_hongos2.jpg***administrador\\_images/imgAtractivos/valle_hongos3.jpg', 2, 2, NULL),
(30, 'administrador\\_images/imgAtractivos/valle_monjes1.jpg***administrador\\_images/imgAtractivos/valle_monjes2.jpg***administrador\\_images/imgAtractivos/valle_monjes3.jpg', 2, 3, NULL),
(31, 'administrador\\_images/imgAtractivos/rukiraso1.jpg***administrador\\_images/imgAtractivos/rukiraso2.jpg***administrador\\_images/imgAtractivos/rukiraso3.jpg', 2, 14, NULL),
(2100, '_images/imgAtractivos/Cascada de Basaseachi1.jpeg', 2, 13, NULL),
(2300, 'administrador\\_images\\imgAtractivos\\grutasprot.jpg', 3, 100, NULL),
(2700, '_images/imgAtractivos/Valle de los Monjes1.jpg', 2, 17, NULL),
(2900, '_images/imgAtractivos/Museo de Arte de Ciudad Juárez.jpg', 3, 18, NULL),
(3000, '_images/imgAtractivos/Museo de Arte de Ciudad Juárez1.jpg', 2, 18, NULL),
(3100, '_images/imgAtractivos/Zoológico San Jorge.jpg', 3, 19, NULL),
(3200, '_images/imgAtractivos/Zoológico San Jorge1.jpg', 2, 19, NULL),
(3300, '_images/imgAtractivos/Lago de Arareco.jpg', 3, 20, NULL),
(3600, '_images/_svg/fondoCh.svg', 4, 0, NULL),
(3700, '_images/imagenesPlat/rnt.png.png', 6, 0, 'https://rnt.sectur.gob.mx/'),
(3900, '_images/imgAtractivos/Lago de Arareco1.jpg***_images/imgAtractivos/Lago de Arareco2.jpg***_images/imgAtractivos/Lago de Arareco.jpg', 2, 20, NULL),
(4000, 'administrador\\_images\\logos\\arqueologica.svg', 5, 1, ''),
(4100, 'administrador\\_images\\logos\\barrancas.svg', 5, 2, ''),
(4200, 'administrador\\_images\\logos\\chihuahua.svg', 5, 3, ''),
(4300, 'administrador\\_images\\logos\\desierto.svg', 5, 4, ''),
(4400, 'administrador\\_images\\logos\\juarez.svg', 5, 5, ''),
(4500, 'administrador\\_images\\logos\\perlas.svg', 5, 6, ''),
(4600, 'administrador\\_images\\logos\\ruta de villa.svg', 5, 7, ''),
(4602, 'administrador\\_images/imgAtractivos/rukirasoport.jpg', 3, 16, NULL),
(4604, 'administrador\\_images/imgAtractivos/juangaport.jpg', 3, 17, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `municipios_tb`
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
-- Dumping data for table `municipios_tb`
--

INSERT INTO `municipios_tb` (`muni_id`, `muni_reg_id`, `muni_name`, `muni_cover_text`, `muni_desc`, `muni_temp`, `muni_cult`, `muni_nat`) VALUES
(1, 3, 'Chihuahua', 'Capital vibrante con historia, cultura y naturaleza; hogar de la Catedral, el Museo Casa Chihuahua y el imponente Parque Nacional Cumbres de Majalca.', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'Sed ut perspiciatis 50º unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, ', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore'),
(2, 5, 'Juárez', 'Ciudad fronteriza con vida nocturna, gastronomía única y atractivos como la X de Juárez, el Chamizal y el histórico Centro Cultural Paso del Norte.', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or', 'clima de 40° en toda la region', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i'),
(3, 4, 'Ojinaga', 'Rodeado por desiertos y cañones espectaculares, ofrece paisajes como el Cañón del Peguis y la Sierra Rica, perfectos para el ecoturismo y la aventura.', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'Sed ut perspiciatis 80º unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inven', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore'),
(4, 2, 'Bocoyna', 'Corazón de la Sierra Tarahumara, con Creel como su joya turística y maravillas naturales como el Lago Arareko, el Valle de los Hongos y los Monjes.', 'descripcion del municipio actual. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, s', 'eaque ipsa70° quae ab illo inven', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', ''),
(5, 7, 'Hidalgo del Parral', 'Pueblo histórico con legado minero y revolucionario, donde destacan el Museo Mina La Prieta, la Catedral de Guadalupe y la Tumba de Pancho Villa.', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or', '20° en la noche y 60° en el día', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i'),
(6, 2, 'Guachochi', 'Tierra de barrancas majestuosas como Sinforosa y atractivos naturales como Kokoyame, el Lago Las Garzas y la Cascada El Salto, ideales para exploración.', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or', '20° en la noche y 60° en el día', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur i');

-- --------------------------------------------------------

--
-- Table structure for table `regiones_tb`
--

CREATE TABLE `regiones_tb` (
  `reg_id` int(3) NOT NULL COMMENT 'ID de la región ',
  `reg_name` varchar(30) NOT NULL COMMENT 'Nombre de la región'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regiones_tb`
--

INSERT INTO `regiones_tb` (`reg_id`, `reg_name`) VALUES
(1, 'Arqueológica'),
(2, 'Barrancas del Cobre'),
(3, 'Chihuahua'),
(4, 'Desierto Chihuahuense'),
(5, 'Juárez'),
(6, 'Perlas del Conchos'),
(7, 'Ruta de Villa');

-- --------------------------------------------------------

--
-- Table structure for table `type_atrac_tb`
--

CREATE TABLE `type_atrac_tb` (
  `id_typ_atrac` int(11) NOT NULL,
  `name_typ_atrac` varchar(50) NOT NULL COMMENT 'nombre del tipo de atractivo',
  `status_typ_atrac` int(1) NOT NULL DEFAULT 1 COMMENT 'estaus del tipo de atracativo (1 activo, 0 inactivo)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_atrac_tb`
--

INSERT INTO `type_atrac_tb` (`id_typ_atrac`, `name_typ_atrac`, `status_typ_atrac`) VALUES
(1, 'Tipo 1', 1),
(2, 'Tipo 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_img_tb`
--

CREATE TABLE `type_img_tb` (
  `type_img_id` int(2) NOT NULL,
  `type_img_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_img_tb`
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
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `id_users` int(2) NOT NULL COMMENT 'id del usuario	',
  `name_user` varchar(15) NOT NULL COMMENT 'nombre de acceso del usuario	',
  `contra_user` varchar(100) NOT NULL COMMENT 'contraseña del usuario	',
  `status_user` int(1) NOT NULL DEFAULT 1 COMMENT 'estatus de usuario (1 activo, 2 inactivo)	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`id_users`, `name_user`, `contra_user`, `status_user`) VALUES
(1, 'admin', 'c8f027e3e01b50712a7248b7a295ccc9f66690d5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atractivos_tb`
--
ALTER TABLE `atractivos_tb`
  ADD PRIMARY KEY (`atrac_id`);

--
-- Indexes for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indexes for table `municipios_tb`
--
ALTER TABLE `municipios_tb`
  ADD PRIMARY KEY (`muni_id`);

--
-- Indexes for table `regiones_tb`
--
ALTER TABLE `regiones_tb`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `type_img_tb`
--
ALTER TABLE `type_img_tb`
  ADD PRIMARY KEY (`type_img_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atractivos_tb`
--
ALTER TABLE `atractivos_tb`
  MODIFY `atrac_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id del atractivo', AUTO_INCREMENT=2003;

--
-- AUTO_INCREMENT for table `gallery_tb`
--
ALTER TABLE `gallery_tb`
  MODIFY `gal_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID de la imagen', AUTO_INCREMENT=4605;

--
-- AUTO_INCREMENT for table `municipios_tb`
--
ALTER TABLE `municipios_tb`
  MODIFY `muni_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Id del municipio', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regiones_tb`
--
ALTER TABLE `regiones_tb`
  MODIFY `reg_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'ID de la región ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type_img_tb`
--
ALTER TABLE `type_img_tb`
  MODIFY `type_img_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id_users` int(2) NOT NULL AUTO_INCREMENT COMMENT 'id del usuario	', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
