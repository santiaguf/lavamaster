-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-04-2012 a las 17:44:26
-- Versión del servidor: 5.5.20
-- Versión de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_empleado` varchar(40) NOT NULL,
  `cedula_empleado` varchar(20) DEFAULT NULL,
  `salario_empleado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre_empleado`, `cedula_empleado`, `salario_empleado`) VALUES
(1, 'CARLOS ALBERTO RODRIGUEZ OSORIO', '18.593.427', '1350000'),
(2, 'LUIS CARLOS GONZALEZ GARCIA', '18.597.718', '580000'),
(3, 'HECTOR FABIAN LONDONO MARTINEZ', '18.397.044', '580000'),
(4, 'GABRIEL ALBERTO OSPINA VALENCIA', '9.695.313', '1500000'),
(5, 'JOSE FERNANDO GALEANO GIRALDO', '18.597.563', '580000'),
(6, 'VICTOR ALFONSO ESPINOZA TORO', '1.088.256.592', '566700'),
(7, 'FRANCISCO ANTONIO TABARES', '18.413.995', '580000'),
(8, 'HELMAN GAVIRIA PINZON', '10.110.300', '580000'),
(9, 'NARCES VELASQUEZ ALZATE', '18.596.385', '580000'),
(10, 'MARIA RUBIELA CASTANEDA ACEVEDO', '43.190.668', '1200000'),
(11, 'OSCAR OROZCO NORENA', '10.080.616', '2500000'),
(12, 'CARLOS MARIO VELASQUEZ YEPEZ', '10.001.399', '566700');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE IF NOT EXISTS `fichas` (
  `id_ficha` int(10) NOT NULL AUTO_INCREMENT,
  `numero_ficha` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cliente` varchar(40) DEFAULT NULL,
  `referencia` varchar(20) DEFAULT NULL,
  `nombre_proceso` varchar(30) DEFAULT NULL,
  `tipo_prenda` varchar(30) DEFAULT NULL,
  `cantidad_total` int(10) DEFAULT NULL,
  `cantidad_por_tanda` int(4) DEFAULT NULL,
  `peso_prenda` int(5) DEFAULT NULL,
  `peso_total` int(6) DEFAULT NULL,
  `cantidad_quimicos` int(2) DEFAULT NULL,
  `tandas` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_ficha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `numero_ficha`, `fecha`, `cliente`, `referencia`, `nombre_proceso`, `tipo_prenda`, `cantidad_total`, `cantidad_por_tanda`, `peso_prenda`, `peso_total`, `cantidad_quimicos`, `tandas`) VALUES
(3, 6060, '2012-04-20', 'bodega r y co', '911', 'ston - bleach', 'jean hombre', 100, 100, 650, 6500, 14, 2),
(4, 6061, '2012-04-20', 'incoc', '911', 'desengome', 'pantalon', 10, 2, 20, 200, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(6) NOT NULL AUTO_INCREMENT,
  `id_quimico` int(5) NOT NULL,
  `nombre_del_quimico` varchar(40) DEFAULT NULL,
  `cantidad` int(30) NOT NULL,
  `precio_total` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `id_quimico`, `nombre_del_quimico`, `cantidad`, `precio_total`, `fecha`) VALUES
(1, 1, ' Amarillo IRL Realtive', 4522, '5000', '2012-03-30'),
(2, 79, 'Amarillo Brillante X 3GC Recolctive', 755555522, '42542', '2012-03-30'),
(3, 87, 'Azul Supra RF-RL Megacion', 5252, '2525', '2012-04-22'),
(4, 26, 'Hermapon', 542242, '545', '2012-04-22'),
(5, 11, 'Acetico Glacial', 3000, '20000', '2012-04-22'),
(6, 20, 'Acido Oxalico', 3000, '12000', '2012-04-23'),
(7, 10, 'Antiquiebre Lb', 1400, '3200', '2012-04-23'),
(8, 61, 'Azul Marino Luz BL-X Novazol', 500, '12000', '2011-04-23'),
(9, 1, ' Amarillo IRL Realtive', 85555, '852', '2012-04-26'),
(10, 4, 'Dekol SN', 5000, '23000', '2012-04-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pago` int(10) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `nombre_empleado` varchar(30) NOT NULL,
  `id_empleado` int(3) DEFAULT NULL,
  `cedula_empleado` varchar(20) NOT NULL,
  `salario_base` int(11) NOT NULL,
  `valor_hora` int(11) NOT NULL,
  `dias_trabajados` int(3) NOT NULL,
  `subsidio_transporte` int(11) NOT NULL,
  `hed` int(11) NOT NULL,
  `hen` int(11) NOT NULL,
  `hef` int(11) NOT NULL,
  `rn` int(11) NOT NULL,
  `sumatoria_extras` int(11) DEFAULT NULL,
  `otros_pagos` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `aportes` int(11) NOT NULL,
  `netos` int(11) NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `fecha_inicial`, `fecha_final`, `nombre_empleado`, `id_empleado`, `cedula_empleado`, `salario_base`, `valor_hora`, `dias_trabajados`, `subsidio_transporte`, `hed`, `hen`, `hef`, `rn`, `sumatoria_extras`, `otros_pagos`, `subtotal`, `aportes`, `netos`) VALUES
(12, '2012-04-01', '2012-04-10', 'CARLOS ALBERTO RODRIGUEZ OSORI', 1, '18.593.427', 450000, 5625, 6, 22600, 14063, 0, 0, 0, 14063, 0, 486663, 37125, 449538),
(13, '2012-04-01', '2012-04-10', 'LUIS CARLOS GONZALEZ GARCIA', 2, '18.597.718', 193333, 2417, 6, 22600, 12083, 0, 0, 0, 12083, 0, 228017, 16433, 211583),
(15, '2012-04-01', '2012-04-10', 'HECTOR FABIAN LONDONO MARTINEZ', 3, '18.397.044', 193333, 2417, 6, 22600, 33229, 0, 21146, 0, 54375, 0, 270308, 19817, 250492),
(17, '2012-04-01', '2012-04-10', 'GABRIEL ALBERTO OSPINA VALENCI', 4, '9.695.313', 500000, 6250, 6, 22600, 31250, 0, 76563, 0, 107813, 0, 630413, 48625, 581788),
(18, '2012-04-01', '2012-04-10', 'FRANCISCO ANTONIO TABARES.', 7, '18.413.995', 193333, 2417, 6, 22600, 9063, 0, 0, 0, 9063, 0, 224996, 16192, 208804),
(19, '2012-04-01', '2012-04-10', 'JOSE FERNANDO GALEANO GIRALDO.', 5, '18.597.563', 173194, 2417, 6, 22600, 0, 0, 25375, 0, 25375, 0, 221169, 15886, 205284),
(21, '2012-04-01', '2012-04-10', 'VICTOR ALFONSO ESPINOZA TORO', 6, '1.088.256.592', 188900, 2361, 6, 22600, 14758, 0, 24793, 0, 39551, 0, 251051, 18276, 232775),
(22, '2012-04-01', '2012-04-10', 'NARCES VELASQUEZ ALZATE. ', 9, '18.596.385', 193333, 2417, 6, 22600, 0, 0, 0, 0, 0, 0, 215933, 15467, 200467),
(23, '2012-04-01', '2012-04-10', 'HELMAN GAVIRIA PINZON', 8, '10.110.300', 193333, 2417, 6, 22600, 15104, 0, 0, 0, 15104, 0, 231038, 16675, 214363),
(28, '2012-04-01', '2012-04-10', 'OSCAR OROZCO NORENA.', 11, '10.080.616', 833333, 10417, 6, 22600, 0, 0, 0, 0, 0, 0, 855933, 66667, 789267),
(29, '2012-04-01', '2012-04-10', 'CARLOS MARIO VELASQUEZ YEPZ.', 12, '10.001.399', 193333, 2417, 6, 22600, 0, 0, 0, 0, 0, 0, 215933, 15467, 200467),
(30, '2012-04-01', '2012-04-10', 'MARIA RUBIELA CASTANEDA ACEVED', 10, '43.190.668', 359167, 5000, 6, 22600, 0, 0, 0, 0, 0, 0, 381767, 32000, 349767),
(37, '2012-04-11', '2012-04-20', 'CARLOS ALBERTO RODRIGUEZ OSORI', 1, '18.593.427', 450000, 5625, 9, 22600, 31641, 0, 0, 0, 31641, 0, 504241, 38531, 465709),
(38, '2012-04-11', '2012-04-20', 'LUIS CARLOS GONZALEZ GARCIA', 2, '18.597.718', 193333, 2417, 9, 22600, 40781, 0, 0, 0, 40781, 0, 256715, 18729, 237985),
(39, '2012-04-11', '2012-04-20', 'HECTOR FABIAN LONDONO MARTINEZ', 3, '18.397.044', 193333, 2417, 9, 22600, 48333, 0, 0, 0, 48333, 0, 264267, 19333, 244933),
(40, '2012-04-11', '2012-04-20', 'GABRIEL ALBERTO OSPINA VALENCI', 4, '9.695.313', 500000, 6250, 9, 22600, 85938, 0, 0, 0, 85938, 0, 608538, 46875, 561663),
(42, '2012-04-11', '2012-04-20', 'CARLOS MARIO VELASQUEZ YEPEZ.', 12, '10.001.399', 188900, 2361, 9, 22600, 0, 0, 0, 0, 0, 0, 211500, 15112, 196388),
(46, '2012-04-11', '2012-04-20', 'JOSE FERNANDO GALEANO GIRALDO.', 5, '18.597.563', 134259, 2417, 7, 18080, 0, 0, 0, 0, 0, 0, 152339, 15467, 136873),
(47, '2012-04-11', '2012-04-20', 'VICTOR ALFONSO ESPINOZA TORO', 6, '1.088.256.592', 188900, 2361, 9, 22600, 5903, 0, 0, 0, 5903, 0, 217403, 15584, 201819),
(48, '2012-04-11', '2012-04-20', 'NARCES VELASQUEZ ALZATE. ', 9, '18.596.385', 193333, 2417, 9, 22600, 0, 0, 0, 0, 0, 0, 215933, 15467, 200467),
(49, '2012-04-11', '2012-04-20', 'OSCAR OROZCO NORENA.', 11, '10.080.616', 833333, 10417, 9, 22600, 0, 0, 0, 0, 0, 0, 855933, 66667, 789267),
(50, '2012-04-11', '2012-04-20', 'MARIA RUBIELA CASTANEDA ACEVED', 10, '43.190.668', 400000, 5000, 9, 22600, 0, 0, 0, 0, 0, 0, 422600, 32000, 390600),
(51, '2012-04-11', '2012-04-20', 'HELMAN GAVIRIA PINZON', 8, '10.110.300', 193333, 2417, 9, 22600, 15104, 0, 0, 0, 15104, 0, 231038, 16675, 214363),
(52, '2012-04-11', '2012-04-20', 'FRANCISCO ANTONIO TABARES.', 7, '18.413.995', 193333, 2417, 9, 22600, 37760, 0, 0, 0, 37760, 0, 253694, 18488, 235206);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(20) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(40) NOT NULL,
  `vendedor_encargado` varchar(30) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `departamento` varchar(30) DEFAULT NULL,
  `direccion` longtext,
  `telefono_fijo` varchar(20) DEFAULT NULL,
  `telefono_celular` varchar(20) DEFAULT NULL,
  `correo_proveedor` varchar(30) DEFAULT NULL,
  `sitio_web` varchar(40) DEFAULT NULL,
  `leadtime` longtext,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_empresa`, `vendedor_encargado`, `pais`, `ciudad`, `departamento`, `direccion`, `telefono_fijo`, `telefono_celular`, `correo_proveedor`, `sitio_web`, `leadtime`) VALUES
(1, 'Nasa', 'barack obama', 'USA', 'washintong', 'new york', 'casa blanca', '555123456', '3101234567', 'obama@usa.com', 'whitehouse.gov', '2 dias'),
(2, 'quimicos venezuela', 'hugo chavez frias', 'venezuela', 'caracas', 'caracas', 'casa simon bolivar', '3214566', '3015645856', 'hugo@chavez.org.ve', 'presidencia.org.ve', '3 dias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quimicos`
--

CREATE TABLE IF NOT EXISTS `quimicos` (
  `id_quimico` int(5) NOT NULL AUTO_INCREMENT,
  `nombre_quimico` varchar(40) CHARACTER SET latin1 NOT NULL,
  `proveedor_quimico` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `cantidad_quimico` int(20) DEFAULT NULL,
  `stock_minimo` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nombre_tecnico` varchar(30) DEFAULT NULL,
  `rotacion_compras` varchar(10) DEFAULT NULL,
  `rotacion_produccion` varchar(10) DEFAULT NULL,
  `empaque` varchar(20) DEFAULT NULL,
  `stock_maximo` int(30) DEFAULT NULL,
  `descripcion_quimico` longtext,
  `tipo_quimico` varchar(20) DEFAULT NULL,
  `peligrosidad` varchar(20) DEFAULT NULL,
  `consideracion_quimico` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_quimico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Volcado de datos para la tabla `quimicos`
--

INSERT INTO `quimicos` (`id_quimico`, `nombre_quimico`, `proveedor_quimico`, `cantidad_quimico`, `stock_minimo`, `nombre_tecnico`, `rotacion_compras`, `rotacion_produccion`, `empaque`, `stock_maximo`, `descripcion_quimico`, `tipo_quimico`, `peligrosidad`, `consideracion_quimico`, `color`) VALUES
(1, 'Indicat Color', 'Merquiand S.A.', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(2, 'Indesize 350 DLC N', 'Merquiand S.A.', 4730, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(3, 'Recolpal SFL - K', 'Recolquim', 4730, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(4, 'Dekol SN', 'Merquiand S.A.', 4680, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(5, 'Ecostone A', 'Recolquim', 9400, '6000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(6, 'Request AK', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Asugal PWA -C', 'Cecolor S.A.', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(8, 'Recolfix We Liq.', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Soda Liquida', 'Quimicos Pereira', 4480, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(10, 'Antiquiebre Lb', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(11, 'Acetico Glacial', 'Recolquim', 4800, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(12, 'Easysoft Escamas RC', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Hipoclorito De Sodio', 'Quimicos Del Otun', -11000, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(14, 'Oxidemin Rc', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Secuestrante APR', 'Cecolor S.A.', 4500, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(16, 'Recolfor BM Liquido', 'Recolquim', 2800, '2500', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(17, 'Establizador AWN', 'Recolquim', 4200, '3500', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(18, 'H202 50%', 'Recolquim', 4000, '3500', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(19, 'Metabisulfito De Sodio', 'Recolquim', 3800, '4000', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(20, 'Acido Oxalico', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(21, 'Sulfuro De Sodio', 'Quimicos Pereira', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Recolclear IDS', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Dextrosa Monohidratada', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Perlita Plus', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Sal Marina', 'William Guzman', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(26, 'Hermapon', 'Hermacolor S.A.', 542042, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Recolpur DSC', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Demnicol Pex', 'Innova Quimicos', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Demnicol Soft 4748', 'Innova Quimicos', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Negro NF 980%', 'Colorquimica S.A. - Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Azul  Recolzol 2F 250% ', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(32, 'Gris Novazol Luz  JB 150%', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Pardo Novazol Luz 2JM', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Skay Blue Recolsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Marino JC 130% Realsulf', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(36, 'Pardo RCA Recolsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Arena RF-1 Recolfix', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(38, 'Cafe DRC Novazol ', 'Colorquimica S.A.', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(39, 'Caqui RF Recolfix', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Caqui RF-2 Recolfix', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Gris RF - Rl 160% Recolfix', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Pardo CR 190% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Pardo JL Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Turqueza Gll 250% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Azul Brillante X. GNC Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Azul F0 210% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Verde Oscuro B Recolzol', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(48, 'Gris NGR 120% Recolzol', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(49, 'Verde 3B CF Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'Negro BR 200% Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Oliva TR-3 Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'CastaÃ±o FSB-W Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'AzulNegro RDT - 2B Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'CastaÃ±o GFB- G Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Gris 2RCF Realsulf ', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Fibrezyme RC Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Dark Browm RC Realsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'Solar Rojo Bar Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'Amarillo Oro XRNC Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Solar Naranja 7Jl-R Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Azul Marino Luz BL-X Novazol', 'Colorquimica S.A.', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(62, 'Solar Azul BRL Reccolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Marino BH 200% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Solar Amarillo 3GL Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 'Azul XGRD Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 'Gris Luz RB Novazol', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'Gris Luz 2JR Novazol', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 'Pardo M Com Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 'Escarlata BLN 280% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'Turqeuza XBC Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'Naranja S- Dos  Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'Caqui Luz 2J Novazol', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Escarlata SE 210% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Pardo Luz TR Novazol', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'Naranja X3 Lgc Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'Azul RF-BR Indosol', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(77, 'Oliva TS Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'Rojo X- 2BC Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'Amarillo Brillante X 3GC Recolctive', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(80, 'Solar Gris JR 150% Recolzol', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Negro BR Liq. 132% Novasulf', 'Colorquimica S.A.', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Pardo RF-R Recolfix', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'Rojo Recolctive', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, ' Amarillo IRL Realtive', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(85, 'Rojo IRL Realtive ', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(86, 'Azul IRL Realtive ', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(87, 'Azul Supra RF-RL Megacion', 'Recolquim', 5212, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'Amarillo Supra 3RS 150% Megacion', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(89, 'Amarillo BTE Supra 4GL 75% Megacion', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'Rojo Supra 6BS 150% Megacion', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 'Naranja Supra 4 RS 150% Megacion', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 'Turqueza Supra SG 150% Megacion', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(93, 'Recolclean PC', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, 'Alcali CDS - A2', 'Recolquim', 0, '0', '', 'bajo', 'bajo', 'carton', NULL, '', 'solido', 'baja', 'noesnocivo', ''),
(95, 'Naranja RDT - GR Recolsulf', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, 'Caqui RDT -GN Recolsulf ', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, 'Pardo RDT- RC Recolsulf ', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'Rojo RDT - 2B Recolsulf ', 'Recolquim', 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subprocesos`
--

CREATE TABLE IF NOT EXISTS `subprocesos` (
  `id_subproceso` int(8) NOT NULL AUTO_INCREMENT,
  `nombre_subproceso` varchar(20) NOT NULL,
  `quimico_usado` varchar(20) NOT NULL,
  `nombre_quimico_usado` varchar(30) DEFAULT NULL,
  `cantidad_usada` int(8) NOT NULL,
  `numero_ficha` int(8) NOT NULL,
  PRIMARY KEY (`id_subproceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `subprocesos`
--

INSERT INTO `subprocesos` (`id_subproceso`, `nombre_subproceso`, `quimico_usado`, `nombre_quimico_usado`, `cantidad_usada`, `numero_ficha`) VALUES
(53, 'bleach', '14', NULL, 140, 4408),
(54, 'bleach', '15', NULL, 500, 4408),
(55, 'bleach', '15', NULL, 200, 4408),
(56, 'neutralizado', '16', NULL, 500, 4408),
(57, 'neutralizado', '16', NULL, 650, 4408),
(58, 'bleach', '15', NULL, 20, 4885),
(59, 'bleach', '14', NULL, 10, 4885),
(60, 'desengome', '16', NULL, 10, 4885),
(61, 'desengome', '4', NULL, 100, 12),
(62, 'caustificado', '4', NULL, 20, 21),
(63, 'caustificado', '4', NULL, 55, 52),
(64, 'stone', '9', NULL, 9000, 5787),
(65, 'desengome', '1', NULL, 5000, 5787),
(66, 'bleach', '7', NULL, 9000, 5787),
(67, 'desengome', '84', NULL, 100, 3445),
(68, 'desengome', '100', NULL, 100, 3445),
(69, 'bleach', '11', NULL, 100, 3445),
(70, 'blanqueo', '94', NULL, 100, 3445),
(71, 'fijado', '79', NULL, 200, 3445),
(72, 'caustificado', '1', 'Indicat Color', 135, 6060),
(73, 'caustificado', '2', 'Indesize 350 DLC N', 135, 6060),
(74, 'caustificado', '5', 'Ecostone A', 300, 6060),
(75, 'stone', '4', NULL, 135, 6060),
(76, 'bleach', '9', NULL, 160, 6060),
(77, 'bleach', '13', NULL, 8000, 6060),
(78, 'neutralizado', '19', NULL, 600, 6060),
(79, 'blanqueo', '9', NULL, 100, 6060),
(80, 'blanqueo', '16', NULL, 100, 6060),
(81, 'blanqueo', '18', NULL, 500, 6060),
(82, 'blanqueo', '17', NULL, 150, 6060),
(83, 'blanqueo', '15', NULL, 250, 6060),
(84, 'neutralizado', '26', NULL, 100, 6060),
(85, 'stone', '11', NULL, 90, 6060),
(86, 'stone', '11', 'Acetico Glacial', 10, 6061),
(87, 'caustificado', '87', 'Azul Supra RF-RL Megacion', 20, 6061),
(88, 'caustificado', '4', 'Dekol SN', 25, 6061);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` int(10) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nick` (`nick`,`pass`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `fecha`, `nick`, `pass`, `mail`, `ip`) VALUES
(2, 1328716030, 'admin', 'b9c5108183cc0b5e0adb4f908676eed8', 'exactlimon@gmail.com', '127.0.0.1'),
(3, 1331046695, 'felipe', '75614d56e16db556b48b6cd583e376c5', 'arroya511@hotmail.com', '127.0.0.1'),
(4, 1331053416, 'alexgar74', 'ac474944d9e9c642feefa1730b9ce32f', 'alexgar7410@gmail.com', '127.0.0.1'),
(5, 1331226698, 'oscar', 'e65a682e803604e9fc9906a54bb97cf6', 'oscarorozcon@hotmail.com', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
