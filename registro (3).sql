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


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
