-- phpMyAdmin SQL Dump
-- version 5.1.0-rc1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2022 a las 12:36:41
-- Versión del servidor: 8.0.30-0ubuntu0.22.04.1
-- Versión de PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papajhons`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `text_address` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `phone` text NOT NULL,
  `commune` text NOT NULL,
  `region` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `name`, `text_address`, `latitude`, `longitude`, `phone`, `commune`, `region`) VALUES
(2, 'Providencia', 'Av. Providencia 1349', '-33.428823', '-70.619916', '+56 2 2390 7300', 'Providencia', 'Santiago'),
(9, 'Salvador', 'Av. Salvador 1822, Ñuñoa, Región Metropolitana, Chile', '-33.44969', '-70.621613', '+56 2 2244 7888', 'Ñuñoa', 'Región Metropolitana'),
(10, 'Líder Suecia', 'Irarrázaval 2928', '-33.454338', '-70.600634', '+56 2 2396 4000 ', 'Ñuñoa', 'Santiago'),
(11, 'Reñaca', 'Avenida Borgoño 14650', '-32.970258', '-71.543539', '+56 2 2490 1010', 'Viña del Mar', 'Valparaiso'),
(12, 'Quilín', 'Tobalaba 13667, Penalolen, Peñalolén, Chile', '-33.498764', '-70.560785', '+56 2 2488 6060', 'Peñalolen', 'Región Metropolitana'),
(13, 'Viña del Mar', 'Av. Libertad 1410, Viña del Mar, Región de Valparaíso, Chile', '-33.008049', '-71.548475', '+56 3 22696000', 'Viña del Mar', 'Región de Valparaíso'),
(14, 'Concón', 'Edmundo Eluchans 3400, Local 7 y 8', '-32.949609', '-71.544829', '+56 3 22858000', 'Valparaiso', 'Valparaiso'),
(15, 'Viña Centro', 'Álvarez 1106, Viña del Mar, Región de Valparaíso, Chile', '-33.027926', '-71.547051', '+56 3 22694040', 'Viña del mar', 'Región de Valparaíso'),
(16, 'Curauma', 'Avenida Curauma Norte 2961', '-33.129501', '-71.562882', '+56 3 22357878', 'Placilla', 'Valparaiso'),
(17, 'La Dehesa', 'Avenida La Dehesa 2035', '-33.352068', '-70.518173', '+56 2 29555555', 'Lo Barnechea', 'Santiago'),
(18, 'Vitacura', 'Av Vitacura 6477, Vitacura, Región Metropolitana, Chile', '-33.389459', '-70.568809', '+56 2 22189999', 'Vitacura', 'Metropolitana'),
(19, 'Los Trapenses', 'Camino del Monje 10530, Lo Barnechea, Región Metropolitana, Chile', '-33.346887', '-70.542738', '+56 2 29557777', 'Lo Barnechea', 'Metropolitana'),
(20, 'Luis Pasteur', 'Calle Luis Pasteur 5923, Vitacura, Región Metropolitana, Chile', '-33.387769', '-70.576785', '+56 2 22187000', 'Vitacura', 'Metropolitana'),
(21, 'El Alba', 'Camino El Alba 12620, Las Condes, Región Metropolitana, Chile', '-33.398935', '-70.50729', '+56 2 29485555', 'Las Condes', 'Metropolitana'),
(22, 'San Damián', 'San Damian 20', '-33.376485', '-70.524893', '+56 2 22153000', 'Las Condes', 'Región Metropolitana'),
(23, 'Ñuñoa', 'Av. Pedro de Valdivia 3774, Ñuñoa, Región Metropolitana, Chile', '-33.457616', '-70.605181', '+56 2 22691000', 'Ñuñoa', 'Metropolitana'),
(24, 'Peñalolen', 'Antupiren 8340, Penalolen, Peñalolén, Región Metropolitana, Chile', '-33.478835', '-70.545497', '+56 2 22783000', 'Peñalolen', 'Metropolitana'),
(25, 'La Florida', 'Rojas Magallanes 1280, La Florida, Región Metropolitana, Chile', '-33.535422', '-70.574042', '+56 2 22877000', 'La Florida', 'Región Metropolitana'),
(26, 'Ossa', 'Av. Ossa 345, La Reina, Región Metropolitana, Chile', '-33.450869', '-70.570853', '+56 2 22662000', 'La Reina', 'Metropolitana'),
(28, 'Macul', 'Av Macul 2555, Macul, Región Metropolitana, Chile', '-33.478071', '-70.599056', '+56 2 22373000', 'Macul', 'Metropolitana'),
(29, 'irarrazaval', 'Irarrázaval 4949, Ñuñoa, Región Metropolitana, Chile', '-33.454884', '-70.579076', '+56 2 22262828', 'Ñuñoa', 'Metropolitana'),
(30, 'Puente Alto', 'Av. Concha Y Toro 625, Puente Alto, Región Metropolitana, Chile', '-33.60551', '-70.576432', '+56 2 29490555', 'Puente Alto', 'Metropolitana'),
(31, 'San miguel', 'Gran Avenida Jose Miguel Carrera 5001, San Miguel, Región Metropolitana, Chile', '-33.500236', '-70.654457', '+56 2 25173000', 'San Miguel', 'Metropolitana'),
(32, 'Pajaritos', 'Caletera Vespucio 51, Maipú', '-33.485631', '-70.75076', '+56 2 27657000', 'Maipú', 'Santiago'),
(33, 'Santa Isabel', 'San Francisco 531, Santiago, Región Metropolitana, Chile', '-33.451436', '-70.647192', '+56 2 26338080', 'Santiago', 'Región Metropolitana'),
(34, 'Machali', 'Miguel Ramírez 1550', '-34.175607', '-70.702646', '+56 7 22210707', 'Rancagua', 'Ohiggins'),
(35, 'Toesca', 'Toesca 1844, Santiago, Región Metropolitana, Chile', '-33.453368', '-70.660969', '+56 2 26960505', 'Santiago', 'Región Metropolitana'),
(36, 'Rancagua Centro', 'O\'carrol 11', '-34.172131', '-70.735006', '+56 7 22275050', 'Rancagua', 'Cachapoal'),
(37, 'Maipu', 'Av. Los Pajaritos 2624, Maipú, Región Metropolitana, Chile', '-33.503419', '-70.757563', '+56 2 27591444', 'Santiago', 'Región Metropolitana'),
(38, 'Plaza Brasil', 'Compañía 1909, Santiago, Región Metropolitana, Chile', '-33.438817', '-70.65893', '+56 2 28637700', 'Santiago', 'Región Metropolitana'),
(39, 'Cosme Churruca', 'Cosme Churruca 75', '-36.787903', '-73.051815', '+56 41 2480606', 'Concepción', 'Concepcion'),
(40, 'Pedro de Valdivia', 'Pedro de Valdivia 1010, Concepción, Región del Bío Bío, Chile', '-36.846237', '-73.052255', '+56 41 2333000', 'Concepción', 'Región del Bio Bio'),
(41, 'Los Angeles', 'Ercilla 195, Los Angeles, Los Ángeles, Región del Bío Bío, Chile', '-37.471392', '-72.355345', '+56 43 2314949', 'Los Angeles', 'Región del Bio Bio'),
(42, 'San Pedro', 'Camino El Venado 716, San Pedro de la Paz, San Pedro, Región del Bío Bío, Chile', '-36.849539', '-73.093465', '+56 41 2738000', 'San Pedro', 'Región del Bio Bio'),
(43, 'Temuco Av. Alemania', 'Av. Alemania 890, Temuco, Región de la Araucanía, Chile', '-38.733455', '-72.615783', '+56 45 2925200', 'Temuco', 'Región de la Araucanía'),
(44, 'Temuco Los Pablos ', 'Los Pablos 1880, Temuco, Región de la Araucanía, Chile', '-38.743682', '-72.637422', '+56 45 2925252', 'Temuco', 'Región de la Araucanía'),
(45, 'Huechuraba', 'Pedro Fontova 7455, Huechuraba, Región Metropolitana, Chile', '-33.351829', '-70.67039', '+56 2 29523600', 'Huechuraba', 'Región Metropolitana'),
(46, 'Las Condes', 'Av. las Condes 9049, Las Condes, Región Metropolitana, Chile', '-33.393398', '-70.544119', '+56 2 23422020', 'Las Condes', 'Región Metropolitana'),
(48, 'El Bosque', 'Tobalaba 201, Providencia, Región Metropolitana, Chile', '-33.419657', '-70.599999', '+56 2 22441020', 'Las Condes', 'Región Metropolitana'),
(49, 'Chicureo', 'Paseo Colina Sur, Chicureo, Colina, Región Metropolitana, Chile', '-33.283564', '-70.627422', '+56 2 22450088', 'Colina', 'Región Metropolitana'),
(50, 'La Reina', 'Carlos Silva Vildósola 9073, La Reina, Región Metropolitana, Chile', '-33.440044', '-70.536069', '+56 2 22485555', 'La Reina', 'Región Metropolitana'),
(51, 'Froilan Roa', 'Froilán Roa 580, La Florida, Región Metropolitana, Chile', '-33.51518', '-70.599065', '+56 2 22495959', 'La Florida', 'Región Metropolitana'),
(52, 'Talca', '2 Nte. 3230, Talca, Región del Maule, Chile', '-35.430422', '-71.6313', '+56 71 2613000', 'Talca', 'Región del Maule'),
(53, 'Lider Monte Tabor', 'Av. Los Pajaritos 4500, Maipú, Región Metropolitana, Chile', '-33.480677', '-70.746919', '+56227449694', 'Maipú', 'Región Metropolitana'),
(54, 'Recoleta ', 'Av. Recoleta 806, Recoleta, Región Metropolitana, Chile', '-33.42314', '-70.645155', '+56 2 29388000', 'Recoleta', 'Región Metropolitana'),
(55, 'Diego Portales', 'Diego Portales 6303', '-33.559002', '-70.552456', '+56 2 22486300', 'Puente Alto', 'Región Metropolitana'),
(56, 'Villa Alemana', 'Avenida Valparaíso 1121', '-33.044525', '-71.37945', '+56 32 2533000', 'Villa Alemana', 'Marga Marga'),
(57, 'San Bernardo', 'Almirante Riveros 1202, San Bernardo, Región Metropolitana, Chile', '-33.615467', '-70.685573', '+56 2 23966000', 'San Bernardo', 'Región Metropolitana'),
(58, 'Talca Colin', 'Avenida Ignacio Carrera Pinto 0490', '-35.44202', '-71.684677', '+56 2 26176060', 'Talca', 'Talca'),
(59, 'Pudahuel ', 'Teniente Cruz 570, Pudahuel, Región Metropolitana, Chile', '-33.455071', '-70.738875', '+56 2 26178282', 'Pudahuel', 'Región Metropolitana'),
(60, 'Quilpue', 'Freire 1327, Quilpué, Región de Valparaíso, Chile', '-33.043331', '-71.434522', '+56 2 23806060', 'Quilpué', 'Región de Valparaíso'),
(61, 'Talcahuano', 'Colón 3252, Talcahuano, Región del Bío Bío, Chile', '-36.74271', '-73.098366', '+56 41 3801900', 'Talcahuano', 'Región del Bio Bio'),
(62, 'Recreo', 'Diego Portales 702', '-33.026658', '-71.57145', '+56 32 2386060', 'Viña del Mar', 'Valparaiso'),
(63, 'El Peñon', 'Nonato Coo 3161, Puente Alto, Región Metropolitana, Chile', '-33.580257', '-70.568912', '+56 2 26171600', 'Puente Alto', 'Región Metropolitana'),
(64, 'Maipu Cuatro Poniente', 'Av. 4 Poniente, 1197', '-33.531292', '-70.792504', '+56 2 23964040', 'Maipú', 'Región Metropolitana'),
(65, 'Osorno', 'César Ercilla 1740, Osorno, Región de los Lagos, Chile', '-40.586681', '-73.123104', '+56 2 23904300', 'Osorno', 'Región de los Lagos'),
(66, 'La Serena Huanhualí', 'Huanhuali 85, La Serena, Región de Coquimbo, Chile', '-29.914414', '-71.25842', '+56 2 23861020 ', 'La Serena', 'Región de Coquimbo'),
(67, 'Recoleta Norte', 'Av. Recoleta 2746, Recoleta, Región Metropolitana, Chile', '-33.402459', '-70.643099', '+56 2 29895050', 'Recoleta', 'Región Metropolitana'),
(68, 'Estación Central', 'Av. Padre Alberto Hurtado 60, Santiago, Estación Central, Región Metropolitana, Chile', '-33.450708', '-70.69284', '+56 2 23806200', 'Estación Central', 'Región Metropolitana'),
(69, 'Eyzaguirre', 'Eyzaguirre 307, San Bernardo, Región Metropolitana, Chile', '-33.59033', '-70.70393', '+56 2 23904343', 'San Bernardo9', 'Región Metropolitana'),
(70, 'Quilicura', 'Av. Bernardo O\'Higgins 358, Quilicura, Región Metropolitana, Chile', '-33.355124', '-70.728773', '+56 2 23966060', 'Quilicura', 'Región Metropolitana'),
(71, 'Vicuña Mackenna', 'Av. Vicuña Mackenna 9101, La Florida, Región Metropolitana, Chile', '-33.540029', '-70.591165', '+56 2 24965800', 'La Florida', 'Región Metropolitana'),
(72, 'Bandera', 'Bandera 208, Santiago, Región Metropolitana, Chile', '-33.440561', '-70.652286', '+56 2 23907373', 'Santiago', 'Región Metropolitana'),
(73, 'Serrano', 'Serrano 30, Santiago, Región Metropolitana, Chile', '-33.444429', '-70.649334', '+56 2 23827000', 'Santiago', 'Región Metropolitana'),
(74, 'Buin', 'San Martín 555, Buin, Región Metropolitana, Chile', '-33.736587', '-70.736562', '+56 2 23819090', 'Buin', 'Región Metropolitana'),
(79, 'Puerto Montt', 'Monseñor Ramon Munita 1625, Puerto Montt, Región de los Lagos, Chile', '-41.455462', '-72.934707', '+56 2 23804747', 'Puerto Montt', 'Región de los Lagos'),
(80, 'Quillota', 'Ramón Freire 1551, Quillota, Región de Valparaíso, Chile', '-32.895945', '-71.246525', '+56 32 2359300', 'Quillota', 'Región de Valparaíso'),
(81, 'Independencia', 'Av. Independencia 1946, Independencia, Región Metropolitana, Chile', '-33.409167', '-70.660274', '+56 2 23819000', 'Independencia', 'Región Metropolitana'),
(82, 'Valdivia', 'Av. Ramón Picarte 903, Valdivia, Región de los Ríos, Chile', '-39.81622', '-73.23667', '+56 2 24859300', 'Valdivia', 'Región de los Ríos'),
(84, 'Los Andes', 'Sta Teresa 680, Los Andes, Región de Valparaíso, Chile', '-32.835941', '-70.604231', '+56 323811010', 'Los Andes', 'Región de Valparaíso'),
(85, 'Melipilla', 'Vicuña Mackenna 302, Melipilla, Región Metropolitana, Chile', '-33.680442', '-71.210446', '+56 2 24886000', 'Melipilla', 'Región Metropolitana'),
(86, 'Valparaiso', 'Pedro Montt 1867, Valparaíso, Región de Valparaíso, Chile', '-33.046714', '-71.617357', '+56 32 2386777', 'Valparaiso', 'Región de Valparaíso'),
(87, 'Cerrillos', 'Av. Pedro Aguirre Cerda 7003, Los Cerrillos, Cerrillos, Región Metropolitana, Chile', '-33.501271', '-70.710684', '+56 2 24886010', 'Cerrillos', 'Región Metropolitana'),
(88, 'Calama', 'Av. Chorrillos 1759, Calama, Región de Antofagasta, Chile', '-22.455317', '-68.923893', '+56 2 24886020', 'Calama', 'Región de Antofagasta'),
(89, 'Chillán', 'Argentina 387, Chillan, Chillán, Región del Bío Bío, Chile', '-36.607107', '-72.092343', '+56 2 24886030', 'Chillán', 'Región de Ñuble'),
(90, 'Hualpen', 'Av. Cristóbal Colón 9280, Hualpen, Hualpén, Región del Bío Bío, Chile', '-36.801248', '-73.083912', '+56 224886040', 'Hualpen', 'Región del Bio Bio'),
(91, 'Bosquemar', 'Avenida Portal de San Pedro 6950', '-36.884041', '-73.140282', '+56224886050', 'San Pedro', 'Región del Bio Bio'),
(93, 'Algarrobal', 'Centro Comercial Algarrobal (Colina)', '-33.278089', '-70.704207', '+56224886070', 'Colina Santiago', 'Región Metropolitana'),
(94, 'La Calera', 'J. J. Pérez 12010', '-32.790345', '-71.190932', '+56 2 24886080', 'La Calera', 'Quillota'),
(95, 'Colón', 'IV Centenario 993', '-33.417412', '-70.554149', '+56 2 27592222', 'Las Condes', 'Santiago'),
(96, 'La Serena Balmaceda', 'Avenida Balmaceda 3039', '-29.928702', '-71.25868', '+56 51 2290000', 'La Serena', 'Elqui'),
(97, 'La Cisterna', 'Gran Avenida Jose Miguel Carrera 7406', '-33.523676', '-70.660364', '+56228875000', 'La Cisterna', 'Santiago'),
(98, 'Linares', 'León Bustos 280', '-35.844352', '-71.606202', '+56223861010', 'Linares', 'Linares'),
(99, 'Isabel la Católica', 'Isabel La Católica 4394', '-33.42591', '-70.577487', '+56224901000', 'Las Condes', 'Santiago'),
(100, 'Antofagasta Sur', 'Avenida Angamos 497', '-23.677868', '-70.40907', '+56224901030', 'Antofagasta', 'Antofagasta'),
(101, 'Los Notros', 'Avenida Los Notros 1280', '-41.481222', '-72.989748', '+56224979900 ', 'Puerto Montt', 'Llanquihue'),
(102, 'Antofagasta Norte', 'Avenida Pedro Aguirre Cerda 8550', '-23.589307', '-70.389691', '+56224979980 ', 'Antofagasta', 'Antofagasta'),
(103, 'Food Truck', 'F-30-E ', '-32.645221', '-71.424698', '+569-------', 'Maitencillo', 'Valparaiso'),
(104, 'Selecciona una tienda ', 'Ruta Nacional 5 ', '-18.640066', '-65.176312', '+56911111111', 'comuna', 'Provincia de Samuel Oropeza'),
(106, 'La Pintana', 'Avenida Santa Rosa 13100', '-33.586755', '-70.62834', '+56224979990 ', 'La Pintana', 'Santiago'),
(107, 'Lider Ibañez', 'Parque Industrial 400', '-41.460841', '-72.94958', '+56224979940', 'Puerto Montt', 'Llanquihue'),
(108, 'peñaflor', 'Balmaceda 750', '-33.608684', '-70.85625', '+5622 4886090', 'Penaflor', 'Talagante'),
(110, 'El Abrazo', 'Camino a Melipilla 16860', '-33.544009', '-70.779197', '+56224907010', 'Maipú', 'Santiago'),
(111, 'Gran Avenida Sur', 'Gran Avenida Jose Miguel Carrera 9863', '-33.549811', '-70.672432', '+56224979970', 'El Bosque', 'Santiago'),
(144, 'Coquimbo', 'Los Clarines 31', '-29.978048', '-71.345637', '+56224979920', 'Coquimbo', 'Elqui'),
(153, 'Escuela Militar', 'Avenida Apoquindo 4615', '-33.413383', '-70.581618', '+56224907000', 'Las Condes', 'Santiago'),
(154, 'Rancagua Norte', 'Recreo 620', '-34.159174', '-70.738144', '+56224907030  ', 'Rancagua', 'Cachapoal'),
(155, '5 de ABRIL', 'Avenida 5 de Abril 0430', '-33.510201', '-70.751861', '+5622 490 7040', 'Maipú', 'Santiago'),
(156, ' Camilo Henriquez', 'Camilo Henríquez 1042', '-33.590561', '-70.541301', '+5622 4979950', 'Puente Alto', 'Cordillera'),
(157, 'Antofagasta Centro', 'Avenida Balmaceda 2355', '-23.646062', '-70.400898', '+56224979930', 'Antofagasta', 'Antofagasta'),
(158, 'La Serena Oriente', 'Avenida Las Parcelas 990', '-29.921981', '-71.208838', '+56224907050', 'La Serena', 'Elqui'),
(159, 'Avenida Peru', 'Avenida Perú 805', '-33.423805', '-70.639793', '+56233034400 ', 'Santiago', 'Santiago'),
(160, 'Ciudad de los Valles', 'Avenida Camino Apacible ', '-33.447223', '-70.844451', '+56 2 3303 4402', 'Pudahuel', 'Santiago'),
(161, 'Pajaritos Oriente', 'Gladys Marín Millie 6475', '-33.462955', '-70.723117', '+56233034401', 'Santiago', 'Santiago'),
(162, 'Cerro los Placeres', 'Av. Manuel Antonio Matta 2460', '-33.046129', '-71.584275', '+56233034410', 'Valparaíso', 'Valparaiso'),
(172, 'Walker Martinez ', 'Walker Martínez 3600', '-33.521821', '-70.558704', '+56 2 3303 4403', 'La Florida', 'Santiago'),
(173, 'San Joaquín', 'Vicuña Mackenna 4785', '-33.498455', '-70.616239', '+56 2 3303 4407', 'Macul', 'Santiago'),
(205, 'San Felipe', 'Avenida Libertador Bernardo O\'Higgins 1150', '-32.756903', '-70.722801', '+56233034406', 'San Felipe', 'San Felipe de Aconcagua'),
(206, 'Arica Sur', '18 de Septiembre 2501', '-18.490457', '-70.289593', '+56233034404', 'Arica', 'Arica'),
(207, 'La Chimba', 'Avenida Pedro Aguirre Cerda 11385', '-23.556425', '-70.391532', '+56233034405', 'Antofagasta', 'Antofagasta'),
(208, 'Curico', 'Avenida Juan Luis Diez 1900', '-34.970303', '-71.230608', '+56233034414', 'Curicó', 'Curicó'),
(209, 'Alto Hospicio', 'Avenida Esmeralda 3130', '-20.269587', '-70.103218', '+56233034416', 'Alto Hospicio', 'Iquique'),
(210, 'Temuco Norte', 'Rudecindo Ortega 1505', '-38.718007', '-72.565927', '+56233034417', 'Temuco', 'Cautín'),
(211, 'Valle Lo Campino', 'Avenida Américo Vespucio 1651', '-33.374195', '-70.718151', '+56 2 3303 4415', 'Quilicura', 'Santiago'),
(212, 'FoodTruck 1', 'Avenida España 01375', '-53.138271', '-70.892365', '+56200000000', 'Punta Arenas', 'Magallanes'),
(213, 'Peñuelas', 'Amanecer 1401', '-29.963187', '-71.294787', '+56233034418', 'Coquimbo', 'Elqui'),
(214, 'Iquique Zofri', 'Oficina Salitrera Victoria 150', '-20.204904', '-70.141631', '+56233034411', 'Iquique', 'Iquique'),
(241, 'Calama Sur', 'Avenida Grecia ', '-22.458973', '-68.933529', '+56 233034421', 'Calama', 'El Loa'),
(255, 'Chiguayante', 'Calle 8 Oriente 720', '-36.90444', '-73.031425', '+56 2 33034422', 'Chiguayante', 'Concepcion'),
(256, 'Lo Prado', 'San Pablo 6256', '-33.444504', '-70.723817', '+56 2 3303 4420', 'Lo Prado', 'Santiago'),
(257, 'San Martin', 'San Martín 636', '-33.01506', '-71.555542', '+56233034419', 'Viña del Mar', 'Valparaiso'),
(258, 'Talagante', 'Libertador Bernardo O\'Higgins 200', '-33.659966', '-70.918458', '+56233034423', 'Talagante', 'Región Metropolitana'),
(259, 'Ovalle', 'Avenida Benavente 1075', '-30.597602', '-71.185967', '+56 2 3303 4426', 'Ovalle', 'Limarí'),
(260, 'Laboratorio Chile', 'Avenida Arturo Prat 987', '-25.403884', '-70.481576', '+5620000000', 'Taltal', 'Antofagasta'),
(261, 'Coronel', 'Avenida Manuel Montt 1600', '-36.998092', '-73.162396', '+56233034424', 'Coronel', 'Concepcion'),
(262, 'Arauco Estacion', 'Avenida Libertador Bernardo O\'Higgins 3250', '-33.451561', '-70.679508', '+56233034413', 'Santiago', 'Santiago'),
(263, 'Iquique Centro', 'Avenida Tadeo Haenke 1802', '-20.238005', '-70.143612', '+56233034409', 'Iquique', 'Iquique'),
(264, 'Concon Norte', 'Magallanes 1050', '-32.931775', '-71.518284', '+56233034432', 'Concón', 'Valparaiso'),
(265, 'Limache', 'Palmira Romano Sur 405', '-33.00186', '-71.267874', '+56233034425', 'Limache', 'Marga Marga'),
(267, 'San Antonio ', 'Barros Luco 1732', '-33.595285', '-71.612956', '+56 23 303 4433', 'San Antonio', 'San Antonio'),
(268, 'Antofagasta Costa', 'Avenida Edmundo Pérez Zujovic 5440', '-23.620706', '-70.392612', '+56233034434', 'Antofagasta', 'Antofagasta'),
(269, 'Copiapo', 'Los Carrera 2690', '-27.381503', '-70.31046', '+56 233034436', 'Copiapó', 'Copiapo'),
(270, 'Parque Arauco', 'Avenida Presidente Kennedy 5413', '-33.402193', '-70.578249', '+5622222222', 'Las Condes', 'Santiago'),
(272, 'Plaza Vespucio', 'Vicuña Mackenna 7110', '-33.519027', '-70.600298', '+50299809993', 'La Florida', 'Santiago'),
(274, 'Mall Plaza Trebol', 'Avenida Presidente Jorge Alessandri Rodriguez 3177', '-36.79187', '-73.066464', '+50299809993', 'Talcahuano', 'Concepcion'),
(275, 'DK San Miguel', 'Gran Avenida Jose Miguel Carrera 6060', '-33.51039', '-70.65637', '+56 233034437', 'San Miguel', 'Santiago'),
(276, 'Colina', 'Alpatacal ', '-33.207986', '-70.665709', '+56 2 33034435', 'Colina', 'Chacabuco'),
(278, 'San José de la Estrella', 'Vicuña Mackenna 10427', '-33.553533', '-70.586876', '+56233034427', 'Santiago', 'Santiago'),
(279, 'Nos', 'Eucaliptus 273', '-33.608464', '-70.705788', '+56233034438', 'San Bernardo', 'Maipo'),
(281, 'Talca Norte', 'Avenida Lircay 2455', '-35.411315', '-71.651', '+56 233034439', 'Talca', 'Talca'),
(283, 'Las Compañias', 'Avenida Viña del Mar 3302', '-29.872937', '-71.23156', '+56 2 33034440', 'La Serena', 'Elqui'),
(284, 'Iquique Sur', 'Avenida Francisco Bilbao 3634', '-20.259214', '-70.130355', '+56233034408', 'Iquique', 'Iquique');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoUsuario`
--

CREATE TABLE `tipoUsuario` (
  `idTipo` int NOT NULL,
  `tipo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipoUsuario`
--

INSERT INTO `tipoUsuario` (`idTipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Visualizador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_systems`
--

CREATE TABLE `users_systems` (
  `id` int NOT NULL,
  `nombreUsuario` text NOT NULL,
  `correoUsuario` text NOT NULL,
  `claveUsuario` text NOT NULL,
  `idTipo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `users_systems`
--

INSERT INTO `users_systems` (`id`, `nombreUsuario`, `correoUsuario`, `claveUsuario`, `idTipo`) VALUES
(1, 'Juan Pablo Ibañez Maians', 'juanpablo@quotidian.cl', '123', 1),
(2, 'Julio Cornejo', 'julio@quotidian.cl', '123', 1),
(3, 'Cristian Sulzer', 'cristian@quotidian.cl', '123', 1),
(4, 'Luis Zenteno', 'luis.zenteno@pjchile.com', '*115Xu1d', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `cliente` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `comuna` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `lat` varchar(200) DEFAULT '1',
  `lng` varchar(200) DEFAULT '1',
  `idLocal` int NOT NULL,
  `km` int DEFAULT NULL,
  `tiempo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `sugerido` int DEFAULT NULL,
  `sugeridoKm` text,
  `sugeridoTiempo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cliente`, `direccion`, `comuna`, `region`, `telefono`, `correo`, `lat`, `lng`, `idLocal`, `km`, `tiempo`, `sugerido`, `sugeridoKm`, `sugeridoTiempo`) VALUES
(1, 'HECTOR DIEGO ALARCON GUTIERREZ', 'NUEVO AMANECER N°4170', 'PUENTE ALTO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.57033', '-70.60778', 31, 17899, '1417', NULL, '0', '0'),
(2, 'FELIPE EDUARDO BETANZO CARTES', 'Quivolgo 5759', 'PEDRO AGUIRRE CERDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5025979', '-70.6732853', 31, 2895, '568', NULL, '0', '0'),
(3, 'MAXIMILIANO ALONSO', 'PASAJE LLUTA 0464', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5372339', '-70.7834138', 31, 22409, '1841', NULL, '0', '0'),
(4, 'NUAKAN ESAU SALAZAR CSASZAR', 'EL LLANO SUBERCASEAUX 2959', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4815564', '-70.6496786', 31, 2352, '357', NULL, '0', '0'),
(5, 'FELIPE ANDRES JORQUERA CAYUPI', 'SOTO AGUILAR N°1196', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4869433', '-70.6524552', 31, 2120, '405', NULL, '0', '0'),
(6, 'WILFER ALEJANDRO RODRIGUEZ VILLEGAS', 'SERGIO CEPPI N°810', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5157477', '-70.6674891', 31, 3734, '601', NULL, '0', '0'),
(7, 'SEBASTIAN ORLANDO INOSTROZA GOMEZ', 'PJE.CERRO MORENO N°566', 'EL BOSQUE', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.554785', '-70.667287', 31, 9775, '1083', NULL, '0', '0'),
(8, 'KAYLI ANAKIN ARTIGAS JARA', 'SAN NICOLAS N°1020', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5001137', '-70.6514112', 31, 1437, '225', NULL, '0', '0'),
(9, 'JHOANNY YALIZCARY', 'SAN NICOLAS 950', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.500753', '-70.6496321', 31, 1259, '200', NULL, '0', '0'),
(10, 'BASTIAN ALFREDO', 'ENZO PINZA 3090', 'PEDRO AGUIRRE CERDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4809822', '-70.6580352', 31, 3013, '495', NULL, '0', '0'),
(11, 'BENJAMIN ESTEBAN MONJE CARRASCO', 'Vargas Buston 1051', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5074375', '-70.6549065', 31, 1605, '331', NULL, '0', '0'),
(12, 'JAVIERA PEREZ REYES', 'LATINOAMERICA N°6237', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5153851', '-70.6284805', 31, 4591, '611', NULL, '0', '0'),
(13, 'JOSEFINA MARIA TORRES GUTIERREZ', 'MENORCA 1024', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5264864', '-70.6496786', 31, 4491, '799', NULL, '0', '0'),
(14, 'KEVIN GABRIEL', 'SANTA ESTER 468', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4986482', '-70.6375264', 31, 2394, '382', NULL, '0', '0'),
(15, 'SALOMON BERNABE ANTILLANCA MARIN', 'LOS JARDINES N°8250', 'LA FLORIDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5273071', '-70.5645657', 31, 10927, '1455', NULL, '0', '0'),
(16, 'SOFIA VICTORIA URRIOLA MARABOLI', 'PJE.PICHASCO 9113', 'LA GRANJA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5466921', '-70.6153009', 31, 8785, '1258', NULL, '0', '0'),
(17, 'FRANCISCA ALFARO SILVA', 'AV. Lo Ovalle 1359', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5128636', '-70.6633407', 31, 2875, '519', NULL, '0', '0'),
(18, 'JAVIER IGNACIO CONTRERAS SAN MARTIN', 'NOVENA AVENIDA 1211', 'EL BOSQUE', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5117646', '-70.6592747', 31, 2381, '478', NULL, '0', '0'),
(19, 'JOAQUIN CANALES GARRIDO', 'PASAJE 6 N°5848', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5112264', '-70.6384922', 31, 3528, '564', NULL, '0', '0'),
(20, 'ADRIAN GABRIEL CHARA DIAZ', 'Almirante byrd 2066', 'PROVIDENCIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4413765', '-70.6052032', 31, 10631, '1735', NULL, '0', '0'),
(21, 'LUIS MICHAEL MULATO MELIPIL', 'LOS COSMONAUTAS N°12558', 'LA PINTANA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5800129', '-70.6316942', 31, 17912, '1344', NULL, '0', '0'),
(22, 'JOAQUIN MAURICIO ORTIZ QUIROZ', 'MAX JARA N°322', 'EL BOSQUE', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5612231', '-70.6772492', 31, 10769, '1293', NULL, '0', '0'),
(23, 'ALDO GILABERT VERGARA', 'PSJ IGNACIO CARRERA PINTO N°6639', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5157629', '-70.6687776', 31, 3693, '598', NULL, '0', '0'),
(24, 'CHRISTIAN JOEL VISE FIGUEROA', 'SAN PETERSBURGO N°6351', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5151611', '-70.6474683', 31, 3292, '588', NULL, '0', '0'),
(25, 'MARIA JOSE ELGUETA ELGUETA', 'CALLAO N°1228', 'LA FLORIDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5226882', '-70.5987142', 31, 7900, '996', NULL, '0', '0'),
(26, 'ESTEBAN GUIDO SAAVEDRA MUÑOZ', 'AVDA. IMPERIAL N°749', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4150771', '-70.5493239', 31, 22088, '1798', NULL, '0', '0'),
(27, 'EDUARDO NICOLAS SOTO RAMIREZ', 'SALESIANOS N°780', 'PUENTE ALTO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.6186082', '-70.5906057', 31, 21103, '1425', NULL, '0', '0'),
(28, 'MONICA GUARDA OJEDA', 'LORD COCHONNE N°796', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4558352', '-70.6536848', 31, 7303, '847', NULL, '0', '0'),
(29, 'JORGE BERRIOS OSORIO', 'QUO VADIS N°2416', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5072247', '-70.7777455', 31, 20335, '1634', NULL, '0', '0'),
(30, 'ANDRES VILLALBA ROMERO', 'RIVAS VICUÑA N°1581', 'QUINTA NORMAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.42938', '-70.68297', 31, 12077, '1194', NULL, '0', '0'),
(31, 'NELSON ANTONIO SUAREZ PADILLA', 'MARIANO LA TORRE N°1309', 'SAN RAMON', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.54727', '-70.65133', 31, 7188, '1171', NULL, '0', '0'),
(32, 'JORGE LUIS PICHARDO LOPEZ', 'VECINAL N°6106', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.513798', '-70.6214501', 31, 4722, '635', NULL, '0', '0'),
(33, 'JOSE GREGORIO UZCATEGUI SANTOS', 'CALLE VICUÑA MACKENNA N°188', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5427852', '-70.6635266', 31, 8098, '934', NULL, '0', '0'),
(34, 'CLAUDIO JOSE', 'GOYOCALAN 5864', 'PEDRO AGUIRRE CERDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5048656', '-70.6715123', 31, 3374, '661', NULL, '0', '0'),
(35, 'MIGUEL ENRIQUE VARGAS COLINA', 'OLIVOS 1148', 'INDEPENDENCIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4233051', '-70.6539539', 31, 11986, '1215', NULL, '0', '0'),
(36, 'CATALINA ANTONELLA LEYTON ACEVEDO', 'CARLOS CONDELL N°696', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5451522', '-70.6565562', 31, 8834, '1108', NULL, '0', '0'),
(37, 'CRISTINA FRANCISCA', 'EL MOLINO 1650', 'LA PINTANA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.55768', '-70.65051', 31, 9188, '1425', NULL, '0', '0'),
(38, 'CATALINA PAEZ MOLTEDO', 'NATANIEL COX N°898', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4570584', '-70.6517465', 31, 4960, '803', NULL, '0', '0'),
(39, 'GERARDO ALEXIS CARREÑO CARREÑO', 'ANKARA SUR N°7330', 'CERRO NAVIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4223997', '-70.7364092', 31, 19417, '1339', NULL, '0', '0'),
(40, 'MARIA TERESA PINEDA TORRES', 'PJE. RIO CISNES N°3747', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4937132', '-70.625323', 31, 4192, '688', NULL, '0', '0'),
(41, 'KENYWER JESUS DEVITA GUZMAN', 'FUENZALIDA URREJOLA 459', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5179055', '-70.6534004', 31, 3064, '556', NULL, '0', '0'),
(42, 'JORGE ALEXANDER', 'BLANCO ENCALADA 1723', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4563026', '-70.6580438', 31, 6251, '772', NULL, '0', '0'),
(43, 'MATIAS ESTEBAN VILLEGA CISTERNAS', 'CHILOE 4911', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4994172', '-70.6507474', 31, 1432, '234', NULL, '0', '0'),
(44, 'EVELYN ROCHEL CUEVAS CAMPOS', 'SANTA MERCEDES 13413', 'SAN BERNARDO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5854318', '-70.6701767', 31, 15836, '1525', NULL, '0', '0'),
(45, 'FABIAN ANDRES MUÑOZ PAVEZ', 'MEMBRILLAR N°6012', 'QUINTA NORMAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4323604', '-70.7189591', 31, 18276, '1490', NULL, '0', '0'),
(46, 'SERGIO LUIS', 'CHILOE 1221', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4613692', '-70.6461195', 31, 5074, '749', NULL, '0', '0'),
(47, 'LEONARDO ANTONIO CONTRERAS LEIVA', 'ROGELIO UGARTE N°1129', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4573692', '-70.6351697', 33, 2348, '541', NULL, '0', '0'),
(48, 'MALCOM ANDRES RUZ PALACIOS', 'ALDUNATE 1567', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4674355', '-70.6539063', 33, 2452, '511', NULL, '0', '0'),
(49, 'ANGEL MARTINEZ MORENO', 'CURICO N°380', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4452954', '-70.6394871', 33, 1254, '272', NULL, '0', '0'),
(50, 'CRISTOPHER IGNACIO CIFUENTES ARCAYA', 'PASAJE PAMPA N°6474', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.408398', '-70.738449', 33, 12351, '1047', NULL, '0', '0'),
(51, 'LILIAN ANDREA PAVEZ SALINAS', 'EMCO N°5058', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5023842', '-70.6177405', 33, 6372, '1006', NULL, '0', '0'),
(52, 'EZEQUIEL MORENO SEMECO', 'ARTURO PRAT N°407', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4504328', '-70.6493301', 33, 343, '90', NULL, '0', '0'),
(53, 'JESUS SANCHEZ VILLARREAL', 'VARGAS BUSTON N°976', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5084846', '-70.6530477', 33, 9618, '898', NULL, '0', '0'),
(54, 'JAVIER IGNACIO CID NEIMAN', 'SANTA ISABEL 747', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4455881', '-70.621052', 33, 3389, '678', NULL, '0', '0'),
(55, 'BRUNO YARLEQUE FERNANDEZ', 'LOMA VERDE 0 N°3035', 'PUENTE ALTO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.6120808', '-70.5427233', 33, 30988, '2246', NULL, '0', '0'),
(56, 'LUIS HUMBERTO CUBA ARANEDA', 'LAS TINAJAS N°1757', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.515477', '-70.7836224', 33, 21199, '1504', NULL, '0', '0'),
(57, 'JOSE MIGUEL CAMPOS VIDAL', 'SANTA LORETO N°2022', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5639369', '-70.6406341', 33, 17462, '1535', NULL, '0', '0'),
(58, 'VICTORIA CRISBEL', 'ISAAC THOMPSON 269', 'ESTACION CENTRAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4601338', '-70.7067409', 33, 7205, '1246', NULL, '0', '0'),
(59, 'ALVARO ANTONIO SEPULVEDA VERA', 'AV EL DURAZNAL N°2501', 'PEÑALOLEN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4767078', '-70.5654742', 33, 9550, '1559', NULL, '0', '0'),
(60, 'FERNANDO CESPEDES SOSA', 'Arturo prat 1411', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4639427', '-70.6471341', 33, 2126, '481', NULL, '0', '0'),
(61, 'NAHUEL ANTONIO', 'EL SOL N°5808', 'PEDRO AGUIRRE CERDA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4968125', '-70.6842146', 33, 8679, '920', NULL, '0', '0'),
(62, 'EVELYN CARDOZO GONZALEZ', 'AV. ECUADOR N°3866', 'ESTACION CENTRAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4514394', '-70.6896303', 33, 10638, '821', NULL, '0', '0'),
(63, 'SERGIO PABON RODRIGUEZ', 'CALLE COQUIMBO 777', 'PUENTE ALTO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.6040942', '-70.5828078', 33, 26255, '1584', NULL, '0', '0'),
(64, 'JULIO ALEJANDRO FIGUEROA IRIBARRA', 'JUSTO PASTOR MELLADO N°3639', 'RECOLETA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.3889609', '-70.6534892', 33, 11189, '1218', NULL, '0', '0'),
(65, 'VICENTE MATIAS', 'LORD COCHRANE 1007', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4589256', '-70.653753', 33, 1414, '285', NULL, '0', '0'),
(66, 'RAUL AUGUSTO', 'ÑUBLE 508', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4686438', '-70.6368607', 33, 3433, '649', NULL, '0', '0'),
(67, 'MAGDALENA PAZ LAZO IBAÑEZ', 'SAN IGNACIO 1333', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4631779', '-70.6553621', 33, 2079, '435', NULL, '0', '0'),
(68, 'KATHERINE ARIELLE', 'PORTUGAL 646', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4488897', '-70.6692655', 33, 2926, '601', NULL, '0', '0'),
(69, 'TABATA ESTEFANIA', '7 DE NOVIEMBRE N°4496', 'RENCA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4063831', '-70.7129292', 33, 9587, '831', NULL, '0', '0'),
(70, 'JUAN CARLOS PUGA VALENZUELA', 'CALLE HAENDEL N°2974', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.555082', '-70.5993575', 33, 2926, '601', NULL, '0', '0'),
(71, 'YESSENIA ANAIS HERRERA ANTIPIL', 'CUEVAS N°888', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4537961', '-70.6347592', 33, 1827, '419', NULL, '0', '0'),
(72, 'GISSELE ALEJANDRA DONOSO ROCUANT', 'OSJ LUIS AIXALA N°1860', 'RENCA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.3984835', '-70.7398341', 33, 12752, '1064', NULL, '0', '0'),
(73, 'JUAN ANDRES GUTIERREZ NAHUELHUAL', 'AV ZAÑARTU N°1317', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.824934', '-73.070777', 33, 504178, '19406', NULL, '0', '0'),
(74, 'JEAN PAUL SEBASTIAN', 'HERBOSO 728', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4549999', '-70.6553313', 33, 1337, '287', NULL, '0', '0'),
(75, 'AGUSTIN IGNACIO BRAVO ACEVEDO', 'SANTA ISABEL 797', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4506635', '-70.6466959', 33, 81, '19', NULL, '0', '0'),
(76, 'JUAN CARLOS SALAZAR ACEVEDO', 'SARA DEL CAMPO N°535', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.444421', '-70.6435261', 33, 1076, '291', NULL, '0', '0'),
(77, 'VICENTE TOMAS', 'DIAGONAL PARAGUAY 390', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4434773', '-70.6405703', 33, 1962, '398', NULL, '0', '0'),
(78, 'ANGEL DAVID GRANADO CORREA', 'MARIN N°440', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4473861', '-70.6408375', 33, 2926, '601', NULL, '0', '0'),
(79, 'NORA ALICIA ASTETE VALDERAS', 'ALTAIR N°1821', 'LAS CONDES', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4161032', '-70.5340546', 33, 18349, '1683', NULL, '0', '0'),
(80, 'JETZABETH MILANYELIS', 'SANTA MONICA 288', 'RECOLETA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.3983873', '-70.6306718', 33, 13880, '1267', NULL, '0', '0'),
(81, 'LEYMON ALEXANDER GOTTO CARAPAICA', 'SAN PETERSBURGO N°6351', 'SAN MIGUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5151611', '-70.6474683', 33, 10152, '1057', NULL, '0', '0'),
(82, 'LUIS ALFREDO ESPINOZA RAMIREZ', 'JOSE MARIA CARO N°4958', 'CONCHALI', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.380754', '-70.6708486', 33, 11843, '1113', NULL, '0', '0'),
(83, 'VICTOR PRADA PEREZ', 'SAN ISIDRO N°520', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4504075', '-70.6428667', 33, 857, '267', NULL, '0', '0'),
(84, 'LUIS LINCOPI RAMOS', 'TOME N°447', 'LA GRANJA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5323764', '-70.6246188', 33, 16872, '1249', NULL, '0', '0'),
(85, 'MATIAS IGNACIO GALLARDO MORENO', 'LIRA 1313', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.460321', '-70.6355872', 33, 2926, '601', NULL, '0', '0'),
(86, 'PABLO CAMILO HENRIQUEZ VIDAL', 'SANTIAGUILLO N°1553', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.461268', '-70.6559792', 33, 1931, '415', NULL, '0', '0'),
(87, 'LUIS ALEJANDRO FUENTES GUERRA', 'FRAY ANDRES N°221', 'LA REINA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.45484', '-70.53122', 33, 12225, '2093', NULL, '0', '0'),
(88, 'JOSE IGNACIO TORO TORO', 'GRAJALES N°1962', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4511346', '-70.6626316', 33, 1744, '390', NULL, '0', '0'),
(89, 'LEUNIDES ROMERO MARTEL', 'OASAJE PLUTON N°548', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4177928', '-70.6425221', 33, 20650, '1458', NULL, '0', '0'),
(90, 'ISABELLA DENISSE MORENO PARRA', 'LA FUNDACION N°4182', 'MACUL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5006492', '-70.5886591', 33, 22129, '1283', NULL, '0', '0'),
(91, 'NATALY ANDREA ACEVEDO UBEDA', 'LAS PELARGONIAS 1862', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4862835', '-70.7720451', 33, 16911, '1455', NULL, '0', '0'),
(92, 'LUIS ALBERTO LOPEZ CONCHA', 'PSJ EL GRANIZO 1141', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.477512', '-70.7266856', 33, 8661, '1379', NULL, '0', '0'),
(93, 'SERGIO PATRICIO', '13 TRANSVERSAL 163', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 4046, '660', NULL, '0', '0'),
(94, 'LEONARDO OSVALDO ARENAS ALARCON', 'ESTEBAN MANZANO 817', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7928862', '-73.0499589', 40, 10128, '994', NULL, '0', '0'),
(95, 'BARBARA DANIELA SANCHEZ CONTRERAS', 'AV LAGUNA REDONDA N°2055', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8128481', '-73.0653876', 40, 5454, '676', NULL, '0', '0'),
(96, 'DAMARI LISBETH RIQUELME VERGARA', 'CALLE 105 PJE 9 1851', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 4852, '583', NULL, '0', '0'),
(97, 'JUAN DARIO ESPINOZA IBAÑEZ', 'LIENTUR N°67', 'CHIGUAYANTE', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.9112377', '-73.0284707', 40, 8765, '738', NULL, '0', '0'),
(98, 'FRANCISCO JAVIER HENRIQUEZ SALGADO', 'NAPOLES N°2907', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7833819', '-73.0982041', 40, 4046, '660', NULL, '0', '0'),
(99, 'MIGUEL ANGEL', 'LAS GARZAS 27', 'SAN PEDRO', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8369293', '-73.1159895', 40, 4046, '660', NULL, '0', '0'),
(100, 'VALENTINA ISIDORA ERACARRET VARELA', 'AVENIDA 7 LAGUNAS N°1103', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7843609', '-73.0456811', 40, 12036, '1096', NULL, '0', '0'),
(101, 'JOSE MIGUEL SILVA ESCOBAR', 'VILLA SAN JUAN 2 CASA N°1734', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 143389, '6867', NULL, '0', '0'),
(102, 'BARBARA PAZ LARA OLIVA', 'JOSE DE GARRÓ  N°583', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7961953', '-73.0513144', 40, 10076, '992', NULL, '0', '0'),
(103, 'SEBASTIAN ANDRES GONZALEZ MEDINA', 'ABATE MOLINA 1490', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.79377', '-73.04518', 40, 10674, '948', NULL, '0', '0'),
(104, 'MARISOL VALDEBENITO CIFUENTES', 'PJE. 16 N°742', 'SAN PEDRO DE LA PAZ', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8367492', '-73.1452712', 40, 9782, '1174', NULL, '0', '0'),
(105, 'BASTIAN ALEXIS OVALLE CAIGUAN', 'LIENTUR N°1320', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8118887', '-73.041012', 40, 5149, '913', NULL, '0', '0'),
(106, 'CONSTANZA MOLINA HENRIQUEZ', 'COSMECHURRUCA', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7901382', '-73.05121', 40, 9745, '931', NULL, '0', '0'),
(107, 'DIEGO FELIPE', 'INFANTE 145', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 4046, '660', NULL, '0', '0'),
(108, 'CAMILA ISABEL ROSSEL PARDO', 'JANEQUEO 1510', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8121487', '-73.0473994', 40, 5020, '704', NULL, '0', '0'),
(109, 'DENISSE MARIAM VARELA DURAN', 'CALLE DEL MEDIO N°252', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.794334', '-73.041392', 40, 11008, '1110', NULL, '0', '0'),
(110, 'JUAN CARLOS BRITO VILLANUEVA', 'MANUEL RODRIGUEZ N°297', 'CHIGUAYANTE', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.9213323', '-73.0267745', 40, 13809, '1242', NULL, '0', '0'),
(111, 'EDUARDO ANTONIO NOVOA VIDAL', 'PASAJE 32 N°6', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8072452', '-73.0444575', 40, 5968, '857', NULL, '0', '0'),
(112, 'VALERIA ISILDA MELITA VALENCIA', 'TARAPA N°819', 'TALCAHUANO', 'VIII - BIO BIO, TALCAHUANO', 'N/A', 'N/A', '-36.7787714', '-73.0951841', 40, 11496, '940', NULL, '0', '0'),
(113, 'GUSTAVO ANDRES VARGAS GONZALEZ', 'ZAÑARTU 1016', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8274647', '-73.0682009', 40, 3871, '480', NULL, '0', '0'),
(114, 'CAROLINA ANDREA LABRA OPAZO', 'SANTA CLARA N°2936', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.806025', '-73.0281675', 40, 4046, '660', NULL, '0', '0'),
(115, 'SEBASTIAN ANDRES OYARZUN BUSTOS', 'ALGARROBO N°340', 'SAN PEDRO DE LA PAZ', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8305354', '-73.1167368', 40, 7836, '863', NULL, '0', '0'),
(116, 'MATIAS ALONSO ALARCON CARDENAS', 'AV. CAMPOS DEPORTIVOS 440', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7897059', '-73.0341517', 40, 8643, '1228', NULL, '0', '0'),
(117, 'PAMELA CONSTANZA HUENCHUCOY SEGUEL', 'ANGEL CRUCHAGA 1472', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7957539', '-73.0455316', 40, 10459, '917', NULL, '0', '0'),
(118, 'CONSTANZA BELEN SAGREDO AVILA', 'SALVADOR ALLENDE N°2456', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.804099', '-73.036109', 40, 4046, '660', NULL, '0', '0'),
(119, 'SEBASTIAN FERNANDO YAÑEZ BOETTCHER', '13 TRANSVERSAL N°181', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 4046, '660', NULL, '0', '0'),
(120, 'SERGIO MATIAS IGNACIO OÑATE QUEVEDO', 'SAN MARTIN 3233', 'CHIGUAYANTE', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.9188901', '-73.0247947', 40, 10267, '826', NULL, '0', '0'),
(121, 'JAVIERA MONSERRAT GONZALEZ ALLUP', 'O\'HIGGINS', 'TALCAHUANO', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.783405', '-73.0838811', 40, 3092, '504', NULL, '0', '0'),
(122, 'MATIAS SEBASTIAN TOLEDO DONNAY', 'PATRICIO LINCH N°2476', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8105507', '-73.0332639', 40, 5717, '1005', NULL, '0', '0'),
(123, 'CLAUDIO IVAN PAVEZ BENITEZ', 'PSJ 32 N°6', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8201352', '-73.0443904', 40, 4046, '660', NULL, '0', '0'),
(124, 'FRANCISCA JACQUELINE DAZA RODRIGUEZ', 'CRUZ N°758', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8191649', '-73.0537242', 40, 4046, '660', NULL, '0', '0'),
(125, 'EMANUEL ALEJANDRO OYARZUN BARRA', 'PASAJE 5 N°906', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7995613', '-73.0373709', 40, 7047, '1060', NULL, '0', '0'),
(126, 'MAURICIO SEBASTIAN', 'NICOLAS VERDUGO 1995', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.7935936', '-73.0461312', 40, 10741, '973', NULL, '0', '0'),
(127, 'OSVALDO JAVIER HERNANDEZ SAEZ', 'PASAJE 18 N°418', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.805761', '-73.0726593', 40, 5654, '702', NULL, '0', '0'),
(128, 'ALEJANDRA ANDREA', 'PASAJE VEINTE 1853', 'CONCEPCION', 'VIII - BIO BIO, CONCEPCION', 'N/A', 'N/A', '-36.8080303', '-73.0677568', 40, 5327, '684', NULL, '0', '0'),
(137, 'MARIA PAZ CATALINA BRAVO MUÑOZ', 'CENTAURO N°625', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4421135', '-70.7640644', 59, 3199, '431', NULL, '0', '0'),
(138, 'CLAUDIA ANDREA', 'AV LA ESTRELLA 1070', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.438786', '-70.7528936', 59, 3017, '443', NULL, '0', '0'),
(139, 'ALVARO ALEJANDRO', 'PASAJE ISLA ELEFANTES 369', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4564976', '-70.7605008', 59, 2611, '497', NULL, '0', '0'),
(140, 'MATIAS RODRIGO CASTRO ARAYA', 'PAULA JARA QUEMADA N° 8004', 'LO PRADO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4497374', '-70.737732', 59, 877, '214', NULL, '0', '0'),
(141, 'ERICK CRISTIAN LILLO INOSTROZA', 'AV.AMERICO VESPUCIO N°1264', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4770553', '-70.757594', 59, 8501, '673', NULL, '0', '0'),
(142, 'KARINA FERNANDA', 'CORONEL BUERAS 185 A', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4368677', '-70.6376272', 59, 23569, '1355', NULL, '0', '0'),
(143, 'CARLOS AUGUSTO TOVAR', 'AV. CARLOS VALDOVINO N°44', 'SAN JOAQUIN', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4878531', '-70.6192163', 59, 30824, '1856', NULL, '0', '0'),
(144, 'JUAN PABLO', 'PABLO PICASSO 645', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4763938', '-70.7496725', 59, 4131, '741', NULL, '0', '0'),
(145, 'PAULETTE SOLEDAD ANAIS DUARTE DUARTE', 'LA ESTRELLA N°1070', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '1', '1', 59, 3017, '443', NULL, NULL, NULL),
(146, 'CRISTINA ALEXANDRA BAZA ZAMORA', 'PASAJE PROCION N°8566', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4606515', '-70.7540514', 59, 11968, '952', NULL, '0', '0'),
(147, 'GENESIS ALMENDRA', 'KOIKO 7495', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.464331', '-70.7426872', 59, 1952, '358', NULL, '0', '0'),
(148, 'ALEXANDER CHRISTIAN LABRAÑA CONCHA', 'RIO VAUPES N°571', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.453798', '-70.7642866', 59, 2642, '439', NULL, '0', '0'),
(149, 'DAVID OCTAVIO ARMIJO MORALES', 'LAS ROSAS 4181', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4879939', '-70.7400551', 59, 5312, '804', NULL, '0', '0'),
(150, 'ESTEBAN IGNACIO SANCHEZ CATALAN', 'MARIA LUISA BOMBAL N°692', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4768615', '-70.7501866', 59, 4210, '752', NULL, '0', '0'),
(151, 'RICARDO GUILLERMO', 'CALLE GUERRA DEL PACIFICO 3420', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5097077', '-70.798429', 59, 15575, '913', NULL, '0', '0'),
(152, 'ARIEL ALBERTO SALINAS ARANCIBIA', 'AVENIDA LONGITUDINAL N°4959', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4757349', '-70.7488248', 59, 3982, '684', NULL, '0', '0'),
(153, 'JOSE IGNACIO', 'LEON DE LA BARRA  9144', 'LO ESPEJO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.528374', '-70.696565', 59, 17783, '1142', NULL, '0', '0'),
(154, 'OSWALDO RAFAEL  OROPEZA  MONTERO', 'GENERAL SAAVEDRA N° 1247', 'INDEPENDENCIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4090328', '-70.657381', 59, 23803, '1574', NULL, '0', '0'),
(155, 'JAVIER IGNACIO ROBLES FUENTES', 'ANTOFAGASTA 3068', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4666264', '-70.6752887', 59, 7680, '1133', NULL, '0', '0'),
(156, 'ROMINA LUISA', 'PASAJE PENTAGRAMA 748', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4918472', '-70.7638183', 59, 10996, '780', NULL, '0', '0'),
(157, 'KATHERINE IVETT ARAOS CAMPOS', 'QUILIMARI N°3267', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4967848', '-70.7627742', 59, 11345, '871', NULL, '0', '0'),
(158, 'MARCO IGNACIO', 'DIAGONAL TENIENTE CRUZ 555', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.455399', '-70.7403106', 59, 325, '114', NULL, '0', '0'),
(159, 'FELIPE ISMAEL TAICER SOLAR', 'MARIA ANGELICA N°9513', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.43477', '-70.7703', 59, 4656, '645', NULL, '0', '0'),
(160, 'ROBERTO MAURICIO SAEZ CASTILLO', 'LOS MURALISTAS N°770', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4783634', '-70.7510464', 59, 8374, '611', NULL, '0', '0'),
(161, 'NICOLAS IGNACIO VALDES LOBOS', 'LOS HUERTOS N°7006', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4649534', '-70.7325944', 59, 1975, '405', NULL, '0', '0'),
(162, 'KRISHNA ALEJANDRA DE LOURDES CATALAN SALADRIGAS', 'LAGUNA CAUQUENE 261', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4622436', '-70.7482206', 59, 1587, '325', NULL, '0', '0'),
(163, 'JOSE MANUEL HUINA CONTRERAS', 'AV PERU  776', 'LA CISTERNA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5390561', '-70.677435', 59, 23765, '1309', NULL, '0', '0'),
(164, 'ALEJANDRO AUGUSTO', 'ALSINO 4691', 'QUINTA NORMAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.426749', '-70.6996317', 59, 6917, '1126', NULL, '0', '0'),
(165, 'MICHELLE PATRICIA ARANDA JARAMILLO', 'MARCOS MATURANA N°7433', 'LO PRADO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.44693', '-70.73582', 59, 1207, '265', NULL, '0', '0'),
(166, 'NELSON BROUDISSOND PARDO', 'INGENIERO LLOYD N°1542', 'QUINTA NORMAL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4317311', '-70.7062298', 59, 5631, '892', NULL, '0', '0'),
(167, 'ANDRES HUIRCALEO LEVIO', 'LOS COPIGUES N°1042', 'PADRE HURTADO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.5759201', '-70.8086738', 59, 25385, '1572', NULL, '0', '0'),
(168, 'KRISTEL ESTEFANY FUENTES CAYUNAO', 'AV LOS MARES 8399', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4655034', '-70.7520904', 59, 2293, '377', NULL, '0', '0'),
(169, 'NICOLAS ANTONIO MUÑOZ PALAVECINO', 'DIAGONAL TENIENTE CRUZ N°555', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.455399', '-70.7403106', 59, 325, '114', NULL, '0', '0'),
(170, 'MANUEL ALEJANDRO CARCAMO VIDAL', 'LONQUIMAY N°7246', 'CERRO NAVIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.424872', '-70.735261', 59, 3864, '718', NULL, '0', '0'),
(171, 'PAULETTE ANAIS', 'AGUA FRESCA 8008', 'CERRO NAVIA', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.415768', '-70.750672', 59, 5955, '961', NULL, '0', '0'),
(172, 'CHRISTIAN GABRIEL GAETE IBARRA', 'DIAGONAL TRAVESIA N°8727', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4538861', '-70.7594016', 59, 2422, '409', NULL, '0', '0'),
(173, 'RAYEN ANAIS', 'JOYA DE LA REYNA 334', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4421135', '-70.7640644', 59, 3199, '431', NULL, '0', '0'),
(174, 'HECTOR ANDRES ITURRA VILLAGRAN', 'LOS HALCONES 7149', 'PUDAHUEL', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.46024', '-70.7393582', 59, 1454, '302', NULL, '0', '0'),
(175, 'FERNANDA ANDREA AHUMADA LEON', 'TIRSO DE MOLINA 5568', 'MAIPU', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.465534', '-70.7582442', 59, 2957, '522', NULL, '0', '0'),
(176, 'DANIEL ANDRES SILVA DIAZ', 'PARCELA N°2', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9590009', '-71.3389183', 144, 11774, '1068', NULL, '0', '0'),
(177, 'MARIA EUGENIA MEDEL GUANTECURA', 'JOSE HERNANDEZ N°1219', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9566351', '-71.2511582', 144, 2611, '344', NULL, '0', '0'),
(178, 'CADMIEL ELIZABETH', 'ALFREDO PUIG COOKE 1076', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9824707', '-71.3359459', 144, 1363, '255', NULL, '0', '0'),
(179, 'FELIPE ANDRES MUNDACA ROJAS', 'SAN FRANCISCO N°69', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9479443', '-71.3416821', 144, 2611, '344', NULL, '0', '0'),
(180, 'JUAN FELIPE SANDOVAL DIAZ', 'ALCALDE OSCAR PEREIRA N°1121', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9666413', '-71.3126035', 144, 4396, '426', NULL, '0', '0'),
(181, 'MARCELO BASTIAN ZELAYA ZEBALLOS', 'LOS CLARINES N°1011', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.98356', '-71.33824', 144, 1581, '289', NULL, '0', '0'),
(182, 'JAVIERA FRANCISCA SAAVEDRA CACERES', 'MANUEL BULNES N°3495', 'LA SERENA', 'IV - COQUIMBO, LA SERENA', 'N/A', 'N/A', '-29.93629', '-71.25268', 144, 11643, '1026', NULL, '0', '0'),
(183, 'YESSENIA VALENTINA BRAVO GUZMAN', 'PARCELA 102, CENTINELA EL PANUL', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9892985', '-71.3601921', 144, 2273, '274', NULL, '0', '0'),
(184, 'JAVIERA ANNAIS', 'ERNESTO MARIN  ALVAREZ 236', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9935038', '-71.3214459', 144, 3573, '581', NULL, '0', '0'),
(185, 'ISIS SOLEDAD TALANDIANOS RAMIREZ', 'LA RINCONADA PARCELA N°121', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9932465', '-71.359631', 144, 2394, '249', NULL, '0', '0'),
(186, 'FABIANNA XIMENA JORQUERA GONZALEZ', 'AVENIDA DEL MAR 800', 'LA SERENA', 'IV - COQUIMBO, LA SERENA', 'N/A', 'N/A', '-29.907047', '-71.2734077', 144, 12530, '1036', NULL, '0', '0'),
(187, 'YAIR SAMIR', 'ROBINSON CRUSOE 91', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.974327', '-71.3398276', 144, 2611, '344', NULL, '0', '0'),
(188, 'JOAQUIN NICOLAS MURILLO GUTIERREZ', 'TOTORALILLO', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9749696', '-71.3235701', 144, 4554, '486', NULL, '0', '0'),
(189, 'JOE RUGEL', 'BLANCO 20', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9803121', '-71.3476905', 144, 423, '76', NULL, '0', '0'),
(190, 'ARIEL ANDRES MALLA FERNANDEZ', 'CARLOS BRITO ITURRIETA N°3635', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9972584', '-71.3234926', 144, 6119, '1059', NULL, '0', '0'),
(191, 'MELODY HAYDEE MARTINEZ FREDES', 'ALMIRANTE LA TORRE N°74', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9392446', '-71.3386321', 144, 5860, '665', NULL, '0', '0'),
(192, 'GABRIELA ANDREA', 'ERNESTO MARIN ALVAREZ 236', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9935038', '-71.3214459', 144, 3573, '581', NULL, '0', '0'),
(193, 'VICTOR ANDRES PEREZ ARAVENA', 'LOS GORRIONES C N°5507', 'SANTIAGO', 'RM - METROPOLITANA, SANTIAGO', 'N/A', 'N/A', '-33.4488897', '-70.6692655', 144, 458755, '17615', NULL, '0', '0'),
(194, 'PIA TAMARA SALINAS YEVENES', 'CRUZ DE CAÑA SITIO N°22', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-30.0188296', '-71.1921532', 144, 21495, '1852', NULL, '0', '0'),
(195, 'MATEO LEONARDO GARCIA HUENTELEO', 'PSJE PERIODISTA ROBERTO MATTA, PARCELA 133 SITIO 1', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-30.0196201', '-71.3325888', 144, 6471, '877', NULL, '0', '0'),
(196, 'DIEGO IGNACIO', 'LORENZO IDUYA 2564', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.99727', '-71.3328', 144, 3636, '571', NULL, '0', '0'),
(197, 'CRISTIAN SEBASTIAN ROJAS ROJAS', 'MANUEL BULNES N°3495', 'LA SERENA', 'IV - COQUIMBO, LA SERENA', 'N/A', 'N/A', '-29.93629', '-71.25268', 144, 11643, '1026', NULL, '0', '0'),
(198, 'FERNANDA VALERIA', 'BRILLADOR 1719', 'LA SERENA', 'IV - COQUIMBO, LA SERENA', 'N/A', 'N/A', '-29.8847353', '-71.2510991', 144, 15538, '1104', NULL, '0', '0'),
(199, 'CONSTANZA GABRIELA PLAZA TAPIA', 'CARLOS BRITO ITURRIETA N°3635', 'COQUIMBO', 'IV - COQUIMBO, COQUIMBO', 'N/A', 'N/A', '-29.9972584', '-71.3234926', 144, 6119, '1059', NULL, '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `users_systems`
--
ALTER TABLE `users_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipoUsuario`
--
ALTER TABLE `tipoUsuario`
  MODIFY `idTipo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users_systems`
--
ALTER TABLE `users_systems`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
