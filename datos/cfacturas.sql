-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-12-2018 a las 09:01:13
-- Versión del servidor: 5.6.39-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cfacturas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acuerdoscomerciales`
--

CREATE TABLE `acuerdoscomerciales` (
  `id` int(4) UNSIGNED NOT NULL,
  `fechasolicitud` date NOT NULL,
  `sociocomer_id` int(10) UNSIGNED DEFAULT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `direccion_id` int(10) UNSIGNED NOT NULL,
  `cuenta_id` int(10) UNSIGNED NOT NULL COMMENT 'datos de cuenta bancaria',
  `descripcion` text NOT NULL,
  `informacion` varchar(150) DEFAULT NULL,
  `ac_principalporc` float(4,2) UNSIGNED NOT NULL COMMENT 'porcentaje del acuerdo principal',
  `ac_secundarioporc` float(4,2) UNSIGNED DEFAULT NULL COMMENT 'porcentaje secundario',
  `autorizado` tinyint(1) DEFAULT NULL,
  `elab_user_id` int(10) UNSIGNED NOT NULL,
  `aut_user_id` int(10) UNSIGNED NOT NULL,
  `aut_user2_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acuerdoscomerciales`
--

INSERT INTO `acuerdoscomerciales` (`id`, `fechasolicitud`, `sociocomer_id`, `cliente_id`, `direccion_id`, `cuenta_id`, `descripcion`, `informacion`, `ac_principalporc`, `ac_secundarioporc`, `autorizado`, `elab_user_id`, `aut_user_id`, `aut_user2_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2018-11-26', NULL, 1, 8, 1, 'ACUERDO COMERCIAL ENTRE LA EMPRESA DIPROMED Y MOISES AGUILAR MENDOZA', NULL, 6.20, NULL, NULL, 1, 1, 1, '2018-11-26 11:57:58', '2018-11-26 11:57:58', NULL),
(2, '2018-11-26', 11, 1, 8, 1, 'jijba', NULL, 6.00, NULL, NULL, 1, 1, 1, '2018-11-26 12:05:49', '2018-11-26 12:05:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ac_empresas`
--

CREATE TABLE `ac_empresas` (
  `id` int(4) UNSIGNED NOT NULL,
  `acuerdoc_id` int(4) UNSIGNED NOT NULL,
  `empresa_id` int(4) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ac_empresas`
--

INSERT INTO `ac_empresas` (`id`, `acuerdoc_id`, `empresa_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 4, '2018-11-26 12:05:49', '2018-11-26 12:05:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_calls_count`
--

CREATE TABLE `api_calls_count` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcuentas`
--

CREATE TABLE `catcuentas` (
  `id` int(10) UNSIGNED NOT NULL,
  `banco_id` int(10) UNSIGNED NOT NULL,
  `numcuenta` varchar(10) NOT NULL,
  `clabeinterbancaria` varchar(18) DEFAULT NULL,
  `sucursal` varchar(5) DEFAULT NULL,
  `cliente_id` int(30) UNSIGNED DEFAULT NULL,
  `empresa_id` int(11) UNSIGNED DEFAULT NULL,
  `swift` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catcuentas`
--

INSERT INTO `catcuentas` (`id`, `banco_id`, `numcuenta`, `clabeinterbancaria`, `sucursal`, `cliente_id`, `empresa_id`, `swift`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '44711781', NULL, NULL, 1, NULL, NULL, '2018-11-11 11:58:02', '2018-11-11 11:58:02', NULL),
(2, 4, '444771771', NULL, NULL, NULL, 2, NULL, '2018-11-11 12:06:18', '2018-11-11 12:06:18', NULL),
(3, 1, '44711781', NULL, NULL, 9, NULL, NULL, '2018-11-13 12:07:14', '2018-11-13 12:07:14', NULL),
(4, 5, '415141', NULL, '5445', NULL, 1, NULL, '2018-11-15 04:38:20', '2018-11-15 04:38:20', NULL),
(5, 1, '441254', NULL, '1441', NULL, 2, NULL, '2018-11-15 04:43:41', '2018-11-15 11:57:51', '2018-11-15 11:57:51'),
(6, 3, '44188771', NULL, '44177', NULL, 2, NULL, '2018-11-15 04:47:30', '2018-11-15 04:47:30', NULL),
(7, 5, '14455', '774181987778181454', NULL, NULL, 2, NULL, '2018-11-15 05:45:37', '2018-11-15 05:45:37', NULL),
(8, 4, '14477', '147755771144477788', NULL, NULL, 2, NULL, '2018-11-15 05:55:51', '2018-11-15 11:57:39', '2018-11-15 11:57:39'),
(9, 3, 'xcscd', NULL, NULL, NULL, 2, NULL, '2018-11-15 06:07:59', '2018-11-15 11:53:25', '2018-11-15 11:53:25'),
(10, 4, '4471887717', NULL, '477', 11, NULL, NULL, '2018-11-15 18:08:29', '2018-11-15 18:10:54', '2018-11-15 18:10:54'),
(11, 1, '58055', '002790452700580553', '4527', NULL, 3, NULL, '2018-11-21 18:57:22', '2018-11-21 18:57:22', NULL),
(12, 3, '0852206014', '072790008522060143', NULL, NULL, 3, NULL, '2018-11-21 18:58:25', '2018-11-21 18:58:25', NULL),
(13, 1, '1441777881', NULL, NULL, 5, NULL, NULL, '2018-11-26 06:29:16', '2018-11-26 06:29:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catdocumentos`
--

CREATE TABLE `catdocumentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipodoc` int(10) UNSIGNED NOT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nota` text COLLATE utf8mb4_unicode_ci,
  `cliente_id` int(10) UNSIGNED DEFAULT NULL,
  `empresa_id` int(4) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catdocumentos`
--

INSERT INTO `catdocumentos` (`id`, `tipodoc`, `archivo`, `nota`, `cliente_id`, `empresa_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'CE/5bde1c6324f30925c51a09a80cfea7897553ab259b0eb6798eee1.jpg', NULL, NULL, NULL, '2018-11-04 05:08:35', '2018-11-04 05:08:35', NULL),
(4, 3, 'documents/AM/5bde4a4e1ece6409cf094bbf97b235fd2236a536b5067d91f0175.jpg', 'ACTA DE MATRIMONIO', 10, NULL, '2018-11-04 08:24:30', '2018-11-15 17:29:57', '2018-11-15 17:29:57'),
(6, 1, 'documents/CE/5bde4e7064d7alinea de tiempo plan estrategico.pdf', 'pdf', 10, NULL, '2018-11-04 08:42:08', '2018-11-04 08:42:08', NULL),
(7, 1, 'documents/CE/5bde4fb89108eanuncio cochinita.pdf', NULL, 10, NULL, '2018-11-04 08:47:36', '2018-11-04 08:47:36', NULL),
(8, 2, 'documents/CURP/5bde50aa6bda4NOMINA UTTAB SEP-NOV.xlsx', NULL, 7, NULL, '2018-11-04 08:51:38', '2018-11-04 08:51:38', NULL),
(13, 1, 'documents/CE/5be1f5d62157clinea de tiempo plan estrategico.pdf', NULL, NULL, 2, '2018-11-07 03:13:10', '2018-11-07 03:13:10', NULL),
(14, 4, 'documents/DOMICILI/5bec5f6d18e16doc_escan_maritza_2_mod_2.png', NULL, 7, NULL, '2018-11-15 00:46:21', '2018-11-15 00:46:21', NULL),
(15, 5, 'documents/CIF/5bed48df370bbca26f6f2-9f5e-4806-8046-adc996157ebf.jpg', 'comprobante de pago', 9, NULL, '2018-11-15 17:22:23', '2018-11-15 17:22:23', NULL),
(17, 3, 'documents/ACCON/5bed5263166ec31-05-2017 10-34 p. m. Office Lens - lista de materiales max guardería garabatos.jpg', 'lista de materiales', 11, NULL, '2018-11-15 18:02:59', '2018-11-15 18:02:59', NULL),
(18, 5, 'documents/CIF/5bed529481e5edoc_escan_maritza_3_mod.png', 'documento escaneado', 11, NULL, '2018-11-15 18:03:48', '2018-11-15 18:03:48', NULL),
(19, 5, 'documents/CIF/5bf4e9ca2664d2017_09_749980200532 (3).pdf', 'RECIBO DE LUZ', NULL, 1, '2018-11-21 06:14:50', '2018-11-21 06:14:50', NULL),
(20, 1, 'documents/CE/5bf59b5913fd7IFE FRONTAL.jpg', 'INE FRONTAL', NULL, 3, '2018-11-21 18:52:25', '2018-11-21 18:52:25', NULL),
(21, 1, 'documents/CE/5bf59b6de1f0cIFE TRASERA.jpg', 'INE ATRAS', NULL, 3, '2018-11-21 18:52:45', '2018-11-21 18:52:45', NULL),
(22, 2, 'documents/CURP/5bf59b8199dfecurp frontal.jpg', 'CURP FRONTAL', NULL, 3, '2018-11-21 18:53:05', '2018-11-21 18:53:05', NULL),
(23, 3, 'documents/ACCON/5bf59ba35ca17RFC 2018.pdf', 'ACTA DE SITUACIÓN FISCAL', NULL, 3, '2018-11-21 18:53:39', '2018-11-21 18:53:39', NULL),
(24, 4, 'documents/DOMICILI/5bf59bc1d63f5CFE MERIDA 2018.pdf', 'COMPROBANTE DE DOMICILIO CFE', NULL, 3, '2018-11-21 18:54:09', '2018-11-21 18:54:09', NULL),
(25, 6, 'documents/ACMAT/5bf59bf0baf1bACTA DE MATRIMONIO.jpg', 'ACTA DE MATRIMONITO', NULL, 3, '2018-11-21 18:54:56', '2018-11-21 18:54:56', NULL),
(26, 8, 'documents/ACNAC/5bf59e7c27e1bACTA NACIMIENTO - IVAN AQUINO.jpg', 'ACTA DE NACIMIENTO', NULL, 3, '2018-11-21 19:05:48', '2018-11-21 19:05:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catempresas`
--

CREATE TABLE `catempresas` (
  `id` int(4) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo_factura` varchar(150) DEFAULT NULL,
  `correo_notifica` varchar(150) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `comision` decimal(4,2) UNSIGNED DEFAULT NULL COMMENT 'comision en porcentaje',
  `cliente_id` int(10) UNSIGNED DEFAULT NULL,
  `apoderadolegal` varchar(150) DEFAULT NULL,
  `propia` tinyint(1) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catempresas`
--

INSERT INTO `catempresas` (`id`, `nombre`, `correo_factura`, `correo_notifica`, `telefono`, `comision`, `cliente_id`, `apoderadolegal`, `propia`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'EMPRESA PRIVADA S.A. DE C.V.', 'empresaprivada@hotmail.com', 'notificacion@empresaprivada.com.mx', '9931514120', '15.00', NULL, NULL, NULL, '2018-11-05 23:23:28', '2018-11-04 19:06:16', NULL),
(2, 'CONSORCIO COMERCIAL S. A.', 'consorciocomer@hotmail.com', NULL, '52144771181', '5.00', NULL, NULL, NULL, '2018-11-04 19:36:11', '2018-11-04 19:36:11', NULL),
(3, 'IVAN DE JESUS AQUINO ZAPATA', 'az.ivan@gmail.com', NULL, '9932796885', '6.00', NULL, NULL, NULL, '2018-11-21 11:45:52', '2018-11-21 11:45:52', NULL),
(4, 'DIPROMED VILLAHERMOSA S.A DE C.V.', 'az.ivan@gmail.com', NULL, '9932796885', '6.00', NULL, NULL, NULL, '2018-11-21 12:11:08', '2018-11-21 12:11:08', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catestados`
--

CREATE TABLE `catestados` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catestados`
--

INSERT INTO `catestados` (`id`, `nombre`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Coahuila de Zaragoza'),
(6, 'Colima'),
(7, 'Chiapas'),
(8, 'Chihuahua'),
(9, 'Ciudad de México'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán de Ocampo'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz de Ignacio de la Llave'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catmunicipios`
--

CREATE TABLE `catmunicipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `noMun` int(11) NOT NULL,
  `nomMunicipio` varchar(55) NOT NULL,
  `id_edo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catmunicipios`
--

INSERT INTO `catmunicipios` (`id`, `noMun`, `nomMunicipio`, `id_edo`) VALUES
(1, 1, 'Aguascalientes', 1),
(2, 1, 'Ensenada', 2),
(3, 1, 'Comondú', 3),
(4, 1, 'Calkiní', 4),
(5, 1, 'Abasolo', 5),
(6, 1, 'Armería', 6),
(7, 1, 'Acacoyagua', 7),
(8, 1, 'Ahumada', 8),
(9, 1, 'Canatlán', 10),
(10, 1, 'Abasolo', 11),
(11, 1, 'Acapulco de Juárez', 12),
(12, 1, 'Acatlán', 13),
(13, 1, 'Acatic', 14),
(14, 1, 'Acambay de Ruíz Castañeda', 15),
(15, 1, 'Acuitzio', 16),
(16, 1, 'Amacuzac', 17),
(17, 1, 'Acaponeta', 18),
(18, 1, 'Abasolo', 19),
(19, 1, 'Abejones', 20),
(20, 1, 'Acajete', 21),
(21, 1, 'Amealco de Bonfil', 22),
(22, 1, 'Cozumel', 23),
(23, 1, 'Ahualulco', 24),
(24, 1, 'Ahome', 25),
(25, 1, 'Aconchi', 26),
(26, 1, 'Balancán', 27),
(27, 1, 'Abasolo', 28),
(28, 1, 'Amaxac de Guerrero', 29),
(29, 1, 'Acajete', 30),
(30, 1, 'Abalá', 31),
(31, 1, 'Apozol', 32),
(32, 2, 'Asientos', 1),
(33, 2, 'Mexicali', 2),
(34, 2, 'Mulegé', 3),
(35, 2, 'Campeche', 4),
(36, 2, 'Acuña', 5),
(37, 2, 'Colima', 6),
(38, 2, 'Acala', 7),
(39, 2, 'Aldama', 8),
(40, 2, 'Azcapotzalco', 9),
(41, 2, 'Canelas', 10),
(42, 2, 'Acámbaro', 11),
(43, 2, 'Ahuacuotzingo', 12),
(44, 2, 'Acaxochitlán', 13),
(45, 2, 'Acatlán de Juárez', 14),
(46, 2, 'Acolman', 15),
(47, 2, 'Aguililla', 16),
(48, 2, 'Atlatlahucan', 17),
(49, 2, 'Ahuacatlán', 18),
(50, 2, 'Agualeguas', 19),
(51, 2, 'Acatlán de Pérez Figueroa', 20),
(52, 2, 'Acateno', 21),
(53, 2, 'Pinal de Amoles', 22),
(54, 2, 'Felipe Carrillo Puerto', 23),
(55, 2, 'Alaquines', 24),
(56, 2, 'Angostura', 25),
(57, 2, 'Agua Prieta', 26),
(58, 2, 'Cárdenas', 27),
(59, 2, 'Aldama', 28),
(60, 2, 'Apetatitlán de Antonio Carvajal', 29),
(61, 2, 'Acatlán', 30),
(62, 2, 'Acanceh', 31),
(63, 2, 'Apulco', 32),
(64, 3, 'Calvillo', 1),
(65, 3, 'Tecate', 2),
(66, 3, 'La Paz', 3),
(67, 3, 'Carmen', 4),
(68, 3, 'Allende', 5),
(69, 3, 'Comala', 6),
(70, 3, 'Acapetahua', 7),
(71, 3, 'Allende', 8),
(72, 3, 'Coyoacán', 9),
(73, 3, 'Coneto de Comonfort', 10),
(74, 3, 'San Miguel de Allende', 11),
(75, 3, 'Ajuchitlán del Progreso', 12),
(76, 3, 'Actopan', 13),
(77, 3, 'Ahualulco de Mercado', 14),
(78, 3, 'Aculco', 15),
(79, 3, 'Álvaro Obregón', 16),
(80, 3, 'Axochiapan', 17),
(81, 3, 'Amatlán de Cañas', 18),
(82, 3, 'Los Aldamas', 19),
(83, 3, 'Asunción Cacalotepec', 20),
(84, 3, 'Acatlán', 21),
(85, 3, 'Arroyo Seco', 22),
(86, 3, 'Isla Mujeres', 23),
(87, 3, 'Aquismón', 24),
(88, 3, 'Badiraguato', 25),
(89, 3, 'Alamos', 26),
(90, 3, 'Centla', 27),
(91, 3, 'Altamira', 28),
(92, 3, 'Atlangatepec', 29),
(93, 3, 'Acayucan', 30),
(94, 3, 'Akil', 31),
(95, 3, 'Atolinga', 32),
(96, 4, 'Cosío', 1),
(97, 4, 'Tijuana', 2),
(98, 4, 'Champotón', 4),
(99, 4, 'Arteaga', 5),
(100, 4, 'Coquimatlán', 6),
(101, 4, 'Altamirano', 7),
(102, 4, 'Aquiles Serdán', 8),
(103, 4, 'Cuajimalpa de Morelos', 9),
(104, 4, 'Cuencamé', 10),
(105, 4, 'Apaseo el Alto', 11),
(106, 4, 'Alcozauca de Guerrero', 12),
(107, 4, 'Agua Blanca de Iturbide', 13),
(108, 4, 'Amacueca', 14),
(109, 4, 'Almoloya de Alquisiras', 15),
(110, 4, 'Angamacutiro', 16),
(111, 4, 'Ayala', 17),
(112, 4, 'Compostela', 18),
(113, 4, 'Allende', 19),
(114, 4, 'Asunción Cuyotepeji', 20),
(115, 4, 'Acatzingo', 21),
(116, 4, 'Cadereyta de Montes', 22),
(117, 4, 'Othón P. Blanco', 23),
(118, 4, 'Armadillo de los Infante', 24),
(119, 4, 'Concordia', 25),
(120, 4, 'Altar', 26),
(121, 4, 'Centro', 27),
(122, 4, 'Antiguo Morelos', 28),
(123, 4, 'Atltzayanca', 29),
(124, 4, 'Actopan', 30),
(125, 4, 'Baca', 31),
(126, 4, 'Benito Juárez', 32),
(127, 5, 'Jesús María', 1),
(128, 5, 'Playas de Rosarito', 2),
(129, 5, 'Hecelchakán', 4),
(130, 5, 'Candela', 5),
(131, 5, 'Cuauhtémoc', 6),
(132, 5, 'Amatán', 7),
(133, 5, 'Ascensión', 8),
(134, 5, 'Gustavo A. Madero', 9),
(135, 5, 'Durango', 10),
(136, 5, 'Apaseo el Grande', 11),
(137, 5, 'Alpoyeca', 12),
(138, 5, 'Ajacuba', 13),
(139, 5, 'Amatitán', 14),
(140, 5, 'Almoloya de Juárez', 15),
(141, 5, 'Angangueo', 16),
(142, 5, 'Coatlán del Río', 17),
(143, 5, 'Huajicori', 18),
(144, 5, 'Anáhuac', 19),
(145, 5, 'Asunción Ixtaltepec', 20),
(146, 5, 'Acteopan', 21),
(147, 5, 'Colón', 22),
(148, 5, 'Benito Juárez', 23),
(149, 5, 'Cárdenas', 24),
(150, 5, 'Cosalá', 25),
(151, 5, 'Arivechi', 26),
(152, 5, 'Comalcalco', 27),
(153, 5, 'Burgos', 28),
(154, 5, 'Apizaco', 29),
(155, 5, 'Acula', 30),
(156, 5, 'Bokobá', 31),
(157, 5, 'Calera', 32),
(158, 6, 'Pabellón de Arteaga', 1),
(159, 6, 'Hopelchén', 4),
(160, 6, 'Castaños', 5),
(161, 6, 'Ixtlahuacán', 6),
(162, 6, 'Amatenango de la Frontera', 7),
(163, 6, 'Bachíniva', 8),
(164, 6, 'Iztacalco', 9),
(165, 6, 'General Simón Bolívar', 10),
(166, 6, 'Atarjea', 11),
(167, 6, 'Apaxtla', 12),
(168, 6, 'Alfajayucan', 13),
(169, 6, 'Ameca', 14),
(170, 6, 'Almoloya del Río', 15),
(171, 6, 'Apatzingán', 16),
(172, 6, 'Cuautla', 17),
(173, 6, 'Ixtlán del Río', 18),
(174, 6, 'Apodaca', 19),
(175, 6, 'Asunción Nochixtlán', 20),
(176, 6, 'Ahuacatlán', 21),
(177, 6, 'Corregidora', 22),
(178, 6, 'José María Morelos', 23),
(179, 6, 'Catorce', 24),
(180, 6, 'Culiacán', 25),
(181, 6, 'Arizpe', 26),
(182, 6, 'Cunduacán', 27),
(183, 6, 'Bustamante', 28),
(184, 6, 'Calpulalpan', 29),
(185, 6, 'Acultzingo', 30),
(186, 6, 'Buctzotz', 31),
(187, 6, 'Cañitas de Felipe Pescador', 32),
(188, 7, 'Rincón de Romos', 1),
(189, 7, 'Palizada', 4),
(190, 7, 'Cuatro Ciénegas', 5),
(191, 7, 'Manzanillo', 6),
(192, 7, 'Amatenango del Valle', 7),
(193, 7, 'Balleza', 8),
(194, 7, 'Iztapalapa', 9),
(195, 7, 'Gómez Palacio', 10),
(196, 7, 'Celaya', 11),
(197, 7, 'Arcelia', 12),
(198, 7, 'Almoloya', 13),
(199, 7, 'San Juanito de Escobedo', 14),
(200, 7, 'Amanalco', 15),
(201, 7, 'Aporo', 16),
(202, 7, 'Cuernavaca', 17),
(203, 7, 'Jala', 18),
(204, 7, 'Aramberri', 19),
(205, 7, 'Asunción Ocotlán', 20),
(206, 7, 'Ahuatlán', 21),
(207, 7, 'Ezequiel Montes', 22),
(208, 7, 'Lázaro Cárdenas', 23),
(209, 7, 'Cedral', 24),
(210, 7, 'Choix', 25),
(211, 7, 'Atil', 26),
(212, 7, 'Emiliano Zapata', 27),
(213, 7, 'Camargo', 28),
(214, 7, 'El Carmen Tequexquitla', 29),
(215, 7, 'Camarón de Tejeda', 30),
(216, 7, 'Cacalchén', 31),
(217, 7, 'Concepción del Oro', 32),
(218, 8, 'San José de Gracia', 1),
(219, 8, 'Los Cabos', 3),
(220, 8, 'Tenabo', 4),
(221, 8, 'Escobedo', 5),
(222, 8, 'Minatitlán', 6),
(223, 8, 'Angel Albino Corzo', 7),
(224, 8, 'Batopilas', 8),
(225, 8, 'La Magdalena Contreras', 9),
(226, 8, 'Guadalupe Victoria', 10),
(227, 8, 'Manuel Doblado', 11),
(228, 8, 'Atenango del Río', 12),
(229, 8, 'Apan', 13),
(230, 8, 'Arandas', 14),
(231, 8, 'Amatepec', 15),
(232, 8, 'Aquila', 16),
(233, 8, 'Emiliano Zapata', 17),
(234, 8, 'Xalisco', 18),
(235, 8, 'Bustamante', 19),
(236, 8, 'Asunción Tlacolulita', 20),
(237, 8, 'Ahuazotepec', 21),
(238, 8, 'Huimilpan', 22),
(239, 8, 'Solidaridad', 23),
(240, 8, 'Cerritos', 24),
(241, 8, 'Elota', 25),
(242, 8, 'Bacadéhuachi', 26),
(243, 8, 'Huimanguillo', 27),
(244, 8, 'Casas', 28),
(245, 8, 'Cuapiaxtla', 29),
(246, 8, 'Alpatláhuac', 30),
(247, 8, 'Calotmul', 31),
(248, 8, 'Cuauhtémoc', 32),
(249, 9, 'Tepezalá', 1),
(250, 9, 'Loreto', 3),
(251, 9, 'Escárcega', 4),
(252, 9, 'Francisco I. Madero', 5),
(253, 9, 'Tecomán', 6),
(254, 9, 'Arriaga', 7),
(255, 9, 'Bocoyna', 8),
(256, 9, 'Milpa Alta', 9),
(257, 9, 'Guanaceví', 10),
(258, 9, 'Comonfort', 11),
(259, 9, 'Atlamajalcingo del Monte', 12),
(260, 9, 'El Arenal', 13),
(261, 9, 'El Arenal', 14),
(262, 9, 'Amecameca', 15),
(263, 9, 'Ario', 16),
(264, 9, 'Huitzilac', 17),
(265, 9, 'Del Nayar', 18),
(266, 9, 'Cadereyta Jiménez', 19),
(267, 9, 'Ayotzintepec', 20),
(268, 9, 'Ahuehuetitla', 21),
(269, 9, 'Jalpan de Serra', 22),
(270, 9, 'Tulum', 23),
(271, 9, 'Cerro de San Pedro', 24),
(272, 9, 'Escuinapa', 25),
(273, 9, 'Bacanora', 26),
(274, 9, 'Jalapa', 27),
(275, 9, 'Ciudad Madero', 28),
(276, 9, 'Cuaxomulco', 29),
(277, 9, 'Alto Lucero de Gutiérrez Barrios', 30),
(278, 9, 'Cansahcab', 31),
(279, 9, 'Chalchihuites', 32),
(280, 10, 'El Llano', 1),
(281, 10, 'Calakmul', 4),
(282, 10, 'Frontera', 5),
(283, 10, 'Villa de Álvarez', 6),
(284, 10, 'Bejucal de Ocampo', 7),
(285, 10, 'Buenaventura', 8),
(286, 10, 'Álvaro Obregón', 9),
(287, 10, 'Hidalgo', 10),
(288, 10, 'Coroneo', 11),
(289, 10, 'Atlixtac', 12),
(290, 10, 'Atitalaquia', 13),
(291, 10, 'Atemajac de Brizuela', 14),
(292, 10, 'Apaxco', 15),
(293, 10, 'Arteaga', 16),
(294, 10, 'Jantetelco', 17),
(295, 10, 'Rosamorada', 18),
(296, 10, 'El Carmen', 19),
(297, 10, 'El Barrio de la Soledad', 20),
(298, 10, 'Ajalpan', 21),
(299, 10, 'Landa de Matamoros', 22),
(300, 10, 'Bacalar', 23),
(301, 10, 'Ciudad del Maíz', 24),
(302, 10, 'El Fuerte', 25),
(303, 10, 'Bacerac', 26),
(304, 10, 'Jalpa de Méndez', 27),
(305, 10, 'Cruillas', 28),
(306, 10, 'Chiautempan', 29),
(307, 10, 'Altotonga', 30),
(308, 10, 'Cantamayec', 31),
(309, 10, 'Fresnillo', 32),
(310, 11, 'San Francisco de los Romo', 1),
(311, 11, 'Candelaria', 4),
(312, 11, 'General Cepeda', 5),
(313, 11, 'Bella Vista', 7),
(314, 11, 'Camargo', 8),
(315, 11, 'Tláhuac', 9),
(316, 11, 'Indé', 10),
(317, 11, 'Cortazar', 11),
(318, 11, 'Atoyac de Álvarez', 12),
(319, 11, 'Atlapexco', 13),
(320, 11, 'Atengo', 14),
(321, 11, 'Atenco', 15),
(322, 11, 'Briseñas', 16),
(323, 11, 'Jiutepec', 17),
(324, 11, 'Ruíz', 18),
(325, 11, 'Cerralvo', 19),
(326, 11, 'Calihualá', 20),
(327, 11, 'Albino Zertuche', 21),
(328, 11, 'El Marqués', 22),
(329, 11, 'Ciudad Fernández', 24),
(330, 11, 'Guasave', 25),
(331, 11, 'Bacoachi', 26),
(332, 11, 'Jonuta', 27),
(333, 11, 'Gómez Farías', 28),
(334, 11, 'Muñoz de Domingo Arenas', 29),
(335, 11, 'Alvarado', 30),
(336, 11, 'Celestún', 31),
(337, 11, 'Trinidad García de la Cadena', 32),
(338, 12, 'Guerrero', 5),
(339, 12, 'Berriozábal', 7),
(340, 12, 'Carichí', 8),
(341, 12, 'Tlalpan', 9),
(342, 12, 'Lerdo', 10),
(343, 12, 'Cuerámaro', 11),
(344, 12, 'Ayutla de los Libres', 12),
(345, 12, 'Atotonilco el Grande', 13),
(346, 12, 'Atenguillo', 14),
(347, 12, 'Atizapán', 15),
(348, 12, 'Buenavista', 16),
(349, 12, 'Jojutla', 17),
(350, 12, 'San Blas', 18),
(351, 12, 'Ciénega de Flores', 19),
(352, 12, 'Candelaria Loxicha', 20),
(353, 12, 'Aljojuca', 21),
(354, 12, 'Pedro Escobedo', 22),
(355, 12, 'Tancanhuitz', 24),
(356, 12, 'Mazatlán', 25),
(357, 12, 'Bácum', 26),
(358, 12, 'Macuspana', 27),
(359, 12, 'González', 28),
(360, 12, 'Españita', 29),
(361, 12, 'Amatitlán', 30),
(362, 12, 'Cenotillo', 31),
(363, 12, 'Genaro Codina', 32),
(364, 13, 'Hidalgo', 5),
(365, 13, 'Bochil', 7),
(366, 13, 'Casas Grandes', 8),
(367, 13, 'Xochimilco', 9),
(368, 13, 'Mapimí', 10),
(369, 13, 'Doctor Mora', 11),
(370, 13, 'Azoyú', 12),
(371, 13, 'Atotonilco de Tula', 13),
(372, 13, 'Atotonilco el Alto', 14),
(373, 13, 'Atizapán de Zaragoza', 15),
(374, 13, 'Carácuaro', 16),
(375, 13, 'Jonacatepec', 17),
(376, 13, 'San Pedro Lagunillas', 18),
(377, 13, 'China', 19),
(378, 13, 'Ciénega de Zimatlán', 20),
(379, 13, 'Altepexi', 21),
(380, 13, 'Peñamiller', 22),
(381, 13, 'Ciudad Valles', 24),
(382, 13, 'Mocorito', 25),
(383, 13, 'Banámichi', 26),
(384, 13, 'Nacajuca', 27),
(385, 13, 'Güémez', 28),
(386, 13, 'Huamantla', 29),
(387, 13, 'Naranjos Amatlán', 30),
(388, 13, 'Conkal', 31),
(389, 13, 'General Enrique Estrada', 32),
(390, 14, 'Jiménez', 5),
(391, 14, 'El Bosque', 7),
(392, 14, 'Coronado', 8),
(393, 14, 'Benito Juárez', 9),
(394, 14, 'Mezquital', 10),
(395, 14, 'Dolores Hidalgo Cuna de la Independencia Nacional', 11),
(396, 14, 'Benito Juárez', 12),
(397, 14, 'Calnali', 13),
(398, 14, 'Atoyac', 14),
(399, 14, 'Atlacomulco', 15),
(400, 14, 'Coahuayana', 16),
(401, 14, 'Mazatepec', 17),
(402, 14, 'Santa María del Oro', 18),
(403, 14, 'Doctor Arroyo', 19),
(404, 14, 'Ciudad Ixtepec', 20),
(405, 14, 'Amixtlán', 21),
(406, 14, 'Querétaro', 22),
(407, 14, 'Coxcatlán', 24),
(408, 14, 'Rosario', 25),
(409, 14, 'Baviácora', 26),
(410, 14, 'Paraíso', 27),
(411, 14, 'Guerrero', 28),
(412, 14, 'Hueyotlipan', 29),
(413, 14, 'Amatlán de los Reyes', 30),
(414, 14, 'Cuncunul', 31),
(415, 14, 'General Francisco R. Murguía', 32),
(416, 15, 'Juárez', 5),
(417, 15, 'Cacahoatán', 7),
(418, 15, 'Coyame del Sotol', 8),
(419, 15, 'Cuauhtémoc', 9),
(420, 15, 'Nazas', 10),
(421, 15, 'Guanajuato', 11),
(422, 15, 'Buenavista de Cuéllar', 12),
(423, 15, 'Cardonal', 13),
(424, 15, 'Autlán de Navarro', 14),
(425, 15, 'Atlautla', 15),
(426, 15, 'Coalcomán de Vázquez Pallares', 16),
(427, 15, 'Miacatlán', 17),
(428, 15, 'Santiago Ixcuintla', 18),
(429, 15, 'Doctor Coss', 19),
(430, 15, 'Coatecas Altas', 20),
(431, 15, 'Amozoc', 21),
(432, 15, 'San Joaquín', 22),
(433, 15, 'Charcas', 24),
(434, 15, 'Salvador Alvarado', 25),
(435, 15, 'Bavispe', 26),
(436, 15, 'Tacotalpa', 27),
(437, 15, 'Gustavo Díaz Ordaz', 28),
(438, 15, 'Ixtacuixtla de Mariano Matamoros', 29),
(439, 15, 'Angel R. Cabada', 30),
(440, 15, 'Cuzamá', 31),
(441, 15, 'El Plateado de Joaquín Amaro', 32),
(442, 16, 'Lamadrid', 5),
(443, 16, 'Catazajá', 7),
(444, 16, 'La Cruz', 8),
(445, 16, 'Miguel Hidalgo', 9),
(446, 16, 'Nombre de Dios', 10),
(447, 16, 'Huanímaro', 11),
(448, 16, 'Coahuayutla de José María Izazaga', 12),
(449, 16, 'Cuautepec de Hinojosa', 13),
(450, 16, 'Ayotlán', 14),
(451, 16, 'Axapusco', 15),
(452, 16, 'Coeneo', 16),
(453, 16, 'Ocuituco', 17),
(454, 16, 'Tecuala', 18),
(455, 16, 'Doctor González', 19),
(456, 16, 'Coicoyán de las Flores', 20),
(457, 16, 'Aquixtla', 21),
(458, 16, 'San Juan del Río', 22),
(459, 16, 'Ebano', 24),
(460, 16, 'San Ignacio', 25),
(461, 16, 'Benjamín Hill', 26),
(462, 16, 'Teapa', 27),
(463, 16, 'Hidalgo', 28),
(464, 16, 'Ixtenco', 29),
(465, 16, 'La Antigua', 30),
(466, 16, 'Chacsinkín', 31),
(467, 16, 'General Pánfilo Natera', 32),
(468, 17, 'Matamoros', 5),
(469, 17, 'Cintalapa', 7),
(470, 17, 'Cuauhtémoc', 8),
(471, 17, 'Venustiano Carranza', 9),
(472, 17, 'Ocampo', 10),
(473, 17, 'Irapuato', 11),
(474, 17, 'Cocula', 12),
(475, 17, 'Chapantongo', 13),
(476, 17, 'Ayutla', 14),
(477, 17, 'Ayapango', 15),
(478, 17, 'Contepec', 16),
(479, 17, 'Puente de Ixtla', 17),
(480, 17, 'Tepic', 18),
(481, 17, 'Galeana', 19),
(482, 17, 'La Compañía', 20),
(483, 17, 'Atempan', 21),
(484, 17, 'Tequisquiapan', 22),
(485, 17, 'Guadalcázar', 24),
(486, 17, 'Sinaloa', 25),
(487, 17, 'Caborca', 26),
(488, 17, 'Tenosique', 27),
(489, 17, 'Jaumave', 28),
(490, 17, 'Mazatecochco de José María Morelos', 29),
(491, 17, 'Apazapan', 30),
(492, 17, 'Chankom', 31),
(493, 17, 'Guadalupe', 32),
(494, 18, 'Monclova', 5),
(495, 18, 'Coapilla', 7),
(496, 18, 'Cusihuiriachi', 8),
(497, 18, 'El Oro', 10),
(498, 18, 'Jaral del Progreso', 11),
(499, 18, 'Copala', 12),
(500, 18, 'Chapulhuacán', 13),
(501, 18, 'La Barca', 14),
(502, 18, 'Calimaya', 15),
(503, 18, 'Copándaro', 16),
(504, 18, 'Temixco', 17),
(505, 18, 'Tuxpan', 18),
(506, 18, 'García', 19),
(507, 18, 'Concepción Buenavista', 20),
(508, 18, 'Atexcal', 21),
(509, 18, 'Tolimán', 22),
(510, 18, 'Huehuetlán', 24),
(511, 18, 'Navolato', 25),
(512, 18, 'Cajeme', 26),
(513, 18, 'Jiménez', 28),
(514, 18, 'Contla de Juan Cuamatzi', 29),
(515, 18, 'Aquila', 30),
(516, 18, 'Chapab', 31),
(517, 18, 'Huanusco', 32),
(518, 19, 'Morelos', 5),
(519, 19, 'Comitán de Domínguez', 7),
(520, 19, 'Chihuahua', 8),
(521, 19, 'Otáez', 10),
(522, 19, 'Jerécuaro', 11),
(523, 19, 'Copalillo', 12),
(524, 19, 'Chilcuautla', 13),
(525, 19, 'Bolaños', 14),
(526, 19, 'Capulhuac', 15),
(527, 19, 'Cotija', 16),
(528, 19, 'Tepalcingo', 17),
(529, 19, 'La Yesca', 18),
(530, 19, 'San Pedro Garza García', 19),
(531, 19, 'Concepción Pápalo', 20),
(532, 19, 'Atlixco', 21),
(533, 19, 'Lagunillas', 24),
(534, 19, 'Cananea', 26),
(535, 19, 'Llera', 28),
(536, 19, 'Tepetitla de Lardizábal', 29),
(537, 19, 'Astacinga', 30),
(538, 19, 'Chemax', 31),
(539, 19, 'Jalpa', 32),
(540, 20, 'Múzquiz', 5),
(541, 20, 'La Concordia', 7),
(542, 20, 'Chínipas', 8),
(543, 20, 'Pánuco de Coronado', 10),
(544, 20, 'León', 11),
(545, 20, 'Copanatoyac', 12),
(546, 20, 'Eloxochitlán', 13),
(547, 20, 'Cabo Corrientes', 14),
(548, 20, 'Coacalco de Berriozábal', 15),
(549, 20, 'Cuitzeo', 16),
(550, 20, 'Tepoztlán', 17),
(551, 20, 'Bahía de Banderas', 18),
(552, 20, 'General Bravo', 19),
(553, 20, 'Constancia del Rosario', 20),
(554, 20, 'Atoyatempan', 21),
(555, 20, 'Matehuala', 24),
(556, 20, 'Carbó', 26),
(557, 20, 'Mainero', 28),
(558, 20, 'Sanctórum de Lázaro Cárdenas', 29),
(559, 20, 'Atlahuilco', 30),
(560, 20, 'Chicxulub Pueblo', 31),
(561, 20, 'Jerez', 32),
(562, 21, 'Nadadores', 5),
(563, 21, 'Copainalá', 7),
(564, 21, 'Delicias', 8),
(565, 21, 'Peñón Blanco', 10),
(566, 21, 'Moroleón', 11),
(567, 21, 'Coyuca de Benítez', 12),
(568, 21, 'Emiliano Zapata', 13),
(569, 21, 'Casimiro Castillo', 14),
(570, 21, 'Coatepec Harinas', 15),
(571, 21, 'Charapan', 16),
(572, 21, 'Tetecala', 17),
(573, 21, 'General Escobedo', 19),
(574, 21, 'Cosolapa', 20),
(575, 21, 'Atzala', 21),
(576, 21, 'Mexquitic de Carmona', 24),
(577, 21, 'La Colorada', 26),
(578, 21, 'El Mante', 28),
(579, 21, 'Nanacamilpa de Mariano Arista', 29),
(580, 21, 'Atoyac', 30),
(581, 21, 'Chichimilá', 31),
(582, 21, 'Jiménez del Teul', 32),
(583, 22, 'Nava', 5),
(584, 22, 'Chalchihuitán', 7),
(585, 22, 'Dr. Belisario Domínguez', 8),
(586, 22, 'Poanas', 10),
(587, 22, 'Ocampo', 11),
(588, 22, 'Coyuca de Catalán', 12),
(589, 22, 'Epazoyucan', 13),
(590, 22, 'Cihuatlán', 14),
(591, 22, 'Cocotitlán', 15),
(592, 22, 'Charo', 16),
(593, 22, 'Tetela del Volcán', 17),
(594, 22, 'General Terán', 19),
(595, 22, 'Cosoltepec', 20),
(596, 22, 'Atzitzihuacán', 21),
(597, 22, 'Moctezuma', 24),
(598, 22, 'Cucurpe', 26),
(599, 22, 'Matamoros', 28),
(600, 22, 'Acuamanala de Miguel Hidalgo', 29),
(601, 22, 'Atzacan', 30),
(602, 22, 'Chikindzonot', 31),
(603, 22, 'Juan Aldama', 32),
(604, 23, 'Ocampo', 5),
(605, 23, 'Chamula', 7),
(606, 23, 'Galeana', 8),
(607, 23, 'Pueblo Nuevo', 10),
(608, 23, 'Pénjamo', 11),
(609, 23, 'Cuajinicuilapa', 12),
(610, 23, 'Francisco I. Madero', 13),
(611, 23, 'Zapotlán el Grande', 14),
(612, 23, 'Coyotepec', 15),
(613, 23, 'Chavinda', 16),
(614, 23, 'Tlalnepantla', 17),
(615, 23, 'General Treviño', 19),
(616, 23, 'Cuilápam de Guerrero', 20),
(617, 23, 'Atzitzintla', 21),
(618, 23, 'Rayón', 24),
(619, 23, 'Cumpas', 26),
(620, 23, 'Méndez', 28),
(621, 23, 'Natívitas', 29),
(622, 23, 'Atzalan', 30),
(623, 23, 'Chocholá', 31),
(624, 23, 'Juchipila', 32),
(625, 24, 'Parras', 5),
(626, 24, 'Chanal', 7),
(627, 24, 'Santa Isabel', 8),
(628, 24, 'Rodeo', 10),
(629, 24, 'Pueblo Nuevo', 11),
(630, 24, 'Cualác', 12),
(631, 24, 'Huasca de Ocampo', 13),
(632, 24, 'Cocula', 14),
(633, 24, 'Cuautitlán', 15),
(634, 24, 'Cherán', 16),
(635, 24, 'Tlaltizapán de Zapata', 17),
(636, 24, 'General Zaragoza', 19),
(637, 24, 'Cuyamecalco Villa de Zaragoza', 20),
(638, 24, 'Axutla', 21),
(639, 24, 'Rioverde', 24),
(640, 24, 'Divisaderos', 26),
(641, 24, 'Mier', 28),
(642, 24, 'Panotla', 29),
(643, 24, 'Tlaltetela', 30),
(644, 24, 'Chumayel', 31),
(645, 24, 'Loreto', 32),
(646, 25, 'Piedras Negras', 5),
(647, 25, 'Chapultenango', 7),
(648, 25, 'Gómez Farías', 8),
(649, 25, 'San Bernardo', 10),
(650, 25, 'Purísima del Rincón', 11),
(651, 25, 'Cuautepec', 12),
(652, 25, 'Huautla', 13),
(653, 25, 'Colotlán', 14),
(654, 25, 'Chalco', 15),
(655, 25, 'Chilchota', 16),
(656, 25, 'Tlaquiltenango', 17),
(657, 25, 'General Zuazua', 19),
(658, 25, 'Chahuites', 20),
(659, 25, 'Ayotoxco de Guerrero', 21),
(660, 25, 'Salinas', 24),
(661, 25, 'Empalme', 26),
(662, 25, 'Miguel Alemán', 28),
(663, 25, 'San Pablo del Monte', 29),
(664, 25, 'Ayahualulco', 30),
(665, 25, 'Dzán', 31),
(666, 25, 'Luis Moya', 32),
(667, 26, 'Progreso', 5),
(668, 26, 'Chenalhó', 7),
(669, 26, 'Gran Morelos', 8),
(670, 26, 'San Dimas', 10),
(671, 26, 'Romita', 11),
(672, 26, 'Cuetzala del Progreso', 12),
(673, 26, 'Huazalingo', 13),
(674, 26, 'Concepción de Buenos Aires', 14),
(675, 26, 'Chapa de Mota', 15),
(676, 26, 'Chinicuila', 16),
(677, 26, 'Tlayacapan', 17),
(678, 26, 'Guadalupe', 19),
(679, 26, 'Chalcatongo de Hidalgo', 20),
(680, 26, 'Calpan', 21),
(681, 26, 'San Antonio', 24),
(682, 26, 'Etchojoa', 26),
(683, 26, 'Miquihuana', 28),
(684, 26, 'Santa Cruz Tlaxcala', 29),
(685, 26, 'Banderilla', 30),
(686, 26, 'Dzemul', 31),
(687, 26, 'Mazapil', 32),
(688, 27, 'Ramos Arizpe', 5),
(689, 27, 'Chiapa de Corzo', 7),
(690, 27, 'Guachochi', 8),
(691, 27, 'San Juan de Guadalupe', 10),
(692, 27, 'Salamanca', 11),
(693, 27, 'Cutzamala de Pinzón', 12),
(694, 27, 'Huehuetla', 13),
(695, 27, 'Cuautitlán de García Barragán', 14),
(696, 27, 'Chapultepec', 15),
(697, 27, 'Chucándiro', 16),
(698, 27, 'Totolapan', 17),
(699, 27, 'Los Herreras', 19),
(700, 27, 'Chiquihuitlán de Benito Juárez', 20),
(701, 27, 'Caltepec', 21),
(702, 27, 'San Ciro de Acosta', 24),
(703, 27, 'Fronteras', 26),
(704, 27, 'Nuevo Laredo', 28),
(705, 27, 'Tenancingo', 29),
(706, 27, 'Benito Juárez', 30),
(707, 27, 'Dzidzantún', 31),
(708, 27, 'Melchor Ocampo', 32),
(709, 28, 'Sabinas', 5),
(710, 28, 'Chiapilla', 7),
(711, 28, 'Guadalupe', 8),
(712, 28, 'San Juan del Río', 10),
(713, 28, 'Salvatierra', 11),
(714, 28, 'Chilapa de Álvarez', 12),
(715, 28, 'Huejutla de Reyes', 13),
(716, 28, 'Cuautla', 14),
(717, 28, 'Chiautla', 15),
(718, 28, 'Churintzio', 16),
(719, 28, 'Xochitepec', 17),
(720, 28, 'Higueras', 19),
(721, 28, 'Heroica Ciudad de Ejutla de Crespo', 20),
(722, 28, 'Camocuautla', 21),
(723, 28, 'San Luis Potosí', 24),
(724, 28, 'Granados', 26),
(725, 28, 'Nuevo Morelos', 28),
(726, 28, 'Teolocholco', 29),
(727, 28, 'Boca del Río', 30),
(728, 28, 'Dzilam de Bravo', 31),
(729, 28, 'Mezquital del Oro', 32),
(730, 29, 'Sacramento', 5),
(731, 29, 'Chicoasén', 7),
(732, 29, 'Guadalupe y Calvo', 8),
(733, 29, 'San Luis del Cordero', 10),
(734, 29, 'San Diego de la Unión', 11),
(735, 29, 'Chilpancingo de los Bravo', 12),
(736, 29, 'Huichapan', 13),
(737, 29, 'Cuquío', 14),
(738, 29, 'Chicoloapan', 15),
(739, 29, 'Churumuco', 16),
(740, 29, 'Yautepec', 17),
(741, 29, 'Hualahuises', 19),
(742, 29, 'Eloxochitlán de Flores Magón', 20),
(743, 29, 'Caxhuacan', 21),
(744, 29, 'San Martín Chalchicuautla', 24),
(745, 29, 'Guaymas', 26),
(746, 29, 'Ocampo', 28),
(747, 29, 'Tepeyanco', 29),
(748, 29, 'Calcahualco', 30),
(749, 29, 'Dzilam González', 31),
(750, 29, 'Miguel Auza', 32),
(751, 30, 'Saltillo', 5),
(752, 30, 'Chicomuselo', 7),
(753, 30, 'Guazapares', 8),
(754, 30, 'San Pedro del Gallo', 10),
(755, 30, 'San Felipe', 11),
(756, 30, 'Florencio Villarreal', 12),
(757, 30, 'Ixmiquilpan', 13),
(758, 30, 'Chapala', 14),
(759, 30, 'Chiconcuac', 15),
(760, 30, 'Ecuandureo', 16),
(761, 30, 'Yecapixtla', 17),
(762, 30, 'Iturbide', 19),
(763, 30, 'El Espinal', 20),
(764, 30, 'Coatepec', 21),
(765, 30, 'San Nicolás Tolentino', 24),
(766, 30, 'Hermosillo', 26),
(767, 30, 'Padilla', 28),
(768, 30, 'Terrenate', 29),
(769, 30, 'Camerino Z. Mendoza', 30),
(770, 30, 'Dzitás', 31),
(771, 30, 'Momax', 32),
(772, 31, 'San Buenaventura', 5),
(773, 31, 'Chilón', 7),
(774, 31, 'Guerrero', 8),
(775, 31, 'Santa Clara', 10),
(776, 31, 'San Francisco del Rincón', 11),
(777, 31, 'General Canuto A. Neri', 12),
(778, 31, 'Jacala de Ledezma', 13),
(779, 31, 'Chimaltitán', 14),
(780, 31, 'Chimalhuacán', 15),
(781, 31, 'Epitacio Huerta', 16),
(782, 31, 'Zacatepec', 17),
(783, 31, 'Juárez', 19),
(784, 31, 'Tamazulápam del Espíritu Santo', 20),
(785, 31, 'Coatzingo', 21),
(786, 31, 'Santa Catarina', 24),
(787, 31, 'Huachinera', 26),
(788, 31, 'Palmillas', 28),
(789, 31, 'Tetla de la Solidaridad', 29),
(790, 31, 'Carrillo Puerto', 30),
(791, 31, 'Dzoncauich', 31),
(792, 31, 'Monte Escobedo', 32),
(793, 32, 'San Juan de Sabinas', 5),
(794, 32, 'Escuintla', 7),
(795, 32, 'Hidalgo del Parral', 8),
(796, 32, 'Santiago Papasquiaro', 10),
(797, 32, 'San José Iturbide', 11),
(798, 32, 'General Heliodoro Castillo', 12),
(799, 32, 'Jaltocán', 13),
(800, 32, 'Chiquilistlán', 14),
(801, 32, 'Donato Guerra', 15),
(802, 32, 'Erongarícuaro', 16),
(803, 32, 'Zacualpan', 17),
(804, 32, 'Lampazos de Naranjo', 19),
(805, 32, 'Fresnillo de Trujano', 20),
(806, 32, 'Cohetzala', 21),
(807, 32, 'Santa María del Río', 24),
(808, 32, 'Huásabas', 26),
(809, 32, 'Reynosa', 28),
(810, 32, 'Tetlatlahuca', 29),
(811, 32, 'Catemaco', 30),
(812, 32, 'Espita', 31),
(813, 32, 'Morelos', 32),
(814, 33, 'San Pedro', 5),
(815, 33, 'Francisco León', 7),
(816, 33, 'Huejotitán', 8),
(817, 33, 'Súchil', 10),
(818, 33, 'San Luis de la Paz', 11),
(819, 33, 'Huamuxtitlán', 12),
(820, 33, 'Juárez Hidalgo', 13),
(821, 33, 'Degollado', 14),
(822, 33, 'Ecatepec de Morelos', 15),
(823, 33, 'Gabriel Zamora', 16),
(824, 33, 'Temoac', 17),
(825, 33, 'Linares', 19),
(826, 33, 'Guadalupe Etla', 20),
(827, 33, 'Cohuecan', 21),
(828, 33, 'Santo Domingo', 24),
(829, 33, 'Huatabampo', 26),
(830, 33, 'Río Bravo', 28),
(831, 33, 'Tlaxcala', 29),
(832, 33, 'Cazones de Herrera', 30),
(833, 33, 'Halachó', 31),
(834, 33, 'Moyahua de Estrada', 32),
(835, 34, 'Sierra Mojada', 5),
(836, 34, 'Frontera Comalapa', 7),
(837, 34, 'Ignacio Zaragoza', 8),
(838, 34, 'Tamazula', 10),
(839, 34, 'Santa Catarina', 11),
(840, 34, 'Huitzuco de los Figueroa', 12),
(841, 34, 'Lolotla', 13),
(842, 34, 'Ejutla', 14),
(843, 34, 'Ecatzingo', 15),
(844, 34, 'Hidalgo', 16),
(845, 34, 'Marín', 19),
(846, 34, 'Guadalupe de Ramírez', 20),
(847, 34, 'Coronango', 21),
(848, 34, 'San Vicente Tancuayalab', 24),
(849, 34, 'Huépac', 26),
(850, 34, 'San Carlos', 28),
(851, 34, 'Tlaxco', 29),
(852, 34, 'Cerro Azul', 30),
(853, 34, 'Hocabá', 31),
(854, 34, 'Nochistlán de Mejía', 32),
(855, 35, 'Torreón', 5),
(856, 35, 'Frontera Hidalgo', 7),
(857, 35, 'Janos', 8),
(858, 35, 'Tepehuanes', 10),
(859, 35, 'Santa Cruz de Juventino Rosas', 11),
(860, 35, 'Iguala de la Independencia', 12),
(861, 35, 'Metepec', 13),
(862, 35, 'Encarnación de Díaz', 14),
(863, 35, 'Huehuetoca', 15),
(864, 35, 'La Huacana', 16),
(865, 35, 'Melchor Ocampo', 19),
(866, 35, 'Guelatao de Juárez', 20),
(867, 35, 'Coxcatlán', 21),
(868, 35, 'Soledad de Graciano Sánchez', 24),
(869, 35, 'Imuris', 26),
(870, 35, 'San Fernando', 28),
(871, 35, 'Tocatlán', 29),
(872, 35, 'Citlaltépetl', 30),
(873, 35, 'Hoctún', 31),
(874, 35, 'Noria de Ángeles', 32),
(875, 36, 'Viesca', 5),
(876, 36, 'La Grandeza', 7),
(877, 36, 'Jiménez', 8),
(878, 36, 'Tlahualilo', 10),
(879, 36, 'Santiago Maravatío', 11),
(880, 36, 'Igualapa', 12),
(881, 36, 'San Agustín Metzquititlán', 13),
(882, 36, 'Etzatlán', 14),
(883, 36, 'Hueypoxtla', 15),
(884, 36, 'Huandacareo', 16),
(885, 36, 'Mier y Noriega', 19),
(886, 36, 'Guevea de Humboldt', 20),
(887, 36, 'Coyomeapan', 21),
(888, 36, 'Tamasopo', 24),
(889, 36, 'Magdalena', 26),
(890, 36, 'San Nicolás', 28),
(891, 36, 'Totolac', 29),
(892, 36, 'Coacoatzintla', 30),
(893, 36, 'Homún', 31),
(894, 36, 'Ojocaliente', 32),
(895, 37, 'Villa Unión', 5),
(896, 37, 'Huehuetán', 7),
(897, 37, 'Juárez', 8),
(898, 37, 'Topia', 10),
(899, 37, 'Silao de la Victoria', 11),
(900, 37, 'Ixcateopan de Cuauhtémoc', 12),
(901, 37, 'Metztitlán', 13),
(902, 37, 'El Grullo', 14),
(903, 37, 'Huixquilucan', 15),
(904, 37, 'Huaniqueo', 16),
(905, 37, 'Mina', 19),
(906, 37, 'Mesones Hidalgo', 20),
(907, 37, 'Coyotepec', 21),
(908, 37, 'Tamazunchale', 24),
(909, 37, 'Mazatán', 26),
(910, 37, 'Soto la Marina', 28),
(911, 37, 'Ziltlaltépec de Trinidad Sánchez Santos', 29),
(912, 37, 'Coahuitlán', 30),
(913, 37, 'Huhí', 31),
(914, 37, 'Pánuco', 32),
(915, 38, 'Zaragoza', 5),
(916, 38, 'Huixtán', 7),
(917, 38, 'Julimes', 8),
(918, 38, 'Vicente Guerrero', 10),
(919, 38, 'Tarandacuao', 11),
(920, 38, 'Zihuatanejo de Azueta', 12),
(921, 38, 'Mineral del Chico', 13),
(922, 38, 'Guachinango', 14),
(923, 38, 'Isidro Fabela', 15),
(924, 38, 'Huetamo', 16),
(925, 38, 'Montemorelos', 19),
(926, 38, 'Villa Hidalgo', 20),
(927, 38, 'Cuapiaxtla de Madero', 21),
(928, 38, 'Tampacán', 24),
(929, 38, 'Moctezuma', 26),
(930, 38, 'Tampico', 28),
(931, 38, 'Tzompantepec', 29),
(932, 38, 'Coatepec', 30),
(933, 38, 'Hunucmá', 31),
(934, 38, 'Pinos', 32),
(935, 39, 'Huitiupán', 7),
(936, 39, 'López', 8),
(937, 39, 'Nuevo Ideal', 10),
(938, 39, 'Tarimoro', 11),
(939, 39, 'Juan R. Escudero', 12),
(940, 39, 'Mineral del Monte', 13),
(941, 39, 'Guadalajara', 14),
(942, 39, 'Ixtapaluca', 15),
(943, 39, 'Huiramba', 16),
(944, 39, 'Monterrey', 19),
(945, 39, 'Heroica Ciudad de Huajuapan de León', 20),
(946, 39, 'Cuautempan', 21),
(947, 39, 'Tampamolón Corona', 24),
(948, 39, 'Naco', 26),
(949, 39, 'Tula', 28),
(950, 39, 'Xaloztoc', 29),
(951, 39, 'Coatzacoalcos', 30),
(952, 39, 'Ixil', 31),
(953, 39, 'Río Grande', 32),
(954, 40, 'Huixtla', 7),
(955, 40, 'Madera', 8),
(956, 40, 'Tierra Blanca', 11),
(957, 40, 'Leonardo Bravo', 12),
(958, 40, 'La Misión', 13),
(959, 40, 'Hostotipaquillo', 14),
(960, 40, 'Ixtapan de la Sal', 15),
(961, 40, 'Indaparapeo', 16),
(962, 40, 'Parás', 19),
(963, 40, 'Huautepec', 20),
(964, 40, 'Cuautinchán', 21),
(965, 40, 'Tamuín', 24),
(966, 40, 'Nácori Chico', 26),
(967, 40, 'Valle Hermoso', 28),
(968, 40, 'Xaltocan', 29),
(969, 40, 'Coatzintla', 30),
(970, 40, 'Izamal', 31),
(971, 40, 'Sain Alto', 32),
(972, 41, 'La Independencia', 7),
(973, 41, 'Maguarichi', 8),
(974, 41, 'Uriangato', 11),
(975, 41, 'Malinaltepec', 12),
(976, 41, 'Mixquiahuala de Juárez', 13),
(977, 41, 'Huejúcar', 14),
(978, 41, 'Ixtapan del Oro', 15),
(979, 41, 'Irimbo', 16),
(980, 41, 'Pesquería', 19),
(981, 41, 'Huautla de Jiménez', 20),
(982, 41, 'Cuautlancingo', 21),
(983, 41, 'Tanlajás', 24),
(984, 41, 'Nacozari de García', 26),
(985, 41, 'Victoria', 28),
(986, 41, 'Papalotla de Xicohténcatl', 29),
(987, 41, 'Coetzala', 30),
(988, 41, 'Kanasín', 31),
(989, 41, 'El Salvador', 32),
(990, 42, 'Ixhuatán', 7),
(991, 42, 'Manuel Benavides', 8),
(992, 42, 'Valle de Santiago', 11),
(993, 42, 'Mártir de Cuilapan', 12),
(994, 42, 'Molango de Escamilla', 13),
(995, 42, 'Huejuquilla el Alto', 14),
(996, 42, 'Ixtlahuaca', 15),
(997, 42, 'Ixtlán', 16),
(998, 42, 'Los Ramones', 19),
(999, 42, 'Ixtlán de Juárez', 20),
(1000, 42, 'Cuayuca de Andrade', 21),
(1001, 42, 'Tanquián de Escobedo', 24),
(1002, 42, 'Navojoa', 26),
(1003, 42, 'Villagrán', 28),
(1004, 42, 'Xicohtzinco', 29),
(1005, 42, 'Colipa', 30),
(1006, 42, 'Kantunil', 31),
(1007, 42, 'Sombrerete', 32),
(1008, 43, 'Ixtacomitán', 7),
(1009, 43, 'Matachí', 8),
(1010, 43, 'Victoria', 11),
(1011, 43, 'Metlatónoc', 12),
(1012, 43, 'Nicolás Flores', 13),
(1013, 43, 'La Huerta', 14),
(1014, 43, 'Xalatlaco', 15),
(1015, 43, 'Jacona', 16),
(1016, 43, 'Rayones', 19),
(1017, 43, 'Heroica Ciudad de Juchitán de Zaragoza', 20),
(1018, 43, 'Cuetzalan del Progreso', 21),
(1019, 43, 'Tierra Nueva', 24),
(1020, 43, 'Nogales', 26),
(1021, 43, 'Xicoténcatl', 28),
(1022, 43, 'Yauhquemehcan', 29),
(1023, 43, 'Comapa', 30),
(1024, 43, 'Kaua', 31),
(1025, 43, 'Susticacán', 32),
(1026, 44, 'Ixtapa', 7),
(1027, 44, 'Matamoros', 8),
(1028, 44, 'Villagrán', 11),
(1029, 44, 'Mochitlán', 12),
(1030, 44, 'Nopala de Villagrán', 13),
(1031, 44, 'Ixtlahuacán de los Membrillos', 14),
(1032, 44, 'Jaltenco', 15),
(1033, 44, 'Jiménez', 16),
(1034, 44, 'Sabinas Hidalgo', 19),
(1035, 44, 'Loma Bonita', 20),
(1036, 44, 'Cuyoaco', 21),
(1037, 44, 'Vanegas', 24),
(1038, 44, 'Onavas', 26),
(1039, 44, 'Zacatelco', 29),
(1040, 44, 'Córdoba', 30),
(1041, 44, 'Kinchil', 31),
(1042, 44, 'Tabasco', 32),
(1043, 45, 'Ixtapangajoya', 7),
(1044, 45, 'Meoqui', 8),
(1045, 45, 'Xichú', 11),
(1046, 45, 'Olinalá', 12),
(1047, 45, 'Omitlán de Juárez', 13),
(1048, 45, 'Ixtlahuacán del Río', 14),
(1049, 45, 'Jilotepec', 15),
(1050, 45, 'Jiquilpan', 16),
(1051, 45, 'Salinas Victoria', 19),
(1052, 45, 'Magdalena Apasco', 20),
(1053, 45, 'Chalchicomula de Sesma', 21),
(1054, 45, 'Venado', 24),
(1055, 45, 'Opodepe', 26),
(1056, 45, 'Benito Juárez', 29),
(1057, 45, 'Cosamaloapan de Carpio', 30),
(1058, 45, 'Kopomá', 31),
(1059, 45, 'Tepechitlán', 32),
(1060, 46, 'Jiquipilas', 7),
(1061, 46, 'Morelos', 8),
(1062, 46, 'Yuriria', 11),
(1063, 46, 'Ometepec', 12),
(1064, 46, 'San Felipe Orizatlán', 13),
(1065, 46, 'Jalostotitlán', 14),
(1066, 46, 'Jilotzingo', 15),
(1067, 46, 'Juárez', 16),
(1068, 46, 'San Nicolás de los Garza', 19),
(1069, 46, 'Magdalena Jaltepec', 20),
(1070, 46, 'Chapulco', 21),
(1071, 46, 'Villa de Arriaga', 24),
(1072, 46, 'Oquitoa', 26),
(1073, 46, 'Emiliano Zapata', 29),
(1074, 46, 'Cosautlán de Carvajal', 30),
(1075, 46, 'Mama', 31),
(1076, 46, 'Tepetongo', 32),
(1077, 47, 'Jitotol', 7),
(1078, 47, 'Moris', 8),
(1079, 47, 'Pedro Ascencio Alquisiras', 12),
(1080, 47, 'Pacula', 13),
(1081, 47, 'Jamay', 14),
(1082, 47, 'Jiquipilco', 15),
(1083, 47, 'Jungapeo', 16),
(1084, 47, 'Hidalgo', 19),
(1085, 47, 'Santa Magdalena Jicotlán', 20),
(1086, 47, 'Chiautla', 21),
(1087, 47, 'Villa de Guadalupe', 24),
(1088, 47, 'Pitiquito', 26),
(1089, 47, 'Lázaro Cárdenas', 29),
(1090, 47, 'Coscomatepec', 30),
(1091, 47, 'Maní', 31),
(1092, 47, 'Teúl de González Ortega', 32),
(1093, 48, 'Juárez', 7),
(1094, 48, 'Namiquipa', 8),
(1095, 48, 'Petatlán', 12),
(1096, 48, 'Pachuca de Soto', 13),
(1097, 48, 'Jesús María', 14),
(1098, 48, 'Jocotitlán', 15),
(1099, 48, 'Lagunillas', 16),
(1100, 48, 'Santa Catarina', 19),
(1101, 48, 'Magdalena Mixtepec', 20),
(1102, 48, 'Chiautzingo', 21),
(1103, 48, 'Villa de la Paz', 24),
(1104, 48, 'Puerto Peñasco', 26),
(1105, 48, 'La Magdalena Tlaltelulco', 29),
(1106, 48, 'Cosoleacaque', 30),
(1107, 48, 'Maxcanú', 31),
(1108, 48, 'Tlaltenango de Sánchez Román', 32),
(1109, 49, 'Larráinzar', 7),
(1110, 49, 'Nonoava', 8),
(1111, 49, 'Pilcaya', 12),
(1112, 49, 'Pisaflores', 13),
(1113, 49, 'Jilotlán de los Dolores', 14),
(1114, 49, 'Joquicingo', 15),
(1115, 49, 'Madero', 16),
(1116, 49, 'Santiago', 19),
(1117, 49, 'Magdalena Ocotlán', 20),
(1118, 49, 'Chiconcuautla', 21),
(1119, 49, 'Villa de Ramos', 24),
(1120, 49, 'Quiriego', 26),
(1121, 49, 'San Damián Texóloc', 29),
(1122, 49, 'Cotaxtla', 30),
(1123, 49, 'Mayapán', 31),
(1124, 49, 'Valparaíso', 32),
(1125, 50, 'La Libertad', 7),
(1126, 50, 'Nuevo Casas Grandes', 8),
(1127, 50, 'Pungarabato', 12),
(1128, 50, 'Progreso de Obregón', 13),
(1129, 50, 'Jocotepec', 14),
(1130, 50, 'Juchitepec', 15),
(1131, 50, 'Maravatío', 16),
(1132, 50, 'Vallecillo', 19),
(1133, 50, 'Magdalena Peñasco', 20),
(1134, 50, 'Chichiquila', 21),
(1135, 50, 'Villa de Reyes', 24),
(1136, 50, 'Rayón', 26),
(1137, 50, 'San Francisco Tetlanohcan', 29),
(1138, 50, 'Coxquihui', 30),
(1139, 50, 'Mérida', 31),
(1140, 50, 'Vetagrande', 32),
(1141, 51, 'Mapastepec', 7),
(1142, 51, 'Ocampo', 8),
(1143, 51, 'Quechultenango', 12),
(1144, 51, 'Mineral de la Reforma', 13),
(1145, 51, 'Juanacatlán', 14),
(1146, 51, 'Lerma', 15),
(1147, 51, 'Marcos Castellanos', 16),
(1148, 51, 'Villaldama', 19),
(1149, 51, 'Magdalena Teitipac', 20),
(1150, 51, 'Chietla', 21),
(1151, 51, 'Villa Hidalgo', 24),
(1152, 51, 'Rosario', 26),
(1153, 51, 'San Jerónimo Zacualpan', 29),
(1154, 51, 'Coyutla', 30),
(1155, 51, 'Mocochá', 31),
(1156, 51, 'Villa de Cos', 32),
(1157, 52, 'Las Margaritas', 7),
(1158, 52, 'Ojinaga', 8),
(1159, 52, 'San Luis Acatlán', 12),
(1160, 52, 'San Agustín Tlaxiaca', 13),
(1161, 52, 'Juchitlán', 14),
(1162, 52, 'Malinalco', 15),
(1163, 52, 'Lázaro Cárdenas', 16),
(1164, 52, 'Magdalena Tequisistlán', 20),
(1165, 52, 'Chigmecatitlán', 21),
(1166, 52, 'Villa Juárez', 24),
(1167, 52, 'Sahuaripa', 26),
(1168, 52, 'San José Teacalco', 29),
(1169, 52, 'Cuichapa', 30),
(1170, 52, 'Motul', 31),
(1171, 52, 'Villa García', 32),
(1172, 53, 'Mazapa de Madero', 7),
(1173, 53, 'Praxedis G. Guerrero', 8),
(1174, 53, 'San Marcos', 12),
(1175, 53, 'San Bartolo Tutotepec', 13),
(1176, 53, 'Lagos de Moreno', 14),
(1177, 53, 'Melchor Ocampo', 15),
(1178, 53, 'Morelia', 16),
(1179, 53, 'Magdalena Tlacotepec', 20),
(1180, 53, 'Chignahuapan', 21),
(1181, 53, 'Axtla de Terrazas', 24),
(1182, 53, 'San Felipe de Jesús', 26),
(1183, 53, 'San Juan Huactzinco', 29),
(1184, 53, 'Cuitláhuac', 30),
(1185, 53, 'Muna', 31),
(1186, 53, 'Villa González Ortega', 32),
(1187, 54, 'Mazatán', 7),
(1188, 54, 'Riva Palacio', 8),
(1189, 54, 'San Miguel Totolapan', 12),
(1190, 54, 'San Salvador', 13),
(1191, 54, 'El Limón', 14),
(1192, 54, 'Metepec', 15),
(1193, 54, 'Morelos', 16),
(1194, 54, 'Magdalena Zahuatlán', 20),
(1195, 54, 'Chignautla', 21),
(1196, 54, 'Xilitla', 24),
(1197, 54, 'San Javier', 26),
(1198, 54, 'San Lorenzo Axocomanitla', 29),
(1199, 54, 'Chacaltianguis', 30),
(1200, 54, 'Muxupip', 31),
(1201, 54, 'Villa Hidalgo', 32),
(1202, 55, 'Metapa', 7),
(1203, 55, 'Rosales', 8),
(1204, 55, 'Taxco de Alarcón', 12),
(1205, 55, 'Santiago de Anaya', 13),
(1206, 55, 'Magdalena', 14),
(1207, 55, 'Mexicaltzingo', 15),
(1208, 55, 'Múgica', 16),
(1209, 55, 'Mariscala de Juárez', 20),
(1210, 55, 'Chila', 21),
(1211, 55, 'Zaragoza', 24),
(1212, 55, 'San Luis Río Colorado', 26),
(1213, 55, 'San Lucas Tecopilco', 29),
(1214, 55, 'Chalma', 30),
(1215, 55, 'Opichén', 31),
(1216, 55, 'Villanueva', 32),
(1217, 56, 'Mitontic', 7),
(1218, 56, 'Rosario', 8),
(1219, 56, 'Tecoanapa', 12),
(1220, 56, 'Santiago Tulantepec de Lugo Guerrero', 13),
(1221, 56, 'Santa María del Oro', 14),
(1222, 56, 'Morelos', 15),
(1223, 56, 'Nahuatzen', 16),
(1224, 56, 'Mártires de Tacubaya', 20),
(1225, 56, 'Chila de la Sal', 21),
(1226, 56, 'Villa de Arista', 24),
(1227, 56, 'San Miguel de Horcasitas', 26),
(1228, 56, 'Santa Ana Nopalucan', 29),
(1229, 56, 'Chiconamel', 30),
(1230, 56, 'Oxkutzcab', 31),
(1231, 56, 'Zacatecas', 32),
(1232, 57, 'Motozintla', 7),
(1233, 57, 'San Francisco de Borja', 8),
(1234, 57, 'Técpan de Galeana', 12),
(1235, 57, 'Singuilucan', 13),
(1236, 57, 'La Manzanilla de la Paz', 14),
(1237, 57, 'Naucalpan de Juárez', 15),
(1238, 57, 'Nocupétaro', 16),
(1239, 57, 'Matías Romero Avendaño', 20),
(1240, 57, 'Honey', 21),
(1241, 57, 'Matlapa', 24),
(1242, 57, 'San Pedro de la Cueva', 26),
(1243, 57, 'Santa Apolonia Teacalco', 29),
(1244, 57, 'Chiconquiaco', 30),
(1245, 57, 'Panabá', 31),
(1246, 57, 'Trancoso', 32),
(1247, 58, 'Nicolás Ruíz', 7),
(1248, 58, 'San Francisco de Conchos', 8),
(1249, 58, 'Teloloapan', 12),
(1250, 58, 'Tasquillo', 13),
(1251, 58, 'Mascota', 14),
(1252, 58, 'Nezahualcóyotl', 15),
(1253, 58, 'Nuevo Parangaricutiro', 16),
(1254, 58, 'Mazatlán Villa de Flores', 20),
(1255, 58, 'Chilchotla', 21),
(1256, 58, 'El Naranjo', 24),
(1257, 58, 'Santa Ana', 26),
(1258, 58, 'Santa Catarina Ayometla', 29),
(1259, 58, 'Chicontepec', 30),
(1260, 58, 'Peto', 31),
(1261, 58, 'Santa María de la Paz', 32),
(1262, 59, 'Ocosingo', 7),
(1263, 59, 'San Francisco del Oro', 8),
(1264, 59, 'Tepecoacuilco de Trujano', 12),
(1265, 59, 'Tecozautla', 13),
(1266, 59, 'Mazamitla', 14),
(1267, 59, 'Nextlalpan', 15),
(1268, 59, 'Nuevo Urecho', 16),
(1269, 59, 'Miahuatlán de Porfirio Díaz', 20),
(1270, 59, 'Chinantla', 21),
(1271, 59, 'Santa Cruz', 26),
(1272, 59, 'Santa Cruz Quilehtla', 29),
(1273, 59, 'Chinameca', 30),
(1274, 59, 'Progreso', 31),
(1275, 60, 'Ocotepec', 7),
(1276, 60, 'Santa Bárbara', 8),
(1277, 60, 'Tetipac', 12),
(1278, 60, 'Tenango de Doria', 13),
(1279, 60, 'Mexticacán', 14),
(1280, 60, 'Nicolás Romero', 15),
(1281, 60, 'Numarán', 16),
(1282, 60, 'Mixistlán de la Reforma', 20),
(1283, 60, 'Domingo Arenas', 21),
(1284, 60, 'Sáric', 26),
(1285, 60, 'Santa Isabel Xiloxoxtla', 29),
(1286, 60, 'Chinampa de Gorostiza', 30),
(1287, 60, 'Quintana Roo', 31),
(1288, 61, 'Ocozocoautla de Espinosa', 7),
(1289, 61, 'Satevó', 8),
(1290, 61, 'Tixtla de Guerrero', 12),
(1291, 61, 'Tepeapulco', 13),
(1292, 61, 'Mezquitic', 14),
(1293, 61, 'Nopaltepec', 15),
(1294, 61, 'Ocampo', 16),
(1295, 61, 'Monjas', 20),
(1296, 61, 'Eloxochitlán', 21),
(1297, 61, 'Soyopa', 26),
(1298, 61, 'Las Choapas', 30),
(1299, 61, 'Río Lagartos', 31),
(1300, 62, 'Ostuacán', 7),
(1301, 62, 'Saucillo', 8),
(1302, 62, 'Tlacoachistlahuaca', 12),
(1303, 62, 'Tepehuacán de Guerrero', 13),
(1304, 62, 'Mixtlán', 14),
(1305, 62, 'Ocoyoacac', 15),
(1306, 62, 'Pajacuarán', 16),
(1307, 62, 'Natividad', 20),
(1308, 62, 'Epatlán', 21),
(1309, 62, 'Suaqui Grande', 26),
(1310, 62, 'Chocamán', 30),
(1311, 62, 'Sacalum', 31),
(1312, 63, 'Osumacinta', 7),
(1313, 63, 'Temósachic', 8),
(1314, 63, 'Tlacoapa', 12),
(1315, 63, 'Tepeji del Río de Ocampo', 13),
(1316, 63, 'Ocotlán', 14),
(1317, 63, 'Ocuilan', 15),
(1318, 63, 'Panindícuaro', 16),
(1319, 63, 'Nazareno Etla', 20),
(1320, 63, 'Esperanza', 21),
(1321, 63, 'Tepache', 26),
(1322, 63, 'Chontla', 30),
(1323, 63, 'Samahil', 31),
(1324, 64, 'Oxchuc', 7),
(1325, 64, 'El Tule', 8),
(1326, 64, 'Tlalchapa', 12),
(1327, 64, 'Tepetitlán', 13),
(1328, 64, 'Ojuelos de Jalisco', 14),
(1329, 64, 'El Oro', 15),
(1330, 64, 'Parácuaro', 16),
(1331, 64, 'Nejapa de Madero', 20),
(1332, 64, 'Francisco Z. Mena', 21),
(1333, 64, 'Trincheras', 26),
(1334, 64, 'Chumatlán', 30),
(1335, 64, 'Sanahcat', 31),
(1336, 65, 'Palenque', 7),
(1337, 65, 'Urique', 8),
(1338, 65, 'Tlalixtaquilla de Maldonado', 12),
(1339, 65, 'Tetepango', 13),
(1340, 65, 'Pihuamo', 14),
(1341, 65, 'Otumba', 15),
(1342, 65, 'Paracho', 16),
(1343, 65, 'Ixpantepec Nieves', 20),
(1344, 65, 'General Felipe Ángeles', 21),
(1345, 65, 'Tubutama', 26),
(1346, 65, 'Emiliano Zapata', 30),
(1347, 65, 'San Felipe', 31),
(1348, 66, 'Pantelhó', 7),
(1349, 66, 'Uruachi', 8),
(1350, 66, 'Tlapa de Comonfort', 12),
(1351, 66, 'Villa de Tezontepec', 13),
(1352, 66, 'Poncitlán', 14),
(1353, 66, 'Otzoloapan', 15),
(1354, 66, 'Pátzcuaro', 16),
(1355, 66, 'Santiago Niltepec', 20),
(1356, 66, 'Guadalupe', 21),
(1357, 66, 'Ures', 26),
(1358, 66, 'Espinal', 30),
(1359, 66, 'Santa Elena', 31),
(1360, 67, 'Pantepec', 7),
(1361, 67, 'Valle de Zaragoza', 8),
(1362, 67, 'Tlapehuala', 12),
(1363, 67, 'Tezontepec de Aldama', 13),
(1364, 67, 'Puerto Vallarta', 14),
(1365, 67, 'Otzolotepec', 15),
(1366, 67, 'Penjamillo', 16),
(1367, 67, 'Oaxaca de Juárez', 20),
(1368, 67, 'Guadalupe Victoria', 21),
(1369, 67, 'Villa Hidalgo', 26),
(1370, 67, 'Filomeno Mata', 30),
(1371, 67, 'Seyé', 31),
(1372, 68, 'Pichucalco', 7),
(1373, 68, 'La Unión de Isidoro Montes de Oca', 12),
(1374, 68, 'Tianguistengo', 13),
(1375, 68, 'Villa Purificación', 14),
(1376, 68, 'Ozumba', 15),
(1377, 68, 'Peribán', 16),
(1378, 68, 'Ocotlán de Morelos', 20),
(1379, 68, 'Hermenegildo Galeana', 21),
(1380, 68, 'Villa Pesqueira', 26),
(1381, 68, 'Fortín', 30),
(1382, 68, 'Sinanché', 31),
(1383, 69, 'Pijijiapan', 7),
(1384, 69, 'Xalpatláhuac', 12),
(1385, 69, 'Tizayuca', 13),
(1386, 69, 'Quitupan', 14),
(1387, 69, 'Papalotla', 15),
(1388, 69, 'La Piedad', 16),
(1389, 69, 'La Pe', 20),
(1390, 69, 'Huaquechula', 21),
(1391, 69, 'Yécora', 26),
(1392, 69, 'Gutiérrez Zamora', 30),
(1393, 69, 'Sotuta', 31),
(1394, 70, 'El Porvenir', 7),
(1395, 70, 'Xochihuehuetlán', 12),
(1396, 70, 'Tlahuelilpan', 13),
(1397, 70, 'El Salto', 14),
(1398, 70, 'La Paz', 15),
(1399, 70, 'Purépero', 16),
(1400, 70, 'Pinotepa de Don Luis', 20),
(1401, 70, 'Huatlatlauca', 21),
(1402, 70, 'General Plutarco Elías Calles', 26),
(1403, 70, 'Hidalgotitlán', 30),
(1404, 70, 'Sucilá', 31),
(1405, 71, 'Villa Comaltitlán', 7),
(1406, 71, 'Xochistlahuaca', 12),
(1407, 71, 'Tlahuiltepa', 13),
(1408, 71, 'San Cristóbal de la Barranca', 14),
(1409, 71, 'Polotitlán', 15),
(1410, 71, 'Puruándiro', 16),
(1411, 71, 'Pluma Hidalgo', 20),
(1412, 71, 'Huauchinango', 21),
(1413, 71, 'Benito Juárez', 26),
(1414, 71, 'Huatusco', 30),
(1415, 71, 'Sudzal', 31),
(1416, 72, 'Pueblo Nuevo Solistahuacán', 7),
(1417, 72, 'Zapotitlán Tablas', 12),
(1418, 72, 'Tlanalapa', 13),
(1419, 72, 'San Diego de Alejandría', 14),
(1420, 72, 'Rayón', 15),
(1421, 72, 'Queréndaro', 16),
(1422, 72, 'San José del Progreso', 20),
(1423, 72, 'Huehuetla', 21),
(1424, 72, 'San Ignacio Río Muerto', 26),
(1425, 72, 'Huayacocotla', 30),
(1426, 72, 'Suma', 31),
(1427, 73, 'Rayón', 7),
(1428, 73, 'Zirándaro', 12),
(1429, 73, 'Tlanchinol', 13),
(1430, 73, 'San Juan de los Lagos', 14),
(1431, 73, 'San Antonio la Isla', 15),
(1432, 73, 'Quiroga', 16),
(1433, 73, 'Putla Villa de Guerrero', 20),
(1434, 73, 'Huehuetlán el Chico', 21),
(1435, 73, 'Hueyapan de Ocampo', 30),
(1436, 73, 'Tahdziú', 31),
(1437, 74, 'Reforma', 7),
(1438, 74, 'Zitlala', 12),
(1439, 74, 'Tlaxcoapan', 13),
(1440, 74, 'San Julián', 14),
(1441, 74, 'San Felipe del Progreso', 15),
(1442, 74, 'Cojumatlán de Régules', 16),
(1443, 74, 'Santa Catarina Quioquitani', 20),
(1444, 74, 'Huejotzingo', 21),
(1445, 74, 'Huiloapan de Cuauhtémoc', 30),
(1446, 74, 'Tahmek', 31),
(1447, 75, 'Las Rosas', 7),
(1448, 75, 'Eduardo Neri', 12),
(1449, 75, 'Tolcayuca', 13),
(1450, 75, 'San Marcos', 14),
(1451, 75, 'San Martín de las Pirámides', 15),
(1452, 75, 'Los Reyes', 16),
(1453, 75, 'Reforma de Pineda', 20),
(1454, 75, 'Hueyapan', 21),
(1455, 75, 'Ignacio de la Llave', 30),
(1456, 75, 'Teabo', 31),
(1457, 76, 'Sabanilla', 7),
(1458, 76, 'Acatepec', 12),
(1459, 76, 'Tula de Allende', 13),
(1460, 76, 'San Martín de Bolaños', 14),
(1461, 76, 'San Mateo Atenco', 15),
(1462, 76, 'Sahuayo', 16),
(1463, 76, 'La Reforma', 20),
(1464, 76, 'Hueytamalco', 21),
(1465, 76, 'Ilamatlán', 30),
(1466, 76, 'Tecoh', 31),
(1467, 77, 'Salto de Agua', 7),
(1468, 77, 'Marquelia', 12),
(1469, 77, 'Tulancingo de Bravo', 13),
(1470, 77, 'San Martín Hidalgo', 14),
(1471, 77, 'San Simón de Guerrero', 15),
(1472, 77, 'San Lucas', 16),
(1473, 77, 'Reyes Etla', 20),
(1474, 77, 'Hueytlalpan', 21),
(1475, 77, 'Isla', 30),
(1476, 77, 'Tekal de Venegas', 31),
(1477, 78, 'San Cristóbal de las Casas', 7),
(1478, 78, 'Cochoapa el Grande', 12),
(1479, 78, 'Xochiatipan', 13),
(1480, 78, 'San Miguel el Alto', 14),
(1481, 78, 'Santo Tomás', 15),
(1482, 78, 'Santa Ana Maya', 16),
(1483, 78, 'Rojas de Cuauhtémoc', 20),
(1484, 78, 'Huitzilan de Serdán', 21),
(1485, 78, 'Ixcatepec', 30),
(1486, 78, 'Tekantó', 31),
(1487, 79, 'San Fernando', 7),
(1488, 79, 'José Joaquín de Herrera', 12),
(1489, 79, 'Xochicoatlán', 13),
(1490, 79, 'Gómez Farías', 14),
(1491, 79, 'Soyaniquilpan de Juárez', 15),
(1492, 79, 'Salvador Escalante', 16),
(1493, 79, 'Salina Cruz', 20),
(1494, 79, 'Huitziltepec', 21),
(1495, 79, 'Ixhuacán de los Reyes', 30),
(1496, 79, 'Tekax', 31),
(1497, 80, 'Siltepec', 7),
(1498, 80, 'Juchitán', 12),
(1499, 80, 'Yahualica', 13),
(1500, 80, 'San Sebastián del Oeste', 14),
(1501, 80, 'Sultepec', 15),
(1502, 80, 'Senguio', 16),
(1503, 80, 'San Agustín Amatengo', 20),
(1504, 80, 'Atlequizayan', 21),
(1505, 80, 'Ixhuatlán del Café', 30),
(1506, 80, 'Tekit', 31),
(1507, 81, 'Simojovel', 7),
(1508, 81, 'Iliatenco', 12),
(1509, 81, 'Zacualtipán de Ángeles', 13),
(1510, 81, 'Santa María de los Ángeles', 14),
(1511, 81, 'Tecámac', 15),
(1512, 81, 'Susupuato', 16),
(1513, 81, 'San Agustín Atenango', 20),
(1514, 81, 'Ixcamilpa de Guerrero', 21),
(1515, 81, 'Ixhuatlancillo', 30),
(1516, 81, 'Tekom', 31),
(1517, 82, 'Sitalá', 7),
(1518, 82, 'Zapotlán de Juárez', 13),
(1519, 82, 'Sayula', 14),
(1520, 82, 'Tejupilco', 15),
(1521, 82, 'Tacámbaro', 16),
(1522, 82, 'San Agustín Chayuco', 20),
(1523, 82, 'Ixcaquixtla', 21),
(1524, 82, 'Ixhuatlán del Sureste', 30),
(1525, 82, 'Telchac Pueblo', 31),
(1526, 83, 'Socoltenango', 7),
(1527, 83, 'Zempoala', 13),
(1528, 83, 'Tala', 14),
(1529, 83, 'Temamatla', 15),
(1530, 83, 'Tancítaro', 16),
(1531, 83, 'San Agustín de las Juntas', 20),
(1532, 83, 'Ixtacamaxtitlán', 21),
(1533, 83, 'Ixhuatlán de Madero', 30),
(1534, 83, 'Telchac Puerto', 31),
(1535, 84, 'Solosuchiapa', 7),
(1536, 84, 'Zimapán', 13),
(1537, 84, 'Talpa de Allende', 14),
(1538, 84, 'Temascalapa', 15),
(1539, 84, 'Tangamandapio', 16),
(1540, 84, 'San Agustín Etla', 20),
(1541, 84, 'Ixtepec', 21),
(1542, 84, 'Ixmatlahuacan', 30),
(1543, 84, 'Temax', 31),
(1544, 85, 'Soyaló', 7),
(1545, 85, 'Tamazula de Gordiano', 14),
(1546, 85, 'Temascalcingo', 15),
(1547, 85, 'Tangancícuaro', 16),
(1548, 85, 'San Agustín Loxicha', 20),
(1549, 85, 'Izúcar de Matamoros', 21),
(1550, 85, 'Ixtaczoquitlán', 30),
(1551, 85, 'Temozón', 31),
(1552, 86, 'Suchiapa', 7),
(1553, 86, 'Tapalpa', 14),
(1554, 86, 'Temascaltepec', 15),
(1555, 86, 'Tanhuato', 16),
(1556, 86, 'San Agustín Tlacotepec', 20),
(1557, 86, 'Jalpan', 21),
(1558, 86, 'Jalacingo', 30),
(1559, 86, 'Tepakán', 31),
(1560, 87, 'Suchiate', 7),
(1561, 87, 'Tecalitlán', 14),
(1562, 87, 'Temoaya', 15),
(1563, 87, 'Taretan', 16),
(1564, 87, 'San Agustín Yatareni', 20),
(1565, 87, 'Jolalpan', 21),
(1566, 87, 'Xalapa', 30),
(1567, 87, 'Tetiz', 31),
(1568, 88, 'Sunuapa', 7),
(1569, 88, 'Tecolotlán', 14),
(1570, 88, 'Tenancingo', 15),
(1571, 88, 'Tarímbaro', 16),
(1572, 88, 'San Andrés Cabecera Nueva', 20),
(1573, 88, 'Jonotla', 21),
(1574, 88, 'Jalcomulco', 30),
(1575, 88, 'Teya', 31),
(1576, 89, 'Tapachula', 7),
(1577, 89, 'Techaluta de Montenegro', 14),
(1578, 89, 'Tenango del Aire', 15),
(1579, 89, 'Tepalcatepec', 16),
(1580, 89, 'San Andrés Dinicuiti', 20),
(1581, 89, 'Jopala', 21),
(1582, 89, 'Jáltipan', 30),
(1583, 89, 'Ticul', 31),
(1584, 90, 'Tapalapa', 7),
(1585, 90, 'Tenamaxtlán', 14),
(1586, 90, 'Tenango del Valle', 15),
(1587, 90, 'Tingambato', 16),
(1588, 90, 'San Andrés Huaxpaltepec', 20),
(1589, 90, 'Juan C. Bonilla', 21),
(1590, 90, 'Jamapa', 30),
(1591, 90, 'Timucuy', 31),
(1592, 91, 'Tapilula', 7),
(1593, 91, 'Teocaltiche', 14),
(1594, 91, 'Teoloyucan', 15),
(1595, 91, 'Tingüindín', 16),
(1596, 91, 'San Andrés Huayápam', 20),
(1597, 91, 'Juan Galindo', 21),
(1598, 91, 'Jesús Carranza', 30),
(1599, 91, 'Tinum', 31),
(1600, 92, 'Tecpatán', 7),
(1601, 92, 'Teocuitatlán de Corona', 14),
(1602, 92, 'Teotihuacán', 15),
(1603, 92, 'Tiquicheo de Nicolás Romero', 16),
(1604, 92, 'San Andrés Ixtlahuaca', 20),
(1605, 92, 'Juan N. Méndez', 21),
(1606, 92, 'Xico', 30),
(1607, 92, 'Tixcacalcupul', 31),
(1608, 93, 'Tenejapa', 7),
(1609, 93, 'Tepatitlán de Morelos', 14),
(1610, 93, 'Tepetlaoxtoc', 15),
(1611, 93, 'Tlalpujahua', 16),
(1612, 93, 'San Andrés Lagunas', 20),
(1613, 93, 'Lafragua', 21),
(1614, 93, 'Jilotepec', 30),
(1615, 93, 'Tixkokob', 31),
(1616, 94, 'Teopisca', 7),
(1617, 94, 'Tequila', 14),
(1618, 94, 'Tepetlixpa', 15),
(1619, 94, 'Tlazazalca', 16),
(1620, 94, 'San Andrés Nuxiño', 20),
(1621, 94, 'Libres', 21),
(1622, 94, 'Juan Rodríguez Clara', 30),
(1623, 94, 'Tixmehuac', 31),
(1624, 95, 'Teuchitlán', 14),
(1625, 95, 'Tepotzotlán', 15),
(1626, 95, 'Tocumbo', 16),
(1627, 95, 'San Andrés Paxtlán', 20),
(1628, 95, 'La Magdalena Tlatlauquitepec', 21),
(1629, 95, 'Juchique de Ferrer', 30),
(1630, 95, 'Tixpéhual', 31),
(1631, 96, 'Tila', 7),
(1632, 96, 'Tizapán el Alto', 14),
(1633, 96, 'Tequixquiac', 15),
(1634, 96, 'Tumbiscatío', 16),
(1635, 96, 'San Andrés Sinaxtla', 20),
(1636, 96, 'Mazapiltepec de Juárez', 21),
(1637, 96, 'Landero y Coss', 30),
(1638, 96, 'Tizimín', 31),
(1639, 97, 'Tonalá', 7),
(1640, 97, 'Tlajomulco de Zúñiga', 14),
(1641, 97, 'Texcaltitlán', 15),
(1642, 97, 'Turicato', 16),
(1643, 97, 'San Andrés Solaga', 20),
(1644, 97, 'Mixtla', 21),
(1645, 97, 'Lerdo de Tejada', 30),
(1646, 97, 'Tunkás', 31),
(1647, 98, 'Totolapa', 7),
(1648, 98, 'San Pedro Tlaquepaque', 14),
(1649, 98, 'Texcalyacac', 15),
(1650, 98, 'Tuxpan', 16),
(1651, 98, 'San Andrés Teotilálpam', 20),
(1652, 98, 'Molcaxac', 21),
(1653, 98, 'Magdalena', 30),
(1654, 98, 'Tzucacab', 31),
(1655, 99, 'La Trinitaria', 7),
(1656, 99, 'Tolimán', 14),
(1657, 99, 'Texcoco', 15),
(1658, 99, 'Tuzantla', 16),
(1659, 99, 'San Andrés Tepetlapa', 20),
(1660, 99, 'Cañada Morelos', 21),
(1661, 99, 'Maltrata', 30),
(1662, 99, 'Uayma', 31),
(1663, 100, 'Tumbalá', 7),
(1664, 100, 'Tomatlán', 14),
(1665, 100, 'Tezoyuca', 15),
(1666, 100, 'Tzintzuntzan', 16),
(1667, 100, 'San Andrés Yaá', 20),
(1668, 100, 'Naupan', 21),
(1669, 100, 'Manlio Fabio Altamirano', 30),
(1670, 100, 'Ucú', 31),
(1671, 101, 'Tuxtla Gutiérrez', 7),
(1672, 101, 'Tonalá', 14),
(1673, 101, 'Tianguistenco', 15),
(1674, 101, 'Tzitzio', 16),
(1675, 101, 'San Andrés Zabache', 20),
(1676, 101, 'Nauzontla', 21),
(1677, 101, 'Mariano Escobedo', 30),
(1678, 101, 'Umán', 31),
(1679, 102, 'Tuxtla Chico', 7),
(1680, 102, 'Tonaya', 14),
(1681, 102, 'Timilpan', 15),
(1682, 102, 'Uruapan', 16),
(1683, 102, 'San Andrés Zautla', 20),
(1684, 102, 'Nealtican', 21),
(1685, 102, 'Martínez de la Torre', 30),
(1686, 102, 'Valladolid', 31),
(1687, 103, 'Tuzantán', 7),
(1688, 103, 'Tonila', 14),
(1689, 103, 'Tlalmanalco', 15),
(1690, 103, 'Venustiano Carranza', 16),
(1691, 103, 'San Antonino Castillo Velasco', 20),
(1692, 103, 'Nicolás Bravo', 21),
(1693, 103, 'Mecatlán', 30),
(1694, 103, 'Xocchel', 31),
(1695, 104, 'Tzimol', 7),
(1696, 104, 'Totatiche', 14),
(1697, 104, 'Tlalnepantla de Baz', 15),
(1698, 104, 'Villamar', 16),
(1699, 104, 'San Antonino el Alto', 20),
(1700, 104, 'Nopalucan', 21),
(1701, 104, 'Mecayapan', 30),
(1702, 104, 'Yaxcabá', 31),
(1703, 105, 'Unión Juárez', 7),
(1704, 105, 'Tototlán', 14),
(1705, 105, 'Tlatlaya', 15),
(1706, 105, 'Vista Hermosa', 16),
(1707, 105, 'San Antonino Monte Verde', 20),
(1708, 105, 'Ocotepec', 21),
(1709, 105, 'Medellín', 30),
(1710, 105, 'Yaxkukul', 31),
(1711, 106, 'Venustiano Carranza', 7),
(1712, 106, 'Tuxcacuesco', 14),
(1713, 106, 'Toluca', 15),
(1714, 106, 'Yurécuaro', 16),
(1715, 106, 'San Antonio Acutla', 20),
(1716, 106, 'Ocoyucan', 21),
(1717, 106, 'Miahuatlán', 30),
(1718, 106, 'Yobaín', 31),
(1719, 107, 'Villa Corzo', 7),
(1720, 107, 'Tuxcueca', 14),
(1721, 107, 'Tonatico', 15),
(1722, 107, 'Zacapu', 16),
(1723, 107, 'San Antonio de la Cal', 20),
(1724, 107, 'Olintla', 21),
(1725, 107, 'Las Minas', 30),
(1726, 108, 'Villaflores', 7),
(1727, 108, 'Tuxpan', 14),
(1728, 108, 'Tultepec', 15),
(1729, 108, 'Zamora', 16),
(1730, 108, 'San Antonio Huitepec', 20),
(1731, 108, 'Oriental', 21),
(1732, 108, 'Minatitlán', 30),
(1733, 109, 'Yajalón', 7),
(1734, 109, 'Unión de San Antonio', 14),
(1735, 109, 'Tultitlán', 15),
(1736, 109, 'Zináparo', 16);
INSERT INTO `catmunicipios` (`id`, `noMun`, `nomMunicipio`, `id_edo`) VALUES
(1737, 109, 'San Antonio Nanahuatípam', 20),
(1738, 109, 'Pahuatlán', 21),
(1739, 109, 'Misantla', 30),
(1740, 110, 'San Lucas', 7),
(1741, 110, 'Unión de Tula', 14),
(1742, 110, 'Valle de Bravo', 15),
(1743, 110, 'Zinapécuaro', 16),
(1744, 110, 'San Antonio Sinicahua', 20),
(1745, 110, 'Palmar de Bravo', 21),
(1746, 110, 'Mixtla de Altamirano', 30),
(1747, 111, 'Zinacantán', 7),
(1748, 111, 'Valle de Guadalupe', 14),
(1749, 111, 'Villa de Allende', 15),
(1750, 111, 'Ziracuaretiro', 16),
(1751, 111, 'San Antonio Tepetlapa', 20),
(1752, 111, 'Pantepec', 21),
(1753, 111, 'Moloacán', 30),
(1754, 112, 'San Juan Cancuc', 7),
(1755, 112, 'Valle de Juárez', 14),
(1756, 112, 'Villa del Carbón', 15),
(1757, 112, 'Zitácuaro', 16),
(1758, 112, 'San Baltazar Chichicápam', 20),
(1759, 112, 'Petlalcingo', 21),
(1760, 112, 'Naolinco', 30),
(1761, 113, 'Aldama', 7),
(1762, 113, 'San Gabriel', 14),
(1763, 113, 'Villa Guerrero', 15),
(1764, 113, 'José Sixto Verduzco', 16),
(1765, 113, 'San Baltazar Loxicha', 20),
(1766, 113, 'Piaxtla', 21),
(1767, 113, 'Naranjal', 30),
(1768, 114, 'Benemérito de las Américas', 7),
(1769, 114, 'Villa Corona', 14),
(1770, 114, 'Villa Victoria', 15),
(1771, 114, 'San Baltazar Yatzachi el Bajo', 20),
(1772, 114, 'Puebla', 21),
(1773, 114, 'Nautla', 30),
(1774, 115, 'Maravilla Tenejapa', 7),
(1775, 115, 'Villa Guerrero', 14),
(1776, 115, 'Xonacatlán', 15),
(1777, 115, 'San Bartolo Coyotepec', 20),
(1778, 115, 'Quecholac', 21),
(1779, 115, 'Nogales', 30),
(1780, 116, 'Marqués de Comillas', 7),
(1781, 116, 'Villa Hidalgo', 14),
(1782, 116, 'Zacazonapan', 15),
(1783, 116, 'San Bartolomé Ayautla', 20),
(1784, 116, 'Quimixtlán', 21),
(1785, 116, 'Oluta', 30),
(1786, 117, 'Montecristo de Guerrero', 7),
(1787, 117, 'Cañadas de Obregón', 14),
(1788, 117, 'Zacualpan', 15),
(1789, 117, 'San Bartolomé Loxicha', 20),
(1790, 117, 'Rafael Lara Grajales', 21),
(1791, 117, 'Omealca', 30),
(1792, 118, 'San Andrés Duraznal', 7),
(1793, 118, 'Yahualica de González Gallo', 14),
(1794, 118, 'Zinacantepec', 15),
(1795, 118, 'San Bartolomé Quialana', 20),
(1796, 118, 'Los Reyes de Juárez', 21),
(1797, 118, 'Orizaba', 30),
(1798, 119, 'Santiago el Pinar', 7),
(1799, 119, 'Zacoalco de Torres', 14),
(1800, 119, 'Zumpahuacán', 15),
(1801, 119, 'San Bartolomé Yucuañe', 20),
(1802, 119, 'San Andrés Cholula', 21),
(1803, 119, 'Otatitlán', 30),
(1804, 120, 'Zapopan', 14),
(1805, 120, 'Zumpango', 15),
(1806, 120, 'San Bartolomé Zoogocho', 20),
(1807, 120, 'San Antonio Cañada', 21),
(1808, 120, 'Oteapan', 30),
(1809, 121, 'Zapotiltic', 14),
(1810, 121, 'Cuautitlán Izcalli', 15),
(1811, 121, 'San Bartolo Soyaltepec', 20),
(1812, 121, 'San Diego la Mesa Tochimiltzingo', 21),
(1813, 121, 'Ozuluama de Mascareñas', 30),
(1814, 122, 'Zapotitlán de Vadillo', 14),
(1815, 122, 'Valle de Chalco Solidaridad', 15),
(1816, 122, 'San Bartolo Yautepec', 20),
(1817, 122, 'San Felipe Teotlalcingo', 21),
(1818, 122, 'Pajapan', 30),
(1819, 123, 'Zapotlán del Rey', 14),
(1820, 123, 'Luvianos', 15),
(1821, 123, 'San Bernardo Mixtepec', 20),
(1822, 123, 'San Felipe Tepatlán', 21),
(1823, 123, 'Pánuco', 30),
(1824, 124, 'Zapotlanejo', 14),
(1825, 124, 'San José del Rincón', 15),
(1826, 124, 'San Blas Atempa', 20),
(1827, 124, 'San Gabriel Chilac', 21),
(1828, 124, 'Papantla', 30),
(1829, 125, 'San Ignacio Cerro Gordo', 14),
(1830, 125, 'Tonanitla', 15),
(1831, 125, 'San Carlos Yautepec', 20),
(1832, 125, 'San Gregorio Atzompa', 21),
(1833, 125, 'Paso del Macho', 30),
(1834, 126, 'San Cristóbal Amatlán', 20),
(1835, 126, 'San Jerónimo Tecuanipan', 21),
(1836, 126, 'Paso de Ovejas', 30),
(1837, 127, 'San Cristóbal Amoltepec', 20),
(1838, 127, 'San Jerónimo Xayacatlán', 21),
(1839, 127, 'La Perla', 30),
(1840, 128, 'San Cristóbal Lachirioag', 20),
(1841, 128, 'San José Chiapa', 21),
(1842, 128, 'Perote', 30),
(1843, 129, 'San Cristóbal Suchixtlahuaca', 20),
(1844, 129, 'San José Miahuatlán', 21),
(1845, 129, 'Platón Sánchez', 30),
(1846, 130, 'San Dionisio del Mar', 20),
(1847, 130, 'San Juan Atenco', 21),
(1848, 130, 'Playa Vicente', 30),
(1849, 131, 'San Dionisio Ocotepec', 20),
(1850, 131, 'San Juan Atzompa', 21),
(1851, 131, 'Poza Rica de Hidalgo', 30),
(1852, 132, 'San Dionisio Ocotlán', 20),
(1853, 132, 'San Martín Texmelucan', 21),
(1854, 132, 'Las Vigas de Ramírez', 30),
(1855, 133, 'San Esteban Atatlahuca', 20),
(1856, 133, 'San Martín Totoltepec', 21),
(1857, 133, 'Pueblo Viejo', 30),
(1858, 134, 'San Felipe Jalapa de Díaz', 20),
(1859, 134, 'San Matías Tlalancaleca', 21),
(1860, 134, 'Puente Nacional', 30),
(1861, 135, 'San Felipe Tejalápam', 20),
(1862, 135, 'San Miguel Ixitlán', 21),
(1863, 135, 'Rafael Delgado', 30),
(1864, 136, 'San Felipe Usila', 20),
(1865, 136, 'San Miguel Xoxtla', 21),
(1866, 136, 'Rafael Lucio', 30),
(1867, 137, 'San Francisco Cahuacuá', 20),
(1868, 137, 'San Nicolás Buenos Aires', 21),
(1869, 137, 'Los Reyes', 30),
(1870, 138, 'San Francisco Cajonos', 20),
(1871, 138, 'San Nicolás de los Ranchos', 21),
(1872, 138, 'Río Blanco', 30),
(1873, 139, 'San Francisco Chapulapa', 20),
(1874, 139, 'San Pablo Anicano', 21),
(1875, 139, 'Saltabarranca', 30),
(1876, 140, 'San Francisco Chindúa', 20),
(1877, 140, 'San Pedro Cholula', 21),
(1878, 140, 'San Andrés Tenejapan', 30),
(1879, 141, 'San Francisco del Mar', 20),
(1880, 141, 'San Pedro Yeloixtlahuaca', 21),
(1881, 141, 'San Andrés Tuxtla', 30),
(1882, 142, 'San Francisco Huehuetlán', 20),
(1883, 142, 'San Salvador el Seco', 21),
(1884, 142, 'San Juan Evangelista', 30),
(1885, 143, 'San Francisco Ixhuatán', 20),
(1886, 143, 'San Salvador el Verde', 21),
(1887, 143, 'Santiago Tuxtla', 30),
(1888, 144, 'San Francisco Jaltepetongo', 20),
(1889, 144, 'San Salvador Huixcolotla', 21),
(1890, 144, 'Sayula de Alemán', 30),
(1891, 145, 'San Francisco Lachigoló', 20),
(1892, 145, 'San Sebastián Tlacotepec', 21),
(1893, 145, 'Soconusco', 30),
(1894, 146, 'San Francisco Logueche', 20),
(1895, 146, 'Santa Catarina Tlaltempan', 21),
(1896, 146, 'Sochiapa', 30),
(1897, 147, 'San Francisco Nuxaño', 20),
(1898, 147, 'Santa Inés Ahuatempan', 21),
(1899, 147, 'Soledad Atzompa', 30),
(1900, 148, 'San Francisco Ozolotepec', 20),
(1901, 148, 'Santa Isabel Cholula', 21),
(1902, 148, 'Soledad de Doblado', 30),
(1903, 149, 'San Francisco Sola', 20),
(1904, 149, 'Santiago Miahuatlán', 21),
(1905, 149, 'Soteapan', 30),
(1906, 150, 'San Francisco Telixtlahuaca', 20),
(1907, 150, 'Huehuetlán el Grande', 21),
(1908, 150, 'Tamalín', 30),
(1909, 151, 'San Francisco Teopan', 20),
(1910, 151, 'Santo Tomás Hueyotlipan', 21),
(1911, 151, 'Tamiahua', 30),
(1912, 152, 'San Francisco Tlapancingo', 20),
(1913, 152, 'Soltepec', 21),
(1914, 152, 'Tampico Alto', 30),
(1915, 153, 'San Gabriel Mixtepec', 20),
(1916, 153, 'Tecali de Herrera', 21),
(1917, 153, 'Tancoco', 30),
(1918, 154, 'San Ildefonso Amatlán', 20),
(1919, 154, 'Tecamachalco', 21),
(1920, 154, 'Tantima', 30),
(1921, 155, 'San Ildefonso Sola', 20),
(1922, 155, 'Tecomatlán', 21),
(1923, 155, 'Tantoyuca', 30),
(1924, 156, 'San Ildefonso Villa Alta', 20),
(1925, 156, 'Tehuacán', 21),
(1926, 156, 'Tatatila', 30),
(1927, 157, 'San Jacinto Amilpas', 20),
(1928, 157, 'Tehuitzingo', 21),
(1929, 157, 'Castillo de Teayo', 30),
(1930, 158, 'San Jacinto Tlacotepec', 20),
(1931, 158, 'Tenampulco', 21),
(1932, 158, 'Tecolutla', 30),
(1933, 159, 'San Jerónimo Coatlán', 20),
(1934, 159, 'Teopantlán', 21),
(1935, 159, 'Tehuipango', 30),
(1936, 160, 'San Jerónimo Silacayoapilla', 20),
(1937, 160, 'Teotlalco', 21),
(1938, 160, 'Álamo Temapache', 30),
(1939, 161, 'San Jerónimo Sosola', 20),
(1940, 161, 'Tepanco de López', 21),
(1941, 161, 'Tempoal', 30),
(1942, 162, 'San Jerónimo Taviche', 20),
(1943, 162, 'Tepango de Rodríguez', 21),
(1944, 162, 'Tenampa', 30),
(1945, 163, 'San Jerónimo Tecóatl', 20),
(1946, 163, 'Tepatlaxco de Hidalgo', 21),
(1947, 163, 'Tenochtitlán', 30),
(1948, 164, 'San Jorge Nuchita', 20),
(1949, 164, 'Tepeaca', 21),
(1950, 164, 'Teocelo', 30),
(1951, 165, 'San José Ayuquila', 20),
(1952, 165, 'Tepemaxalco', 21),
(1953, 165, 'Tepatlaxco', 30),
(1954, 166, 'San José Chiltepec', 20),
(1955, 166, 'Tepeojuma', 21),
(1956, 166, 'Tepetlán', 30),
(1957, 167, 'San José del Peñasco', 20),
(1958, 167, 'Tepetzintla', 21),
(1959, 167, 'Tepetzintla', 30),
(1960, 168, 'San José Estancia Grande', 20),
(1961, 168, 'Tepexco', 21),
(1962, 168, 'Tequila', 30),
(1963, 169, 'San José Independencia', 20),
(1964, 169, 'Tepexi de Rodríguez', 21),
(1965, 169, 'José Azueta', 30),
(1966, 170, 'San José Lachiguiri', 20),
(1967, 170, 'Tepeyahualco', 21),
(1968, 170, 'Texcatepec', 30),
(1969, 171, 'San José Tenango', 20),
(1970, 171, 'Tepeyahualco de Cuauhtémoc', 21),
(1971, 171, 'Texhuacán', 30),
(1972, 172, 'San Juan Achiutla', 20),
(1973, 172, 'Tetela de Ocampo', 21),
(1974, 172, 'Texistepec', 30),
(1975, 173, 'San Juan Atepec', 20),
(1976, 173, 'Teteles de Avila Castillo', 21),
(1977, 173, 'Tezonapa', 30),
(1978, 174, 'Ánimas Trujano', 20),
(1979, 174, 'Teziutlán', 21),
(1980, 174, 'Tierra Blanca', 30),
(1981, 175, 'San Juan Bautista Atatlahuca', 20),
(1982, 175, 'Tianguismanalco', 21),
(1983, 175, 'Tihuatlán', 30),
(1984, 176, 'San Juan Bautista Coixtlahuaca', 20),
(1985, 176, 'Tilapa', 21),
(1986, 176, 'Tlacojalpan', 30),
(1987, 177, 'San Juan Bautista Cuicatlán', 20),
(1988, 177, 'Tlacotepec de Benito Juárez', 21),
(1989, 177, 'Tlacolulan', 30),
(1990, 178, 'San Juan Bautista Guelache', 20),
(1991, 178, 'Tlacuilotepec', 21),
(1992, 178, 'Tlacotalpan', 30),
(1993, 179, 'San Juan Bautista Jayacatlán', 20),
(1994, 179, 'Tlachichuca', 21),
(1995, 179, 'Tlacotepec de Mejía', 30),
(1996, 180, 'San Juan Bautista Lo de Soto', 20),
(1997, 180, 'Tlahuapan', 21),
(1998, 180, 'Tlachichilco', 30),
(1999, 181, 'San Juan Bautista Suchitepec', 20),
(2000, 181, 'Tlaltenango', 21),
(2001, 181, 'Tlalixcoyan', 30),
(2002, 182, 'San Juan Bautista Tlacoatzintepec', 20),
(2003, 182, 'Tlanepantla', 21),
(2004, 182, 'Tlalnelhuayocan', 30),
(2005, 183, 'San Juan Bautista Tlachichilco', 20),
(2006, 183, 'Tlaola', 21),
(2007, 183, 'Tlapacoyan', 30),
(2008, 184, 'San Juan Bautista Tuxtepec', 20),
(2009, 184, 'Tlapacoya', 21),
(2010, 184, 'Tlaquilpa', 30),
(2011, 185, 'San Juan Cacahuatepec', 20),
(2012, 185, 'Tlapanalá', 21),
(2013, 185, 'Tlilapan', 30),
(2014, 186, 'San Juan Cieneguilla', 20),
(2015, 186, 'Tlatlauquitepec', 21),
(2016, 186, 'Tomatlán', 30),
(2017, 187, 'San Juan Coatzóspam', 20),
(2018, 187, 'Tlaxco', 21),
(2019, 187, 'Tonayán', 30),
(2020, 188, 'San Juan Colorado', 20),
(2021, 188, 'Tochimilco', 21),
(2022, 188, 'Totutla', 30),
(2023, 189, 'San Juan Comaltepec', 20),
(2024, 189, 'Tochtepec', 21),
(2025, 189, 'Tuxpan', 30),
(2026, 190, 'San Juan Cotzocón', 20),
(2027, 190, 'Totoltepec de Guerrero', 21),
(2028, 190, 'Tuxtilla', 30),
(2029, 191, 'San Juan Chicomezúchil', 20),
(2030, 191, 'Tulcingo', 21),
(2031, 191, 'Ursulo Galván', 30),
(2032, 192, 'San Juan Chilateca', 20),
(2033, 192, 'Tuzamapan de Galeana', 21),
(2034, 192, 'Vega de Alatorre', 30),
(2035, 193, 'San Juan del Estado', 20),
(2036, 193, 'Tzicatlacoyan', 21),
(2037, 193, 'Veracruz', 30),
(2038, 194, 'San Juan del Río', 20),
(2039, 194, 'Venustiano Carranza', 21),
(2040, 194, 'Villa Aldama', 30),
(2041, 195, 'San Juan Diuxi', 20),
(2042, 195, 'Vicente Guerrero', 21),
(2043, 195, 'Xoxocotla', 30),
(2044, 196, 'San Juan Evangelista Analco', 20),
(2045, 196, 'Xayacatlán de Bravo', 21),
(2046, 196, 'Yanga', 30),
(2047, 197, 'San Juan Guelavía', 20),
(2048, 197, 'Xicotepec', 21),
(2049, 197, 'Yecuatla', 30),
(2050, 198, 'San Juan Guichicovi', 20),
(2051, 198, 'Xicotlán', 21),
(2052, 198, 'Zacualpan', 30),
(2053, 199, 'San Juan Ihualtepec', 20),
(2054, 199, 'Xiutetelco', 21),
(2055, 199, 'Zaragoza', 30),
(2056, 200, 'San Juan Juquila Mixes', 20),
(2057, 200, 'Xochiapulco', 21),
(2058, 200, 'Zentla', 30),
(2059, 201, 'San Juan Juquila Vijanos', 20),
(2060, 201, 'Xochiltepec', 21),
(2061, 201, 'Zongolica', 30),
(2062, 202, 'San Juan Lachao', 20),
(2063, 202, 'Xochitlán de Vicente Suárez', 21),
(2064, 202, 'Zontecomatlán de López y Fuentes', 30),
(2065, 203, 'San Juan Lachigalla', 20),
(2066, 203, 'Xochitlán Todos Santos', 21),
(2067, 203, 'Zozocolco de Hidalgo', 30),
(2068, 204, 'San Juan Lajarcia', 20),
(2069, 204, 'Yaonáhuac', 21),
(2070, 204, 'Agua Dulce', 30),
(2071, 205, 'San Juan Lalana', 20),
(2072, 205, 'Yehualtepec', 21),
(2073, 205, 'El Higo', 30),
(2074, 206, 'San Juan de los Cués', 20),
(2075, 206, 'Zacapala', 21),
(2076, 206, 'Nanchital de Lázaro Cárdenas del Río', 30),
(2077, 207, 'San Juan Mazatlán', 20),
(2078, 207, 'Zacapoaxtla', 21),
(2079, 207, 'Tres Valles', 30),
(2080, 208, 'San Juan Mixtepec -Dto. 08 -', 20),
(2081, 208, 'Zacatlán', 21),
(2082, 208, 'Carlos A. Carrillo', 30),
(2083, 209, 'San Juan Mixtepec -Dto. 26 -', 20),
(2084, 209, 'Zapotitlán', 21),
(2085, 209, 'Tatahuicapan de Juárez', 30),
(2086, 210, 'San Juan Ñumí', 20),
(2087, 210, 'Zapotitlán de Méndez', 21),
(2088, 210, 'Uxpanapa', 30),
(2089, 211, 'San Juan Ozolotepec', 20),
(2090, 211, 'Zaragoza', 21),
(2091, 211, 'San Rafael', 30),
(2092, 212, 'San Juan Petlapa', 20),
(2093, 212, 'Zautla', 21),
(2094, 212, 'Santiago Sochiapan', 30),
(2095, 213, 'San Juan Quiahije', 20),
(2096, 213, 'Zihuateutla', 21),
(2097, 214, 'San Juan Quiotepec', 20),
(2098, 214, 'Zinacatepec', 21),
(2099, 215, 'San Juan Sayultepec', 20),
(2100, 215, 'Zongozotla', 21),
(2101, 216, 'San Juan Tabaá', 20),
(2102, 216, 'Zoquiapan', 21),
(2103, 217, 'San Juan Tamazola', 20),
(2104, 217, 'Zoquitlán', 21),
(2105, 218, 'San Juan Teita', 20),
(2106, 219, 'San Juan Teitipac', 20),
(2107, 220, 'San Juan Tepeuxila', 20),
(2108, 221, 'San Juan Teposcolula', 20),
(2109, 222, 'San Juan Yaeé', 20),
(2110, 223, 'San Juan Yatzona', 20),
(2111, 224, 'San Juan Yucuita', 20),
(2112, 225, 'San Lorenzo', 20),
(2113, 226, 'San Lorenzo Albarradas', 20),
(2114, 227, 'San Lorenzo Cacaotepec', 20),
(2115, 228, 'San Lorenzo Cuaunecuiltitla', 20),
(2116, 229, 'San Lorenzo Texmelúcan', 20),
(2117, 230, 'San Lorenzo Victoria', 20),
(2118, 231, 'San Lucas Camotlán', 20),
(2119, 232, 'San Lucas Ojitlán', 20),
(2120, 233, 'San Lucas Quiaviní', 20),
(2121, 234, 'San Lucas Zoquiápam', 20),
(2122, 235, 'San Luis Amatlán', 20),
(2123, 236, 'San Marcial Ozolotepec', 20),
(2124, 237, 'San Marcos Arteaga', 20),
(2125, 238, 'San Martín de los Cansecos', 20),
(2126, 239, 'San Martín Huamelúlpam', 20),
(2127, 240, 'San Martín Itunyoso', 20),
(2128, 241, 'San Martín Lachilá', 20),
(2129, 242, 'San Martín Peras', 20),
(2130, 243, 'San Martín Tilcajete', 20),
(2131, 244, 'San Martín Toxpalan', 20),
(2132, 245, 'San Martín Zacatepec', 20),
(2133, 246, 'San Mateo Cajonos', 20),
(2134, 247, 'Capulálpam de Méndez', 20),
(2135, 248, 'San Mateo del Mar', 20),
(2136, 249, 'San Mateo Yoloxochitlán', 20),
(2137, 250, 'San Mateo Etlatongo', 20),
(2138, 251, 'San Mateo Nejápam', 20),
(2139, 252, 'San Mateo Peñasco', 20),
(2140, 253, 'San Mateo Piñas', 20),
(2141, 254, 'San Mateo Río Hondo', 20),
(2142, 255, 'San Mateo Sindihui', 20),
(2143, 256, 'San Mateo Tlapiltepec', 20),
(2144, 257, 'San Melchor Betaza', 20),
(2145, 258, 'San Miguel Achiutla', 20),
(2146, 259, 'San Miguel Ahuehuetitlán', 20),
(2147, 260, 'San Miguel Aloápam', 20),
(2148, 261, 'San Miguel Amatitlán', 20),
(2149, 262, 'San Miguel Amatlán', 20),
(2150, 263, 'San Miguel Coatlán', 20),
(2151, 264, 'San Miguel Chicahua', 20),
(2152, 265, 'San Miguel Chimalapa', 20),
(2153, 266, 'San Miguel del Puerto', 20),
(2154, 267, 'San Miguel del Río', 20),
(2155, 268, 'San Miguel Ejutla', 20),
(2156, 269, 'San Miguel el Grande', 20),
(2157, 270, 'San Miguel Huautla', 20),
(2158, 271, 'San Miguel Mixtepec', 20),
(2159, 272, 'San Miguel Panixtlahuaca', 20),
(2160, 273, 'San Miguel Peras', 20),
(2161, 274, 'San Miguel Piedras', 20),
(2162, 275, 'San Miguel Quetzaltepec', 20),
(2163, 276, 'San Miguel Santa Flor', 20),
(2164, 277, 'Villa Sola de Vega', 20),
(2165, 278, 'San Miguel Soyaltepec', 20),
(2166, 279, 'San Miguel Suchixtepec', 20),
(2167, 280, 'Villa Talea de Castro', 20),
(2168, 281, 'San Miguel Tecomatlán', 20),
(2169, 282, 'San Miguel Tenango', 20),
(2170, 283, 'San Miguel Tequixtepec', 20),
(2171, 284, 'San Miguel Tilquiápam', 20),
(2172, 285, 'San Miguel Tlacamama', 20),
(2173, 286, 'San Miguel Tlacotepec', 20),
(2174, 287, 'San Miguel Tulancingo', 20),
(2175, 288, 'San Miguel Yotao', 20),
(2176, 289, 'San Nicolás', 20),
(2177, 290, 'San Nicolás Hidalgo', 20),
(2178, 291, 'San Pablo Coatlán', 20),
(2179, 292, 'San Pablo Cuatro Venados', 20),
(2180, 293, 'San Pablo Etla', 20),
(2181, 294, 'San Pablo Huitzo', 20),
(2182, 295, 'San Pablo Huixtepec', 20),
(2183, 296, 'San Pablo Macuiltianguis', 20),
(2184, 297, 'San Pablo Tijaltepec', 20),
(2185, 298, 'San Pablo Villa de Mitla', 20),
(2186, 299, 'San Pablo Yaganiza', 20),
(2187, 300, 'San Pedro Amuzgos', 20),
(2188, 301, 'San Pedro Apóstol', 20),
(2189, 302, 'San Pedro Atoyac', 20),
(2190, 303, 'San Pedro Cajonos', 20),
(2191, 304, 'San Pedro Coxcaltepec Cántaros', 20),
(2192, 305, 'San Pedro Comitancillo', 20),
(2193, 306, 'San Pedro el Alto', 20),
(2194, 307, 'San Pedro Huamelula', 20),
(2195, 308, 'San Pedro Huilotepec', 20),
(2196, 309, 'San Pedro Ixcatlán', 20),
(2197, 310, 'San Pedro Ixtlahuaca', 20),
(2198, 311, 'San Pedro Jaltepetongo', 20),
(2199, 312, 'San Pedro Jicayán', 20),
(2200, 313, 'San Pedro Jocotipac', 20),
(2201, 314, 'San Pedro Juchatengo', 20),
(2202, 315, 'San Pedro Mártir', 20),
(2203, 316, 'San Pedro Mártir Quiechapa', 20),
(2204, 317, 'San Pedro Mártir Yucuxaco', 20),
(2205, 318, 'San Pedro Mixtepec -Dto. 22 -', 20),
(2206, 319, 'San Pedro Mixtepec -Dto. 26 -', 20),
(2207, 320, 'San Pedro Molinos', 20),
(2208, 321, 'San Pedro Nopala', 20),
(2209, 322, 'San Pedro Ocopetatillo', 20),
(2210, 323, 'San Pedro Ocotepec', 20),
(2211, 324, 'San Pedro Pochutla', 20),
(2212, 325, 'San Pedro Quiatoni', 20),
(2213, 326, 'San Pedro Sochiápam', 20),
(2214, 327, 'San Pedro Tapanatepec', 20),
(2215, 328, 'San Pedro Taviche', 20),
(2216, 329, 'San Pedro Teozacoalco', 20),
(2217, 330, 'San Pedro Teutila', 20),
(2218, 331, 'San Pedro Tidaá', 20),
(2219, 332, 'San Pedro Topiltepec', 20),
(2220, 333, 'San Pedro Totolápam', 20),
(2221, 334, 'Villa de Tututepec de Melchor Ocampo', 20),
(2222, 335, 'San Pedro Yaneri', 20),
(2223, 336, 'San Pedro Yólox', 20),
(2224, 337, 'San Pedro y San Pablo Ayutla', 20),
(2225, 338, 'Villa de Etla', 20),
(2226, 339, 'San Pedro y San Pablo Teposcolula', 20),
(2227, 340, 'San Pedro y San Pablo Tequixtepec', 20),
(2228, 341, 'San Pedro Yucunama', 20),
(2229, 342, 'San Raymundo Jalpan', 20),
(2230, 343, 'San Sebastián Abasolo', 20),
(2231, 344, 'San Sebastián Coatlán', 20),
(2232, 345, 'San Sebastián Ixcapa', 20),
(2233, 346, 'San Sebastián Nicananduta', 20),
(2234, 347, 'San Sebastián Río Hondo', 20),
(2235, 348, 'San Sebastián Tecomaxtlahuaca', 20),
(2236, 349, 'San Sebastián Teitipac', 20),
(2237, 350, 'San Sebastián Tutla', 20),
(2238, 351, 'San Simón Almolongas', 20),
(2239, 352, 'San Simón Zahuatlán', 20),
(2240, 353, 'Santa Ana', 20),
(2241, 354, 'Santa Ana Ateixtlahuaca', 20),
(2242, 355, 'Santa Ana Cuauhtémoc', 20),
(2243, 356, 'Santa Ana del Valle', 20),
(2244, 357, 'Santa Ana Tavela', 20),
(2245, 358, 'Santa Ana Tlapacoyan', 20),
(2246, 359, 'Santa Ana Yareni', 20),
(2247, 360, 'Santa Ana Zegache', 20),
(2248, 361, 'Santa Catalina Quierí', 20),
(2249, 362, 'Santa Catarina Cuixtla', 20),
(2250, 363, 'Santa Catarina Ixtepeji', 20),
(2251, 364, 'Santa Catarina Juquila', 20),
(2252, 365, 'Santa Catarina Lachatao', 20),
(2253, 366, 'Santa Catarina Loxicha', 20),
(2254, 367, 'Santa Catarina Mechoacán', 20),
(2255, 368, 'Santa Catarina Minas', 20),
(2256, 369, 'Santa Catarina Quiané', 20),
(2257, 370, 'Santa Catarina Tayata', 20),
(2258, 371, 'Santa Catarina Ticuá', 20),
(2259, 372, 'Santa Catarina Yosonotú', 20),
(2260, 373, 'Santa Catarina Zapoquila', 20),
(2261, 374, 'Santa Cruz Acatepec', 20),
(2262, 375, 'Santa Cruz Amilpas', 20),
(2263, 376, 'Santa Cruz de Bravo', 20),
(2264, 377, 'Santa Cruz Itundujia', 20),
(2265, 378, 'Santa Cruz Mixtepec', 20),
(2266, 379, 'Santa Cruz Nundaco', 20),
(2267, 380, 'Santa Cruz Papalutla', 20),
(2268, 381, 'Santa Cruz Tacache de Mina', 20),
(2269, 382, 'Santa Cruz Tacahua', 20),
(2270, 383, 'Santa Cruz Tayata', 20),
(2271, 384, 'Santa Cruz Xitla', 20),
(2272, 385, 'Santa Cruz Xoxocotlán', 20),
(2273, 386, 'Santa Cruz Zenzontepec', 20),
(2274, 387, 'Santa Gertrudis', 20),
(2275, 388, 'Santa Inés del Monte', 20),
(2276, 389, 'Santa Inés Yatzeche', 20),
(2277, 390, 'Santa Lucía del Camino', 20),
(2278, 391, 'Santa Lucía Miahuatlán', 20),
(2279, 392, 'Santa Lucía Monteverde', 20),
(2280, 393, 'Santa Lucía Ocotlán', 20),
(2281, 394, 'Santa María Alotepec', 20),
(2282, 395, 'Santa María Apazco', 20),
(2283, 396, 'Santa María la Asunción', 20),
(2284, 397, 'Heroica Ciudad de Tlaxiaco', 20),
(2285, 398, 'Ayoquezco de Aldama', 20),
(2286, 399, 'Santa María Atzompa', 20),
(2287, 400, 'Santa María Camotlán', 20),
(2288, 401, 'Santa María Colotepec', 20),
(2289, 402, 'Santa María Cortijo', 20),
(2290, 403, 'Santa María Coyotepec', 20),
(2291, 404, 'Santa María Chachoápam', 20),
(2292, 405, 'Villa de Chilapa de Díaz', 20),
(2293, 406, 'Santa María Chilchotla', 20),
(2294, 407, 'Santa María Chimalapa', 20),
(2295, 408, 'Santa María del Rosario', 20),
(2296, 409, 'Santa María del Tule', 20),
(2297, 410, 'Santa María Ecatepec', 20),
(2298, 411, 'Santa María Guelacé', 20),
(2299, 412, 'Santa María Guienagati', 20),
(2300, 413, 'Santa María Huatulco', 20),
(2301, 414, 'Santa María Huazolotitlán', 20),
(2302, 415, 'Santa María Ipalapa', 20),
(2303, 416, 'Santa María Ixcatlán', 20),
(2304, 417, 'Santa María Jacatepec', 20),
(2305, 418, 'Santa María Jalapa del Marqués', 20),
(2306, 419, 'Santa María Jaltianguis', 20),
(2307, 420, 'Santa María Lachixío', 20),
(2308, 421, 'Santa María Mixtequilla', 20),
(2309, 422, 'Santa María Nativitas', 20),
(2310, 423, 'Santa María Nduayaco', 20),
(2311, 424, 'Santa María Ozolotepec', 20),
(2312, 425, 'Santa María Pápalo', 20),
(2313, 426, 'Santa María Peñoles', 20),
(2314, 427, 'Santa María Petapa', 20),
(2315, 428, 'Santa María Quiegolani', 20),
(2316, 429, 'Santa María Sola', 20),
(2317, 430, 'Santa María Tataltepec', 20),
(2318, 431, 'Santa María Tecomavaca', 20),
(2319, 432, 'Santa María Temaxcalapa', 20),
(2320, 433, 'Santa María Temaxcaltepec', 20),
(2321, 434, 'Santa María Teopoxco', 20),
(2322, 435, 'Santa María Tepantlali', 20),
(2323, 436, 'Santa María Texcatitlán', 20),
(2324, 437, 'Santa María Tlahuitoltepec', 20),
(2325, 438, 'Santa María Tlalixtac', 20),
(2326, 439, 'Santa María Tonameca', 20),
(2327, 440, 'Santa María Totolapilla', 20),
(2328, 441, 'Santa María Xadani', 20),
(2329, 442, 'Santa María Yalina', 20),
(2330, 443, 'Santa María Yavesía', 20),
(2331, 444, 'Santa María Yolotepec', 20),
(2332, 445, 'Santa María Yosoyúa', 20),
(2333, 446, 'Santa María Yucuhiti', 20),
(2334, 447, 'Santa María Zacatepec', 20),
(2335, 448, 'Santa María Zaniza', 20),
(2336, 449, 'Santa María Zoquitlán', 20),
(2337, 450, 'Santiago Amoltepec', 20),
(2338, 451, 'Santiago Apoala', 20),
(2339, 452, 'Santiago Apóstol', 20),
(2340, 453, 'Santiago Astata', 20),
(2341, 454, 'Santiago Atitlán', 20),
(2342, 455, 'Santiago Ayuquililla', 20),
(2343, 456, 'Santiago Cacaloxtepec', 20),
(2344, 457, 'Santiago Camotlán', 20),
(2345, 458, 'Santiago Comaltepec', 20),
(2346, 459, 'Santiago Chazumba', 20),
(2347, 460, 'Santiago Choápam', 20),
(2348, 461, 'Santiago del Río', 20),
(2349, 462, 'Santiago Huajolotitlán', 20),
(2350, 463, 'Santiago Huauclilla', 20),
(2351, 464, 'Santiago Ihuitlán Plumas', 20),
(2352, 465, 'Santiago Ixcuintepec', 20),
(2353, 466, 'Santiago Ixtayutla', 20),
(2354, 467, 'Santiago Jamiltepec', 20),
(2355, 468, 'Santiago Jocotepec', 20),
(2356, 469, 'Santiago Juxtlahuaca', 20),
(2357, 470, 'Santiago Lachiguiri', 20),
(2358, 471, 'Santiago Lalopa', 20),
(2359, 472, 'Santiago Laollaga', 20),
(2360, 473, 'Santiago Laxopa', 20),
(2361, 474, 'Santiago Llano Grande', 20),
(2362, 475, 'Santiago Matatlán', 20),
(2363, 476, 'Santiago Miltepec', 20),
(2364, 477, 'Santiago Minas', 20),
(2365, 478, 'Santiago Nacaltepec', 20),
(2366, 479, 'Santiago Nejapilla', 20),
(2367, 480, 'Santiago Nundiche', 20),
(2368, 481, 'Santiago Nuyoó', 20),
(2369, 482, 'Santiago Pinotepa Nacional', 20),
(2370, 483, 'Santiago Suchilquitongo', 20),
(2371, 484, 'Santiago Tamazola', 20),
(2372, 485, 'Santiago Tapextla', 20),
(2373, 486, 'Villa Tejúpam de la Unión', 20),
(2374, 487, 'Santiago Tenango', 20),
(2375, 488, 'Santiago Tepetlapa', 20),
(2376, 489, 'Santiago Tetepec', 20),
(2377, 490, 'Santiago Texcalcingo', 20),
(2378, 491, 'Santiago Textitlán', 20),
(2379, 492, 'Santiago Tilantongo', 20),
(2380, 493, 'Santiago Tillo', 20),
(2381, 494, 'Santiago Tlazoyaltepec', 20),
(2382, 495, 'Santiago Xanica', 20),
(2383, 496, 'Santiago Xiacuí', 20),
(2384, 497, 'Santiago Yaitepec', 20),
(2385, 498, 'Santiago Yaveo', 20),
(2386, 499, 'Santiago Yolomécatl', 20),
(2387, 500, 'Santiago Yosondúa', 20),
(2388, 501, 'Santiago Yucuyachi', 20),
(2389, 502, 'Santiago Zacatepec', 20),
(2390, 503, 'Santiago Zoochila', 20),
(2391, 504, 'Nuevo Zoquiápam', 20),
(2392, 505, 'Santo Domingo Ingenio', 20),
(2393, 506, 'Santo Domingo Albarradas', 20),
(2394, 507, 'Santo Domingo Armenta', 20),
(2395, 508, 'Santo Domingo Chihuitán', 20),
(2396, 509, 'Santo Domingo de Morelos', 20),
(2397, 510, 'Santo Domingo Ixcatlán', 20),
(2398, 511, 'Santo Domingo Nuxaá', 20),
(2399, 512, 'Santo Domingo Ozolotepec', 20),
(2400, 513, 'Santo Domingo Petapa', 20),
(2401, 514, 'Santo Domingo Roayaga', 20),
(2402, 515, 'Santo Domingo Tehuantepec', 20),
(2403, 516, 'Santo Domingo Teojomulco', 20),
(2404, 517, 'Santo Domingo Tepuxtepec', 20),
(2405, 518, 'Santo Domingo Tlatayápam', 20),
(2406, 519, 'Santo Domingo Tomaltepec', 20),
(2407, 520, 'Santo Domingo Tonalá', 20),
(2408, 521, 'Santo Domingo Tonaltepec', 20),
(2409, 522, 'Santo Domingo Xagacía', 20),
(2410, 523, 'Santo Domingo Yanhuitlán', 20),
(2411, 524, 'Santo Domingo Yodohino', 20),
(2412, 525, 'Santo Domingo Zanatepec', 20),
(2413, 526, 'Santos Reyes Nopala', 20),
(2414, 527, 'Santos Reyes Pápalo', 20),
(2415, 528, 'Santos Reyes Tepejillo', 20),
(2416, 529, 'Santos Reyes Yucuná', 20),
(2417, 530, 'Santo Tomás Jalieza', 20),
(2418, 531, 'Santo Tomás Mazaltepec', 20),
(2419, 532, 'Santo Tomás Ocotepec', 20),
(2420, 533, 'Santo Tomás Tamazulapan', 20),
(2421, 534, 'San Vicente Coatlán', 20),
(2422, 535, 'San Vicente Lachixío', 20),
(2423, 536, 'San Vicente Nuñú', 20),
(2424, 537, 'Silacayoápam', 20),
(2425, 538, 'Sitio de Xitlapehua', 20),
(2426, 539, 'Soledad Etla', 20),
(2427, 540, 'Villa de Tamazulápam del Progreso', 20),
(2428, 541, 'Tanetze de Zaragoza', 20),
(2429, 542, 'Taniche', 20),
(2430, 543, 'Tataltepec de Valdés', 20),
(2431, 544, 'Teococuilco de Marcos Pérez', 20),
(2432, 545, 'Teotitlán de Flores Magón', 20),
(2433, 546, 'Teotitlán del Valle', 20),
(2434, 547, 'Teotongo', 20),
(2435, 548, 'Tepelmeme Villa de Morelos', 20),
(2436, 549, 'Tezoatlán de Segura y Luna', 20),
(2437, 550, 'San Jerónimo Tlacochahuaya', 20),
(2438, 551, 'Tlacolula de Matamoros', 20),
(2439, 552, 'Tlacotepec Plumas', 20),
(2440, 553, 'Tlalixtac de Cabrera', 20),
(2441, 554, 'Totontepec Villa de Morelos', 20),
(2442, 555, 'Trinidad Zaachila', 20),
(2443, 556, 'La Trinidad Vista Hermosa', 20),
(2444, 557, 'Unión Hidalgo', 20),
(2445, 558, 'Valerio Trujano', 20),
(2446, 559, 'San Juan Bautista Valle Nacional', 20),
(2447, 560, 'Villa Díaz Ordaz', 20),
(2448, 561, 'Yaxe', 20),
(2449, 562, 'Magdalena Yodocono de Porfirio Díaz', 20),
(2450, 563, 'Yogana', 20),
(2451, 564, 'Yutanduchi de Guerrero', 20),
(2452, 565, 'Villa de Zaachila', 20),
(2453, 566, 'San Mateo Yucutindoo', 20),
(2454, 567, 'Zapotitlán Lagunas', 20),
(2455, 568, 'Zapotitlán Palmas', 20),
(2456, 569, 'Santa Inés de Zaragoza', 20),
(2457, 570, 'Zimatlán de Álvarez', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattipodoc`
--

CREATE TABLE `cattipodoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `carpeta` varchar(8) DEFAULT NULL COMMENT 'carpeta contenedora en el servidor',
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cattipodoc`
--

INSERT INTO `cattipodoc` (`id`, `tipo`, `clave`, `carpeta`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Credencial Elector', 'CE', 'CE', NULL, NULL, NULL),
(2, 'CURP', 'CURP', 'CURP', NULL, NULL, NULL),
(3, 'Acta Constitutiva', 'ACCON', 'ACCON', NULL, NULL, NULL),
(4, 'Comprobante de Domicilio', 'DOMICILIO', 'DOMICILI', NULL, NULL, NULL),
(5, 'Cedula de Identificación Fiscal', 'CIF', 'CIF', NULL, NULL, NULL),
(6, 'Acta de Matrimonio', 'ACMAT', 'ACMAT', NULL, NULL, NULL),
(7, 'Acuerdo Comercial', 'ACUCOM', 'ACUCOM', NULL, NULL, NULL),
(8, 'Acta de Nacimiento', 'ACNAC', 'ACNAC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattmovimiento`
--

CREATE TABLE `cattmovimiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `descrp_corto` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cattmovimiento`
--

INSERT INTO `cattmovimiento` (`id`, `descripcion`, `descrp_corto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CARGO COMPRA', 'CARGCOMPRA', NULL, NULL, NULL),
(2, 'INGRESO EFECTIVO', 'INGRESOEFE', NULL, NULL, NULL),
(3, 'CARGO POR COBRO DE SERVICIO', 'CARGXSERVI', NULL, NULL, NULL),
(4, 'CARGO TRASPASO SALDO', 'GARGXTRAS', NULL, NULL, NULL),
(5, 'INTERESES', 'INTERESES', NULL, NULL, NULL),
(6, 'SALDO', 'SALDO', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_bancos`
--

CREATE TABLE `cat_bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `denominacionsocial` varchar(150) NOT NULL,
  `nombrecorto` varchar(10) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `Entidad` varchar(10) DEFAULT NULL,
  `grupofinancierto` varchar(120) DEFAULT NULL,
  `paginainternet` varchar(120) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_bancos`
--

INSERT INTO `cat_bancos` (`id`, `nombre`, `denominacionsocial`, `nombrecorto`, `RFC`, `Entidad`, `grupofinancierto`, `paginainternet`, `logo`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banamex', 'Banco Nacional de México, S.A., Integrante del Grupo Financiero Banamez', 'Banamex', 'BNM840515VB1', 'Nacional', NULL, 'www.banamex.com/citibanamex.com', NULL, 'unebanamex@banamex.com', NULL, NULL, NULL),
(2, 'Santander', 'Banco Santander (México), S.A., Institución de Banca Múltiple, Grupo Financiero Santander Mé', 'Santander', 'BSM970519DU8', 'Filial', NULL, 'www.santander.com.mx', NULL, 'glguzman@santander.com.mx', NULL, '2018-11-11 11:06:48', NULL),
(3, 'Banorte', 'Banco Mercantil del Norte, S.A., Institución de Banca Múltiple, Grupo Financiero Banorte', 'Banorte', 'BMN930209927', 'Nacional', 'Grupo Financiero Banorte, S.A.B. de C.V.', 'www.banorte.com', NULL, 'atencion.usuarios@banorte.com', '2018-11-07 21:52:40', '2018-11-07 21:52:40', NULL),
(4, 'Bancomer', 'BBVA BANCOMER SA INSTITUCION DE BANCA MULTIPLE, GRUPO FINANCIERO BBVA BANCOMER', 'Bancomer', 'BBA830831LJ2', NULL, 'Grupo Financiero BBVA Bancomer', 'https://www.bancomer.com.mx', NULL, NULL, '2018-11-11 10:14:35', '2018-11-11 10:27:54', NULL),
(5, 'HSBC', 'HSBC MEXICO SA INSTITUCION DE BANCA MULTIPLE GRUPO FINANCIERO HSBC', 'HSCB', 'HMI950125KG8', NULL, 'Grupo Financiero HSBC', 'www.hsbc.com.mx', NULL, NULL, '2018-11-11 10:29:06', '2018-11-11 10:29:06', NULL),
(6, 'ScotiaBank', 'SCOTIABANK INVERLAT, SA', 'Scotiabank', 'SIN9412025I4', NULL, NULL, 'www.scotiabank.com.mx', NULL, NULL, '2018-11-11 10:30:17', '2018-11-11 10:30:17', NULL),
(7, 'INBURSA', 'BANCO INBURSA SA INSTITUCION DE BANCA MULTIPLE', 'INBURSA', 'BII931004P61', NULL, 'GRUPO FINANCIERO INBUR, SA', NULL, NULL, NULL, '2018-11-11 11:03:13', '2018-11-11 11:03:13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidopat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidomat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RFC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CURP` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidopat`, `apellidomat`, `RFC`, `CURP`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Moises Armando', 'Aguilar', 'Mendoza', 'AUMM8102103F0', 'AUMM810210HTCGNS07', '5be7b0eddc288Instagram_App_Large_May2016_200.png', '2018-10-27 06:59:18', '2018-11-11 11:32:46', NULL),
(4, 'Ricardo', 'Jimenez', 'Rodriguez', 'RDJFiadDAASS', 'sodnajsndiajnsdoja', NULL, '2018-10-27 12:04:22', '2018-10-27 12:04:22', NULL),
(5, 'Doe', 'Hilario', 'Flores', 'DOHMDDSOSMFD', 'dmfoksnodfnsdf', '5bec511896965maria 2.jpg', '2018-10-27 12:08:45', '2018-11-14 23:45:13', NULL),
(6, 'Edgar', 'Perez', 'Zavala', 'EFSADADSASDAS', 'asdaDASDASD', NULL, '2018-10-27 12:12:11', '2018-10-27 12:24:20', '2018-10-27 12:24:20'),
(7, 'Fernando', 'Jimenez', 'Mayo', 'FNMSMI5518118', 'kOOKOK874', '5bde03dd7168elion_king_of_zoo-wide.jpg', '2018-10-28 00:32:35', '2018-11-04 03:23:57', NULL),
(8, 'Soledad', 'Mendoza', 'Alejandro', 'SOLLODA##\"AAA', '88178188047236', '5be7284447800emilia_clarke_daenerys_game_of_thrones_season_6-HD.jpg', '2018-10-28 00:46:06', '2018-11-11 01:49:41', NULL),
(9, 'Fabian', 'Aguilar', 'Aguirre', 'GDDAASDASDA', '18198191951sa95d19', NULL, '2018-10-28 00:49:32', '2018-10-28 00:49:32', NULL),
(10, 'Maximiliano', 'Aguilar', 'Hilario', 'MXCDD55771818', 'GHREPAASAS', NULL, '2018-10-28 21:49:06', '2018-10-28 21:49:06', NULL),
(11, 'JOSE ISRAEL', 'GARCIA', 'DE LA CRUZ', 'GACJ8506075HJ', 'GACJ8506075HJwwwda', NULL, '2018-11-04 08:54:56', '2018-11-04 08:54:56', NULL),
(12, 'IVAN DE JESUS', 'AQUINO', 'ZAPATA', 'AUZI851101445', 'AUZI851101HTCQPV05', NULL, '2018-11-21 18:42:34', '2018-11-21 18:42:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datcontactos`
--

CREATE TABLE `datcontactos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `default` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datcontactos`
--

INSERT INTO `datcontactos` (`id`, `tipo`, `contacto`, `cliente_id`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'email', 'armandoaguilar1@hotmail.com', 1, NULL, '2018-10-27 13:02:16', '2018-10-27 13:02:16', NULL),
(2, 'telefono', '9933082770', 1, NULL, '2018-10-28 04:42:58', '2018-10-28 04:42:58', NULL),
(3, 'whatsapp', '9931763069', 5, NULL, '2018-10-28 05:53:41', '2018-10-29 19:57:20', NULL),
(4, 'email', 'fernando.jimenez@peme.com', 7, NULL, '2018-10-28 06:13:04', '2018-10-28 06:13:04', NULL),
(5, 'telefono', '999338887', 7, NULL, '2018-10-28 06:14:54', '2018-10-29 19:32:00', NULL),
(6, 'whatsapp', '993358774', 9, NULL, '2018-10-28 06:16:08', '2018-10-28 06:16:08', NULL),
(7, 'telefono', '9933577', 9, NULL, '2018-10-28 06:18:31', '2018-11-15 17:33:10', '2018-11-15 17:33:10'),
(8, 'telefono', '9931788577', 8, NULL, '2018-10-28 06:19:08', '2018-10-28 06:19:08', NULL),
(9, 'email', 'doehilario@hotmail.com', 5, NULL, '2018-10-28 07:45:13', '2018-11-07 00:15:32', '2018-11-07 00:15:32'),
(10, 'telefono', '993110774', 4, NULL, '2018-10-28 20:13:03', '2018-10-28 20:13:03', NULL),
(11, 'telefono', '9936884198', 5, NULL, '2018-10-29 20:02:31', '2018-10-29 20:02:31', NULL),
(12, 'email', 'soledad.mendoza@live.com', 8, NULL, '2018-10-29 22:31:24', '2018-10-29 23:16:38', NULL),
(13, 'email', 'probike_repsal@hotmail.com', 4, NULL, '2018-10-29 23:54:48', '2018-10-30 00:03:05', '2018-10-30 00:03:05'),
(14, 'email', 'israel_hp@hotmail.com', 11, NULL, '2018-11-15 18:00:18', '2018-11-15 18:00:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RFC` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroExt` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroInt` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codpostal` int(11) NOT NULL,
  `referencias` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`id`, `cliente_id`, `razonsocial`, `RFC`, `calle`, `numeroExt`, `numeroInt`, `estado_id`, `municipio_id`, `colonia`, `codpostal`, `referencias`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 5, '', '', 'Calle 7 Cerro de la Cruz', 'Mzn11', 'Lote7', 27, 121, 'Fracc. Colinas de Santo Domingo', 86270, 'CALLE 7 CERRO DE LA CRUZ MANZANA 11 LOTE 7 ENTRE CALLE 1Y 2 CASA COLOR NARANJA', '2018-10-28 09:58:37', '2018-11-15 00:37:00', NULL),
(4, 4, '', '', 'HERMEREGILDO GALEANA', '141', NULL, 27, 121, 'ATASTA', 86100, NULL, '2018-10-28 21:26:24', '2018-10-28 21:26:24', NULL),
(5, 5, '', '', 'Independencia', '56', NULL, 27, 121, 'MIGUEL HIDALGO', 86270, NULL, '2018-10-29 04:32:34', '2018-10-29 04:32:34', NULL),
(6, 8, '', '', 'Vicente Wade Quiñones', '216', '2', 27, 121, 'Atasta', 86100, 'Enter Ejercito Mexicano y Eduardo Alday', '2018-10-29 22:32:12', '2018-10-29 22:32:12', NULL),
(7, 8, '', '', 'Vicente Wade Quiñones', '218', NULL, 27, 121, 'Atasta', 86100, 'Enter Ejercito Mexicano y Eduardo Alday, Frente a los conjunto habitacional isis.', '2018-10-29 22:42:26', '2018-10-29 22:42:26', NULL),
(8, 1, 'MOISES ARMANDO AGUILAR MENDOZA', 'AUMM8102103F0', 'VICENTE WADE QUIÑONES', '216', NULL, 27, 121, 'ATASTA', 86100, NULL, '2018-11-03 04:28:33', '2018-11-15 00:23:15', NULL),
(9, 5, 'DOE MARIA HILARIO FLORES', 'HIFD8209093V7', 'INDEPENDENCIA', '56', NULL, 27, 121, 'MIGUEL HIDALGO', 86100, NULL, '2018-11-15 00:38:39', '2018-11-15 00:38:39', NULL),
(10, 11, 'JOSE ISRAEL GARCIA DE LA CRUZ', 'GACI860629714', 'CALLE EJIDO', '42', NULL, 27, 121, 'TAMULTE', 86120, 'CALLE EJIDO', '2018-11-26 06:03:15', '2018-11-26 06:03:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_datfiscales`
--

CREATE TABLE `emp_datfiscales` (
  `id` int(10) UNSIGNED NOT NULL,
  `empresa_id` int(4) UNSIGNED NOT NULL,
  `razonsocial` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RFC` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroExt` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroInt` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `municipio_id` int(10) UNSIGNED NOT NULL,
  `colonia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codpostal` int(11) NOT NULL,
  `referencias` text COLLATE utf8mb4_unicode_ci,
  `sucursal` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `emp_datfiscales`
--

INSERT INTO `emp_datfiscales` (`id`, `empresa_id`, `razonsocial`, `RFC`, `calle`, `numeroExt`, `numeroInt`, `estado_id`, `municipio_id`, `colonia`, `codpostal`, `referencias`, `sucursal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 1, 'EMPRESA FANTASMA 4', 'EMP58811810', 'CALLE X Y', '412', NULL, 27, 121, 'CENTRO', 86100, NULL, NULL, '2018-11-06 23:48:07', '2018-11-06 23:48:07', NULL),
(11, 2, 'EMPRESAS SOCIAL RESPONSABLE S.A. DE C.V.', 'UYTGJKSIAIIII', 'CALLE 5', '141', NULL, 27, 121, 'PORTLAND', 1421, NULL, NULL, '2018-11-07 00:33:55', '2018-11-07 03:45:10', NULL),
(12, 3, 'IVAN DE JESUS AQUINO ZAPATA', 'AUZI851101445', 'CALLE A VILLA LOS ARCOS', '107', NULL, 27, 121, 'TAMULTE', 86130, NULL, NULL, '2018-11-21 18:47:38', '2018-11-21 18:47:38', NULL),
(13, 4, 'DIPROMED VILLAHERMOSA S.A. DE C.V.', 'DVI920226MPO', 'AVENIDA SAMARKANDA', '541', NULL, 27, 121, 'tabasco 2000', 86130, NULL, NULL, '2018-11-21 19:14:15', '2018-11-21 19:14:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mbanca`
--

CREATE TABLE `mbanca` (
  `id` int(10) UNSIGNED NOT NULL,
  `cuenta_id` int(10) UNSIGNED NOT NULL,
  `toperacion` enum('cargo','abono','') NOT NULL DEFAULT 'cargo',
  `tmovimiento` int(10) UNSIGNED DEFAULT NULL,
  `concepto` varchar(190) DEFAULT NULL,
  `monto` float NOT NULL,
  `fecha` datetime NOT NULL,
  `metodo` enum('efectivo','cheque','transferencia') NOT NULL DEFAULT 'efectivo',
  `saldo` float DEFAULT NULL,
  `referencia` varchar(15) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mbanca`
--

INSERT INTO `mbanca` (`id`, `cuenta_id`, `toperacion`, `tmovimiento`, `concepto`, `monto`, `fecha`, `metodo`, `saldo`, `referencia`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'cargo', 2, 'INGRESO INICIAL', 21450, '2018-11-16 00:00:00', 'efectivo', 21450, NULL, 1, '2018-11-16 12:42:42', '2018-11-16 12:42:42', NULL),
(2, 1, 'abono', 1, 'COMPRA X', 850, '2018-11-16 00:00:00', 'efectivo', 20600, NULL, 1, '2018-11-16 15:55:20', '2018-11-16 15:55:20', NULL),
(3, 4, 'cargo', 4, 'CRGO X', 250.5, '2018-11-16 00:00:00', 'efectivo', 1254, NULL, 1, '2018-11-16 15:56:12', '2018-11-16 15:56:12', NULL),
(4, 4, 'abono', 2, 'VENTA 5881', 12556.4, '2018-11-16 00:00:00', 'efectivo', 102546, NULL, 1, '2018-11-16 15:59:24', '2018-11-16 15:59:24', NULL),
(5, 1, 'cargo', 1, 'CARGO X', 1241, '2018-11-17 00:01:17', 'efectivo', NULL, NULL, 1, '2018-11-17 00:01:17', '2018-11-17 00:01:17', NULL),
(6, 1, 'abono', 2, 'CLIENTE 14771', 14524, '2018-11-17 00:01:53', 'efectivo', NULL, NULL, 1, '2018-11-17 00:01:53', '2018-11-17 00:01:53', NULL),
(7, 1, 'abono', 5, 'MOVIMIENTO DE INTERESES', 125.23, '2018-11-17 00:02:27', 'efectivo', NULL, NULL, 1, '2018-11-17 00:02:27', '2018-11-17 00:02:27', NULL),
(8, 1, 'cargo', 3, 'NETFLIX', 199.22, '2018-11-17 00:02:57', 'transferencia', NULL, NULL, 1, '2018-11-17 00:02:57', '2018-11-17 00:02:57', NULL),
(9, 1, 'abono', 2, 'CLIENTE DEPOSITA EFECTIVO', 12410.3, '2018-11-17 00:03:44', 'efectivo', NULL, NULL, 1, '2018-11-17 00:03:44', '2018-11-17 00:03:44', NULL),
(10, 1, 'cargo', 4, 'TRASPASO', 125, '2018-11-17 00:04:28', 'efectivo', NULL, NULL, 1, '2018-11-17 00:04:28', '2018-11-17 00:04:28', NULL),
(11, 1, 'abono', 5, 'INTERES DE TRASLADO Y', 124, '2018-11-17 00:05:03', 'efectivo', NULL, NULL, 1, '2018-11-17 00:05:03', '2018-11-17 00:05:03', NULL),
(12, 1, 'abono', 2, 'OPERACION D', 110, '2018-11-17 00:05:32', 'efectivo', NULL, NULL, 1, '2018-11-17 00:05:32', '2018-11-17 00:05:32', NULL),
(13, 1, 'abono', 2, 'ARQUEO INICIAL CUENTA', 122441, '2018-11-17 00:06:40', 'efectivo', NULL, NULL, 1, '2018-11-17 00:06:40', '2018-11-17 00:06:40', NULL),
(14, 1, 'cargo', 1, 'PROGRAMA SOCIAL', 1500.21, '2018-11-17 00:07:13', 'efectivo', NULL, NULL, 1, '2018-11-17 00:07:13', '2018-11-17 00:07:13', NULL),
(15, 3, 'abono', 2, 'SALDO INICIAL', 12450, '2018-11-17 00:07:55', 'efectivo', NULL, NULL, 1, '2018-11-17 00:07:55', '2018-11-17 00:07:55', NULL),
(16, 3, 'abono', 5, 'INTERES MENSUAL 125', 150, '2018-11-17 00:08:38', 'efectivo', NULL, NULL, 1, '2018-11-17 00:08:38', '2018-11-17 00:08:38', NULL),
(17, 2, 'abono', 5, 'INTERESES GANADOS EN EL PERIODO', 1520.35, '2018-11-17 08:44:29', 'efectivo', NULL, NULL, 1, '2018-11-17 08:44:29', '2018-11-17 08:44:29', NULL),
(18, 2, 'cargo', 1, 'XBOX ONE S BUEN FIN', 4500, '2018-11-17 09:00:05', 'efectivo', NULL, NULL, 1, '2018-11-17 09:00:05', '2018-11-17 09:00:05', NULL),
(19, 2, 'abono', 2, 'VENTA DE REFRESCOS', 850, '2018-11-17 09:01:40', 'efectivo', NULL, NULL, 1, '2018-11-17 09:01:40', '2018-11-17 09:01:40', NULL),
(20, 2, 'cargo', 1, 'PAGO', 550, '2018-11-17 09:35:06', 'efectivo', NULL, NULL, 1, '2018-11-17 09:35:06', '2018-11-17 09:35:06', NULL),
(21, 2, 'abono', 2, 'VENTA DE MOTO DE JUAN', 8950, '2018-11-17 09:35:40', 'efectivo', NULL, NULL, 1, '2018-11-17 09:35:40', '2018-11-17 09:35:40', NULL),
(22, 7, 'abono', 2, 'MOV INICIAL', 8500.2, '2018-11-20 23:41:59', 'efectivo', NULL, NULL, 1, '2018-11-20 23:41:59', '2018-11-20 23:41:59', NULL),
(23, 7, 'abono', 5, 'INTERESES DE REDITO', 144.1, '2018-11-20 23:43:44', 'efectivo', NULL, NULL, 1, '2018-11-20 23:43:44', '2018-11-20 23:43:44', NULL),
(24, 7, 'cargo', 1, 'XBOX ONE S 1TB', 4550.2, '2018-11-20 23:47:04', 'efectivo', NULL, NULL, 1, '2018-11-20 23:47:04', '2018-11-20 23:47:04', NULL),
(25, 7, 'abono', 6, 'REPOSICION EFECTIVO', 4550, '2018-11-20 23:51:16', 'transferencia', NULL, 'FR14444777', 1, '2018-11-20 23:51:16', '2018-11-20 23:51:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_26_233645_create_clientes_table', 2),
(4, '2018_10_27_054018_create_datcontactos_table', 3),
(5, '2018_10_27_054849_create_datcontactos_table', 4),
(6, '2018_10_27_222945_create_api_calls_count_table', 5),
(7, '2018_10_28_013850_create_direcciones_table', 6),
(8, '2018_10_28_223032_create_catdocumentos_table', 7),
(9, '2018_11_07_201450_create_permission_tables', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 1),
(3, 'App\\User', 2),
(5, 'App\\User', 2),
(3, 'App\\User', 4),
(5, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Administrar Roles y Permisos', 'web', '2018-11-08 03:59:22', '2018-11-08 04:57:04'),
(6, 'role-list', 'web', '2018-11-18 20:16:20', '2018-11-18 20:16:20'),
(7, 'role-create', 'web', '2018-11-18 20:16:20', '2018-11-18 20:16:20'),
(8, 'role-edit', 'web', '2018-11-18 20:16:20', '2018-11-18 20:16:20'),
(9, 'role-delete', 'web', '2018-11-18 20:16:20', '2018-11-18 20:16:20'),
(14, 'list-clientes', 'web', '2018-11-20 02:42:39', '2018-11-20 02:42:39'),
(15, 'permission-list', 'web', '2018-11-20 02:44:27', '2018-11-20 02:44:27'),
(16, 'clientes-list', 'web', '2018-11-20 02:54:59', '2018-11-20 02:54:59'),
(17, 'clientes-create', 'web', '2018-11-20 02:55:09', '2018-11-20 02:55:09'),
(18, 'clientes-edit', 'web', '2018-11-20 02:55:24', '2018-11-20 02:55:24'),
(19, 'clientes-delete', 'web', '2018-11-20 02:55:37', '2018-11-20 02:55:37'),
(20, 'permission-create', 'web', '2018-11-20 03:05:15', '2018-11-20 03:05:15'),
(21, 'permission-edit', 'web', '2018-11-20 03:05:23', '2018-11-20 03:05:23'),
(22, 'permission-delete', 'web', '2018-11-20 03:05:33', '2018-11-20 03:05:33'),
(23, 'empresas-list', 'web', '2018-11-20 03:14:02', '2018-11-20 03:14:02'),
(24, 'empresas-create', 'web', '2018-11-20 03:14:23', '2018-11-20 03:14:23'),
(25, 'empresas-edit', 'web', '2018-11-20 03:14:38', '2018-11-20 03:14:38'),
(26, 'empresas-delete', 'web', '2018-11-20 03:14:44', '2018-11-20 03:14:44'),
(27, 'catbancos-list', 'web', '2018-11-20 03:16:11', '2018-11-20 03:16:11'),
(28, 'catbancos-create', 'web', '2018-11-20 03:16:24', '2018-11-20 03:16:24'),
(29, 'catbancos-edit', 'web', '2018-11-20 03:16:34', '2018-11-20 03:16:34'),
(30, 'catbancos-delete', 'web', '2018-11-20 03:16:42', '2018-11-20 03:16:42'),
(31, 'catcuentas-list', 'web', '2018-11-20 03:17:39', '2018-11-20 03:17:39'),
(32, 'catcuentas-create', 'web', '2018-11-20 03:17:45', '2018-11-20 03:17:45'),
(33, 'catcuentas-edit', 'web', '2018-11-20 03:17:54', '2018-11-20 03:17:54'),
(34, 'catcuentas-delete', 'web', '2018-11-20 03:18:05', '2018-11-20 03:18:05'),
(35, 'movbancario-list', 'web', '2018-11-20 17:15:33', '2018-11-20 17:15:33'),
(36, 'movbancario-create', 'web', '2018-11-20 17:15:49', '2018-11-20 17:15:49'),
(37, 'movbancario-edit', 'web', '2018-11-20 17:16:09', '2018-11-20 17:16:09'),
(38, 'movbancario-delete', 'web', '2018-11-20 17:16:49', '2018-11-20 17:16:49'),
(39, 'documentos-list', 'web', '2018-11-21 04:35:19', '2018-11-21 04:35:19'),
(40, 'documentos-create', 'web', '2018-11-21 04:35:54', '2018-11-21 04:35:54'),
(41, 'documentos-edit', 'web', '2018-11-21 04:36:19', '2018-11-21 04:36:19'),
(42, 'documentos-delete', 'web', '2018-11-21 04:36:32', '2018-11-21 04:36:32'),
(43, 'contacto-list', 'web', '2018-11-21 04:39:47', '2018-11-21 04:39:47'),
(44, 'contacto-create', 'web', '2018-11-21 04:40:07', '2018-11-21 04:40:07'),
(45, 'contacto-edit', 'web', '2018-11-21 04:40:19', '2018-11-21 04:40:19'),
(46, 'contacto-delete', 'web', '2018-11-21 04:40:32', '2018-11-21 04:40:32'),
(47, 'direccion-list', 'web', '2018-11-21 04:48:27', '2018-11-21 04:48:27'),
(48, 'direccion-create', 'web', '2018-11-21 04:48:39', '2018-11-21 04:48:39'),
(49, 'direccion-edit', 'web', '2018-11-21 04:49:00', '2018-11-21 04:49:00'),
(50, 'direccion-delete', 'web', '2018-11-21 04:49:16', '2018-11-21 04:49:16'),
(51, 'cattmovimientos', 'web', '2018-11-21 05:59:27', '2018-11-21 05:59:27'),
(52, 'empdatfiscales-list', 'web', '2018-11-21 06:09:24', '2018-11-21 06:09:24'),
(53, 'empdatfiscales-create', 'web', '2018-11-21 06:09:37', '2018-11-21 06:09:37'),
(54, 'empdatfiscales-edit', 'web', '2018-11-21 06:09:51', '2018-11-21 06:09:51'),
(55, 'empdatfiscales-delete', 'web', '2018-11-21 06:10:05', '2018-11-21 06:10:05'),
(56, 'accomerciales-list', 'web', '2018-11-26 00:44:28', '2018-11-26 00:44:28'),
(57, 'accomerciales-create', 'web', '2018-11-26 00:44:44', '2018-11-26 00:44:44'),
(58, 'accomerciales-edit', 'web', '2018-11-26 00:45:00', '2018-11-26 00:45:00'),
(59, 'accomerciales-delete', 'web', '2018-11-26 00:45:21', '2018-11-26 00:45:21'),
(60, 'accomerciales-authorized', 'web', '2018-11-26 02:39:15', '2018-11-26 02:39:15'),
(61, 'accomerciales-supervised', 'web', '2018-11-26 06:38:32', '2018-11-26 06:38:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2018-11-08 03:58:52', '2018-11-08 03:58:52'),
(3, 'Consulta', 'web', '2018-11-10 03:39:18', '2018-11-20 03:10:50'),
(4, 'superadmin', 'web', '2018-11-20 02:11:05', '2018-11-20 02:11:05'),
(5, 'Gerente', 'web', '2018-11-21 07:15:21', '2018-11-26 06:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(6, 3),
(15, 3),
(16, 3),
(23, 3),
(31, 3),
(39, 3),
(47, 3),
(52, 3),
(2, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(46, 4),
(47, 4),
(48, 4),
(49, 4),
(50, 4),
(51, 4),
(52, 4),
(53, 4),
(54, 4),
(55, 4),
(56, 4),
(57, 4),
(58, 4),
(59, 4),
(60, 4),
(61, 4),
(6, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(52, 5),
(53, 5),
(54, 5),
(55, 5),
(56, 5),
(57, 5),
(58, 5),
(59, 5),
(60, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociocomercial`
--

CREATE TABLE `sociocomercial` (
  `id` int(11) NOT NULL,
  `cliente_id` int(10) DEFAULT NULL,
  `cliente_idcomercial` int(10) DEFAULT NULL,
  `comision` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `avatar`, `rol`, `created_at`, `updated_at`, `deleted_at`, `nombre`, `apellidos`, `cargo`) VALUES
(1, 'Moises Armando', 'armandoaguilar1@gmail.com', NULL, '$2y$10$P70ho1INDpruHsblAx1lXe9eJdtwDxG/RdVFI5oJTEvw5hIHV1ikq', 'NkI9ksLe2Fu5aeNSrtQ7kt5KsbP07o1ebUfuPXaxk03f6rO45TEHpqTeTBHD', '5be6e498b9f4ffoto1.jpg', 'admin', '2018-10-25 04:40:12', '2018-11-15 13:12:23', NULL, 'Moises Arando', 'Aguilar Mendoza', 'Ingeniero de Sistemas'),
(2, 'Ivan Aquino', 'ivanaquino@hotmail.com', NULL, '$2y$10$POgTJ64fZjs30TlcntiIPOaMOipSUwPJ4uGE1eyurzyF43XH7KS1e', 'vNF63xHmwz6sUFxLO9DmNJodlY7lmXrO9fPV8d8L3RosFMU6JRTyef72MQRz', NULL, 'admin', '2018-11-08 02:53:01', '2018-11-08 02:53:01', NULL, NULL, NULL, NULL),
(3, 'Roberto', 'robertocastillo@hotmail.com', NULL, '$2y$10$DL6Lrda1FhIUhRG7IdmzX.upN7iwk6AX.yEiW8ICKNtY.beKcAdGa', NULL, NULL, 'revisor', '2018-11-15 13:13:34', '2018-11-15 13:13:34', NULL, 'Roberto', 'Castillo', 'Supervisor General'),
(4, 'Usuario X', 'usuariox@hotmail.com', NULL, '$2y$10$n8Qj2VJsjsle0pCDQEATXObN6WQmu70VB/YewI82vSZYgjxCyJmS6', 'CHS9q9t5nVXwqmnkq6F4iQp5mYPYS3BYG5U4pbAmcclg3vxHlUQC5dN67Ayr', NULL, NULL, '2018-11-20 03:27:05', '2018-11-20 03:27:05', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acuerdoscomerciales`
--
ALTER TABLE `acuerdoscomerciales`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `sociocomer_id` (`sociocomer_id`) USING BTREE,
  ADD KEY `cliente_id` (`cliente_id`) USING BTREE,
  ADD KEY `direccion_id` (`direccion_id`) USING BTREE,
  ADD KEY `cuenta_id` (`cuenta_id`) USING BTREE,
  ADD KEY `elab_user_id` (`elab_user_id`) USING BTREE,
  ADD KEY `aut_user_id` (`aut_user_id`) USING BTREE,
  ADD KEY `aut_user2_id` (`aut_user2_id`) USING BTREE;

--
-- Indices de la tabla `ac_empresas`
--
ALTER TABLE `ac_empresas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `api_calls_count`
--
ALTER TABLE `api_calls_count`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `catcuentas`
--
ALTER TABLE `catcuentas`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `banco_id` (`banco_id`) USING BTREE,
  ADD KEY `cliente_id` (`cliente_id`) USING BTREE,
  ADD KEY `empresa_id` (`empresa_id`) USING BTREE;

--
-- Indices de la tabla `catdocumentos`
--
ALTER TABLE `catdocumentos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `tipodoc` (`tipodoc`) USING BTREE,
  ADD KEY `cliente_id` (`cliente_id`) USING BTREE,
  ADD KEY `empresa_id` (`empresa_id`) USING BTREE;

--
-- Indices de la tabla `catempresas`
--
ALTER TABLE `catempresas`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `catestados`
--
ALTER TABLE `catestados`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `catmunicipios`
--
ALTER TABLE `catmunicipios`
  ADD PRIMARY KEY (`id`,`id_edo`) USING BTREE,
  ADD KEY `fk_municipio_estado1_idx` (`id_edo`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `cattipodoc`
--
ALTER TABLE `cattipodoc`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `cattmovimiento`
--
ALTER TABLE `cattmovimiento`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `cat_bancos`
--
ALTER TABLE `cat_bancos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `datcontactos`
--
ALTER TABLE `datcontactos`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `datcontactos_cliente_id_foreign` (`cliente_id`) USING BTREE;

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `direcciones_cliente_id_foreign` (`cliente_id`) USING BTREE,
  ADD KEY `direcciones_estado_id_foreign` (`estado_id`) USING BTREE,
  ADD KEY `direcciones_municipio_id_foreign` (`municipio_id`) USING BTREE;

--
-- Indices de la tabla `emp_datfiscales`
--
ALTER TABLE `emp_datfiscales`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `empresa_id` (`empresa_id`) USING BTREE,
  ADD KEY `estado_id` (`estado_id`) USING BTREE,
  ADD KEY `municipio_id` (`municipio_id`) USING BTREE;

--
-- Indices de la tabla `mbanca`
--
ALTER TABLE `mbanca`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `cuenta_id` (`cuenta_id`) USING BTREE,
  ADD KEY `tmovimiento` (`tmovimiento`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`) USING BTREE,
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`) USING BTREE;

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`) USING BTREE,
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`) USING BTREE;

--
-- Indices de la tabla `sociocomercial`
--
ALTER TABLE `sociocomercial`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acuerdoscomerciales`
--
ALTER TABLE `acuerdoscomerciales`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ac_empresas`
--
ALTER TABLE `ac_empresas`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `api_calls_count`
--
ALTER TABLE `api_calls_count`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catcuentas`
--
ALTER TABLE `catcuentas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `catdocumentos`
--
ALTER TABLE `catdocumentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `catempresas`
--
ALTER TABLE `catempresas`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catestados`
--
ALTER TABLE `catestados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `catmunicipios`
--
ALTER TABLE `catmunicipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2458;

--
-- AUTO_INCREMENT de la tabla `cattipodoc`
--
ALTER TABLE `cattipodoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cattmovimiento`
--
ALTER TABLE `cattmovimiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cat_bancos`
--
ALTER TABLE `cat_bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `datcontactos`
--
ALTER TABLE `datcontactos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `emp_datfiscales`
--
ALTER TABLE `emp_datfiscales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mbanca`
--
ALTER TABLE `mbanca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdoscomerciales`
--
ALTER TABLE `acuerdoscomerciales`
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_1` FOREIGN KEY (`sociocomer_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_3` FOREIGN KEY (`direccion_id`) REFERENCES `direcciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_4` FOREIGN KEY (`cuenta_id`) REFERENCES `catcuentas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_5` FOREIGN KEY (`elab_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_6` FOREIGN KEY (`aut_user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `acuerdoscomerciales_ibfk_7` FOREIGN KEY (`aut_user2_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catcuentas`
--
ALTER TABLE `catcuentas`
  ADD CONSTRAINT `catcuentas_ibfk_1` FOREIGN KEY (`banco_id`) REFERENCES `cat_bancos` (`id`),
  ADD CONSTRAINT `catcuentas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `catcuentas_ibfk_3` FOREIGN KEY (`empresa_id`) REFERENCES `catempresas` (`id`);

--
-- Filtros para la tabla `catdocumentos`
--
ALTER TABLE `catdocumentos`
  ADD CONSTRAINT `catdocumentos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `catdocumentos_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `catempresas` (`id`),
  ADD CONSTRAINT `tipodoc` FOREIGN KEY (`tipodoc`) REFERENCES `cattipodoc` (`id`);

--
-- Filtros para la tabla `catmunicipios`
--
ALTER TABLE `catmunicipios`
  ADD CONSTRAINT `fk_municipio_estado1` FOREIGN KEY (`id_edo`) REFERENCES `catestados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datcontactos`
--
ALTER TABLE `datcontactos`
  ADD CONSTRAINT `datcontactos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `direcciones_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `catestados` (`id`),
  ADD CONSTRAINT `direcciones_municipio_id_foreign` FOREIGN KEY (`municipio_id`) REFERENCES `catmunicipios` (`id`);

--
-- Filtros para la tabla `emp_datfiscales`
--
ALTER TABLE `emp_datfiscales`
  ADD CONSTRAINT `emp_datfiscales_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `catempresas` (`id`),
  ADD CONSTRAINT `emp_datfiscales_ibfk_2` FOREIGN KEY (`estado_id`) REFERENCES `catestados` (`id`),
  ADD CONSTRAINT `emp_datfiscales_ibfk_3` FOREIGN KEY (`municipio_id`) REFERENCES `catmunicipios` (`id`);

--
-- Filtros para la tabla `mbanca`
--
ALTER TABLE `mbanca`
  ADD CONSTRAINT `mbanca_ibfk_1` FOREIGN KEY (`cuenta_id`) REFERENCES `catcuentas` (`id`),
  ADD CONSTRAINT `mbanca_ibfk_2` FOREIGN KEY (`tmovimiento`) REFERENCES `cattmovimiento` (`id`),
  ADD CONSTRAINT `mbanca_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
