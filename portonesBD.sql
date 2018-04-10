-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2013 a las 02:55:07
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `portones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` smallint(6) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Esta tabla guardara las categorias de los productos' AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `estatus`, `nombre`) VALUES
(6, '', 0, 'Equipos'),
(7, '', 0, 'Accesorios'),
(8, '', 0, 'Herrajes'),
(9, '', 0, 'Refacciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `telefono` int(20) DEFAULT '0',
  `total_cotizacion` decimal(16,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id`, `correo`, `fecha`, `nombre`, `telefono`, `total_cotizacion`) VALUES
(1, 'david@hotamail.com', '2013-05-01', 'david', 2147483647, '39.0000'),
(2, 'david@hotamail.com', '2013-05-01', 'David Gastelum', 76449932, '34.0000'),
(3, 'david@hotamail.com', '2013-05-01', 'David Gastelum', 2147483647, '25.0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_detalle`
--

CREATE TABLE IF NOT EXISTS `cotizacion_detalle` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cotizacion_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` decimal(16,4) DEFAULT '0.0000',
  `precio` decimal(16,4) DEFAULT '0.0000',
  `unidad` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `cotizacion_detalle`
--

INSERT INTO `cotizacion_detalle` (`id`, `cotizacion_id`, `producto_id`, `cantidad`, `precio`, `unidad`, `fecha`) VALUES
(1, 1, 1721, '15.0000', '1.0000', 'Kit', '2013-05-01'),
(2, 1, 1724, '12.0000', '1.0000', 'Kit', '2013-05-01'),
(3, 1, 1713, '12.0000', '1.0000', 'Kit', '2013-05-01'),
(4, 2, 1720, '14.0000', '1.0000', 'Kit', '2013-05-01'),
(5, 2, 1719, '13.0000', '1.0000', 'Kit', '2013-05-01'),
(6, 2, 1785, '5.0000', '1.0000', 'Kit', '2013-05-01'),
(7, 2, 1854, '2.0000', '1.0000', 'Kit', '2013-05-01'),
(8, 3, 1723, '4.0000', '1.0000', 'Kit', '2013-05-01'),
(9, 3, 1724, '3.0000', '1.0000', 'Kit', '2013-05-01'),
(10, 3, 1713, '4.0000', '1.0000', 'Kit', '2013-05-01'),
(11, 3, 1743, '2.0000', '1.0000', 'Kit', '2013-05-01'),
(12, 3, 1807, '3.0000', '1.0000', 'Kit', '2013-05-01'),
(13, 3, 1872, '2.0000', '1.0000', 'Kit', '2013-05-01'),
(14, 3, 1723, '7.0000', '1.0000', 'Kit', '2013-05-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` smallint(6) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `eventos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) NOT NULL DEFAULT '0',
  `codigo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `moneda` int(11) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  `precio` decimal(16,4) DEFAULT '0.0000',
  `precio_moneda_nacional` decimal(16,4) DEFAULT '0.0000',
  `unidad` varchar(50) DEFAULT NULL,
  `tipo_cambio` decimal(16,4) NOT NULL DEFAULT '1.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Esta tabla guardara el cotenido de los productos' AUTO_INCREMENT=1973 ;

--
-- Volcar la base de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `codigo`, `descripcion`, `imagen`, `nombre`, `moneda`, `fecha`, `precio`, `precio_moneda_nacional`, `unidad`, `tipo_cambio`) VALUES
(1708, 6, '0000000002', NULL, 'imagenes/productos/default.png', 'KIT RECEPTOR C/2 CONTROLES SAMARS', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1709, 6, '0000000003', NULL, 'imagenes/productos/default.png', 'KIT ABREPUERTAS LIFTMASTER MOD.1210 C/RIEL Y 2 CON', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1710, 6, '0000000008', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta Craftsman 1/2 hp c/riel y 2 control', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1711, 6, '0000000009', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta chamberlain 1/2 hp c/riel y 2 contr', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1712, 6, '0000000010', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta Chamberlain 3/4 hp c/riel y 2 contr', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1713, 6, '0000000011', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta 1/2 hp, riel y 2 controles', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1714, 6, '0000000012', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta Liftmaster Mod 3275 3/4 hp c/riel y', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1715, 6, '0000000013', NULL, 'imagenes/productos/default.png', 'Kit Abrepuerta Liftmaster Mod 8360 3/4 hp c/riel y', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1716, 6, '0000000014', NULL, 'imagenes/productos/default.png', 'Kit Pistones Euro Bat', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1717, 6, '0000000015', NULL, 'imagenes/productos/default.png', 'Kit Abrepuertas BMT Modelo 5011', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1718, 6, '0000000235', NULL, 'imagenes/productos/default.png', 'Kit Abrepuertas Liftmaster Mod.311 c/riel y 2 cont', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1719, 6, '0000000240', NULL, 'imagenes/productos/default.png', 'Kit Motor Axial I', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1720, 7, '0000000004', NULL, 'imagenes/productos/default.png', 'CONTROL 315MHZ 3CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1721, 7, '0000000005', NULL, 'imagenes/productos/default.png', 'CONTROL 390 MHZ FV 3CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1722, 7, '0000000073', NULL, 'imagenes/productos/default.png', 'Control 315 Luxe', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1723, 7, '0000000074', NULL, 'imagenes/productos/default.png', 'Control Frec.315 4CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1724, 7, '0000000076', NULL, 'imagenes/productos/default.png', 'Control Frec. 315 1CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1725, 7, '0000000077', NULL, 'imagenes/productos/default.png', 'Control 315 MHZ. Llavero', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1726, 7, '0000000078', NULL, 'imagenes/productos/default.png', 'Control 390 Mhz.Ambar 1CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1727, 7, '0000000079', NULL, 'imagenes/productos/default.png', 'Control Almatic', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1728, 7, '0000000080', NULL, 'imagenes/productos/default.png', 'Control General Code', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1729, 7, '0000000081', NULL, 'imagenes/productos/default.png', 'Control Genius Digital', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1730, 7, '0000000082', NULL, 'imagenes/productos/default.png', 'Control Genius Pines', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1731, 7, '0000000083', NULL, 'imagenes/productos/default.png', 'Control Linear', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1732, 7, '0000000084', NULL, 'imagenes/productos/default.png', 'Control Multi Code', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1733, 7, '0000000085', NULL, 'imagenes/productos/default.png', 'Control Multifrecuencia LM 1CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1734, 7, '0000000086', NULL, 'imagenes/productos/default.png', 'Control Multifrecuencia LM 3CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1735, 7, '0000000087', NULL, 'imagenes/productos/default.png', 'Control 390 Mhz Rojo 1CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1736, 7, '0000000088', NULL, 'imagenes/productos/default.png', 'Control 390 Mhz Rojo 2CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1737, 7, '0000000089', NULL, 'imagenes/productos/default.png', 'Control Universal 1CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1738, 7, '0000000091', NULL, 'imagenes/productos/default.png', 'Control Vector', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1739, 7, '0000000092', NULL, 'imagenes/productos/default.png', 'Dispositivo Internet', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1740, 7, '0000000115', NULL, 'imagenes/productos/default.png', 'Llave Digital 315', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1741, 7, '0000000116', NULL, 'imagenes/productos/default.png', 'Llave Digital Ambar', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1742, 7, '0000000117', NULL, 'imagenes/productos/default.png', 'Llave Digital Multifrecuencia', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1743, 7, '0000000134', NULL, 'imagenes/productos/default.png', 'Receptor Euro Bat Digital', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1744, 7, '0000000135', NULL, 'imagenes/productos/default.png', 'Receptor Euro Bat Pines', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1745, 7, '0000000136', NULL, 'imagenes/productos/default.png', 'Receptor Metalico 390', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1746, 7, '0000000137', NULL, 'imagenes/productos/default.png', 'Receptor Metalico 315', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1747, 7, '0000000138', NULL, 'imagenes/productos/default.png', 'Kit Receptor General Code c/2 controles', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1748, 7, '0000000139', NULL, 'imagenes/productos/default.png', 'Receptor Multi Code', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1749, 7, '0000000140', NULL, 'imagenes/productos/default.png', 'Receptor Multifrecuencia Liftmaster', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1750, 7, '0000000141', NULL, 'imagenes/productos/default.png', 'Receptor Star 450 F390', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1751, 7, '0000000142', NULL, 'imagenes/productos/default.png', 'Receptor Star 450 F315', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1752, 7, '0000000143', NULL, 'imagenes/productos/default.png', 'Receptor Universal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1753, 7, '0000000253', NULL, 'imagenes/productos/default.png', 'Control 390 Mhz. Ambar 3CH', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1754, 7, '0000000256', NULL, 'imagenes/productos/default.png', 'Llave Digital Universal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1755, 7, '0000000264', NULL, 'imagenes/productos/default.png', 'Jaladeras Para Puerta de Emergencia', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1756, 8, '0000000006', NULL, 'imagenes/productos/default.png', 'CAJA DE HERRAJE 10X8 RICHARD WILCOXS', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1757, 8, '0000000007', NULL, 'imagenes/productos/default.png', 'RIEL 8'' CAL. 14', 0, NULL, '1.0000', '1.0000', 'Pza', '1.0000'),
(1758, 8, '0000000016', 'Descripcion', 'imagenes/productos/dia del padre amor corazon hijos.jpg', 'Angulo perforado', 0, '2013-04-30', '1.0000', '1.0000', 'Kit', '1.0000'),
(1759, 8, '0000000017', NULL, 'imagenes/productos/default.png', 'Banderas Derechas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1760, 8, '0000000018', NULL, 'imagenes/productos/default.png', 'Banderas Izquierdas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1761, 8, '0000000023', NULL, 'imagenes/productos/default.png', 'Bisagra Superior Balero', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1762, 8, '0000000024', NULL, 'imagenes/productos/default.png', 'Bisagra Superior Balero Reforzada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1763, 8, '0000000025', NULL, 'imagenes/productos/default.png', 'Bisagra No.1 Corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1764, 8, '0000000026', NULL, 'imagenes/productos/default.png', 'Bisagra No.1 Larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1765, 8, '0000000027', NULL, 'imagenes/productos/default.png', 'Bisagra No.1 Reforzada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1766, 8, '0000000028', NULL, 'imagenes/productos/default.png', 'Bisagra No.2 Corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1767, 8, '0000000029', NULL, 'imagenes/productos/default.png', 'Bisagra No.2 Larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1768, 8, '0000000030', NULL, 'imagenes/productos/default.png', 'Bisagra No.2 Reforzada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1769, 8, '0000000031', NULL, 'imagenes/productos/default.png', 'Bisagra No.3 Corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1770, 8, '0000000032', NULL, 'imagenes/productos/default.png', 'Bisagra No.3 Larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1771, 8, '0000000033', NULL, 'imagenes/productos/default.png', 'Bisagra No.3 Reforzada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1772, 8, '0000000034', NULL, 'imagenes/productos/default.png', 'Bisagra No.4 Corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1773, 8, '0000000035', NULL, 'imagenes/productos/default.png', 'Bisagra No. 4 Larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1774, 8, '0000000036', NULL, 'imagenes/productos/default.png', 'Bisagra No.4 Reforzada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1775, 8, '0000000037', NULL, 'imagenes/productos/default.png', 'Bisagra No. 5 Larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1776, 8, '0000000038', NULL, 'imagenes/productos/default.png', 'Bisagra Maroma par', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1777, 8, '0000000039', NULL, 'imagenes/productos/default.png', 'Bisagra Maroma Reforzada Par', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1778, 8, '0000000040', NULL, 'imagenes/productos/default.png', 'Bisagra Inferior Derecha', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1779, 8, '0000000041', NULL, 'imagenes/productos/default.png', 'Bisagra Inferior Izquierda', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1780, 8, '0000000042', NULL, 'imagenes/productos/default.png', 'Bisagras Locas Par', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1781, 8, '0000000043', NULL, 'imagenes/productos/default.png', 'Bolsa de Pijas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1782, 8, '0000000044', NULL, 'imagenes/productos/default.png', 'Bolsa Tornillera', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1783, 8, '0000000045', NULL, 'imagenes/productos/default.png', 'Botonera de Pared', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1784, 8, '0000000046', NULL, 'imagenes/productos/default.png', 'Botonera Industrial', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1785, 8, '0000000051', NULL, 'imagenes/productos/default.png', 'Cable Acero 7 pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1786, 8, '0000000052', NULL, 'imagenes/productos/default.png', 'Cable Acero 8 pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1787, 8, '0000000053', NULL, 'imagenes/productos/default.png', 'Cable Acero 9 pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1788, 8, '0000000054', NULL, 'imagenes/productos/default.png', 'Cable Acero 10 pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1789, 8, '0000000055', NULL, 'imagenes/productos/default.png', 'Cable Acero 12 pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1790, 8, '0000000059', NULL, 'imagenes/productos/default.png', 'Caja de herraje 9 x 7', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1791, 8, '0000000060', NULL, 'imagenes/productos/default.png', 'Caja de herraje 9 x 8', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1792, 8, '0000000061', NULL, 'imagenes/productos/default.png', 'Caja de herraje 10 x 8', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1793, 8, '0000000111', NULL, 'imagenes/productos/default.png', 'Llanta blanca corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1794, 8, '0000000112', NULL, 'imagenes/productos/default.png', 'Llanta blanca larga', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1795, 8, '0000000113', NULL, 'imagenes/productos/default.png', 'Llanta negra corta', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1796, 8, '0000000114', NULL, 'imagenes/productos/default.png', 'Llanta Metalica', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1797, 8, '0000000122', NULL, 'imagenes/productos/default.png', 'Placa Superior Central', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1798, 8, '0000000123', NULL, 'imagenes/productos/default.png', 'Placa Superior  Derecha', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1799, 8, '0000000124', NULL, 'imagenes/productos/default.png', 'Placa Superior  Izquierda', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1800, 8, '0000000128', NULL, 'imagenes/productos/default.png', 'Polea Seccionada Ancha  Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1801, 8, '0000000129', NULL, 'imagenes/productos/default.png', 'Polea Seccionada Ancha  Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1802, 8, '0000000130', NULL, 'imagenes/productos/default.png', 'Polea Seccionada Chica Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1803, 8, '0000000131', NULL, 'imagenes/productos/default.png', 'Polea Seccionada Chica Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1804, 8, '0000000132', NULL, 'imagenes/productos/default.png', 'Polea Vertical Lift Derecha', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1805, 8, '0000000133', NULL, 'imagenes/productos/default.png', 'Polea Vertical Lift Izquierda', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1806, 8, '0000000146', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 20 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1807, 8, '0000000147', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 20 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1808, 8, '0000000148', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 22 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1809, 8, '0000000149', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 22 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1810, 8, '0000000150', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 27 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1811, 8, '0000000151', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Amarillo 27 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1812, 8, '0000000152', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 30 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1813, 8, '0000000153', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 30 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1814, 8, '0000000154', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 34 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1815, 8, '0000000155', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 34 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1816, 8, '0000000156', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 36 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1817, 8, '0000000157', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Azul 36 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1818, 8, '0000000158', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Blanco 22 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1819, 8, '0000000159', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Blanco 22 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1820, 8, '0000000160', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Blanco 25 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1821, 8, '0000000161', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Blanco 25 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1822, 8, '0000000162', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Cafe 31 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1823, 8, '0000000163', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Cafe 31 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1824, 8, '0000000164', NULL, 'imagenes/productos/default.png', 'Resorte Maroma P328', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1825, 8, '0000000165', NULL, 'imagenes/productos/default.png', 'Resorte Maroma P528', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1826, 8, '0000000166', NULL, 'imagenes/productos/default.png', 'Resorte Maroma P728', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1827, 8, '0000000167', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 30 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1828, 8, '0000000168', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 30 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1829, 8, '0000000169', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 33 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1830, 8, '0000000170', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 33 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1831, 8, '0000000171', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 38 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1832, 8, '0000000172', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Dorado 38 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1833, 8, '0000000173', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Naranja 34 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1834, 8, '0000000174', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Naranja 34 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1835, 8, '0000000175', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Naranja 45 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1836, 8, '0000000176', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Rojo 23 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1837, 8, '0000000177', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Rojo 23 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1838, 8, '0000000178', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Rojo 30 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1839, 8, '0000000179', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Rojo 30 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1840, 8, '0000000180', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Verde 27 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1841, 8, '0000000181', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Verde 27 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1842, 8, '0000000182', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Verde 33 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1843, 8, '0000000183', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Verde 33 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1844, 8, '0000000184', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Verde 41 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1845, 8, '0000000185', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Violeta 45 Der', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1846, 8, '0000000186', NULL, 'imagenes/productos/default.png', 'Resorte Torsion Violeta 45 Izq', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1847, 8, '0000000187', NULL, 'imagenes/productos/default.png', 'Resorte Extension Azul 140', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1848, 8, '0000000188', NULL, 'imagenes/productos/default.png', 'Resorte Extension Blanco 110', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1849, 8, '0000000189', NULL, 'imagenes/productos/default.png', 'Resorte Extension Café 160', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1850, 8, '0000000190', NULL, 'imagenes/productos/default.png', 'Resorte Extension Crema 100', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1851, 8, '0000000191', NULL, 'imagenes/productos/default.png', 'Resorte Extension Naranja 170', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1852, 8, '0000000192', NULL, 'imagenes/productos/default.png', 'Resorte Extension Rojo 150', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1853, 8, '0000000193', NULL, 'imagenes/productos/default.png', 'Resorte Extension Verde 120', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1854, 8, '0000000194', NULL, 'imagenes/productos/default.png', 'Riel 7 Pies Angulo Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1855, 8, '0000000195', NULL, 'imagenes/productos/default.png', 'Riel 7 Pies Angulo Extra Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1856, 8, '0000000196', NULL, 'imagenes/productos/default.png', 'Riel 8 Pies Angulo Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1857, 8, '0000000197', NULL, 'imagenes/productos/default.png', 'Riel 8 Pies Angulo Extra Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1858, 8, '0000000198', NULL, 'imagenes/productos/default.png', 'Riel 8 Pies Angulo Extra Grande Reforzado', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1859, 8, '0000000199', NULL, 'imagenes/productos/default.png', 'Riel 8 Pies Calibre 14', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1860, 8, '0000000200', NULL, 'imagenes/productos/default.png', 'Riel 9 Pies Angulo Extra Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1861, 8, '0000000201', NULL, 'imagenes/productos/default.png', 'Riel 10 Pies Angulo Extra Grande', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1862, 8, '0000000217', NULL, 'imagenes/productos/default.png', 'Tubo 10 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1863, 8, '0000000218', NULL, 'imagenes/productos/default.png', 'Tubo 12 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1864, 8, '0000000219', NULL, 'imagenes/productos/default.png', 'Tubo 14 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1865, 8, '0000000220', NULL, 'imagenes/productos/default.png', 'Tubo 16 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1866, 8, '0000000221', NULL, 'imagenes/productos/default.png', 'Tubo 18 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1867, 8, '0000000222', NULL, 'imagenes/productos/default.png', 'Tubo 20 Pies cal.11', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1868, 8, '0000000223', NULL, 'imagenes/productos/default.png', 'Tubo 20 Pies Calibre 14', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1869, 8, '0000000224', NULL, 'imagenes/productos/default.png', 'Vertical 7 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1870, 8, '0000000225', NULL, 'imagenes/productos/default.png', 'Vertical 8 Pies', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1871, 8, '0000000226', NULL, 'imagenes/productos/default.png', 'Bisagra Inferior Cable Cal.11 PAR', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1872, 8, '0000000227', NULL, 'imagenes/productos/default.png', 'BISAGRA INFERIOR CABLE CAL.11 PAR', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1873, 8, '0000000228', NULL, 'imagenes/productos/default.png', 'Placa superior cal.11 derecha', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1874, 8, '0000000229', NULL, 'imagenes/productos/default.png', 'Placa superior cal.11 izquierda', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1875, 8, '0000000230', NULL, 'imagenes/productos/default.png', 'Pijas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1876, 8, '0000000231', NULL, 'imagenes/productos/default.png', 'Resorte Extension Amarillo 130', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1877, 8, '0000000232', NULL, 'imagenes/productos/default.png', 'POLEA PARA BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1878, 8, '0000000234', NULL, 'imagenes/productos/default.png', 'Bolsa de Pijas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1879, 8, '0000000236', NULL, 'imagenes/productos/default.png', 'KIT DE HERRAJE 12X8', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1880, 8, '0000000237', NULL, 'imagenes/productos/default.png', 'kit de Herraje 20x8 cal.11', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1881, 8, '0000000238', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 16x8 5 secc', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1882, 8, '0000000239', NULL, 'imagenes/productos/default.png', 'Riel 8 Pies Angulo Corto', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1883, 8, '0000000247', NULL, 'imagenes/productos/default.png', 'Bisagras superior par', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1884, 8, '0000000248', NULL, 'imagenes/productos/default.png', 'Bisagras superior par', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1885, 8, '0000000265', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 20x8 5 Secc ', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1886, 8, '0000000267', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 18x8 5 secc', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1887, 8, '0000000268', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 10x8 5 secciones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1888, 8, '0000000270', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 12x8 5 secciones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1889, 8, '0000000271', NULL, 'imagenes/productos/default.png', 'Kit de Herraje, 14x8 5 secciones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1890, 8, '0000000273', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 20x8 5 secciones S', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1891, 8, '0000000275', NULL, 'imagenes/productos/default.png', 'Kit de Herraje 20x8 5 secciones R', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1892, 8, '0000000276', NULL, 'imagenes/productos/default.png', 'Kit de Herrajes, 10x8 4 Secc', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1893, 9, '0000000019', NULL, 'imagenes/productos/default.png', 'Bases Fotoceldas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1894, 9, '0000000020', NULL, 'imagenes/productos/default.png', 'Base Para Motor', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1895, 9, '0000000021', NULL, 'imagenes/productos/default.png', 'Bateria Cilindrica', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1896, 9, '0000000022', NULL, 'imagenes/productos/default.png', 'Bateria Plana', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1897, 9, '0000000047', NULL, 'imagenes/productos/default.png', 'Bujes Nylamid', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1898, 9, '0000000048', NULL, 'imagenes/productos/default.png', 'Bujes Metalicos', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1899, 9, '0000000049', NULL, 'imagenes/productos/default.png', 'Bujes Bronce', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1900, 9, '0000000050', NULL, 'imagenes/productos/default.png', 'Cabezal de Motor', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1901, 9, '0000000056', NULL, 'imagenes/productos/default.png', 'Cableado Motor', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1902, 9, '0000000057', NULL, 'imagenes/productos/default.png', 'Cadena para Abrepuertas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1903, 9, '0000000058', NULL, 'imagenes/productos/default.png', 'Chicote cadena p/abrepuertas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1904, 9, '0000000062', NULL, 'imagenes/productos/default.png', 'Caja Para Euro Bat', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1905, 9, '0000000063', NULL, 'imagenes/productos/default.png', 'Campanas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1906, 9, '0000000064', NULL, 'imagenes/productos/default.png', 'Capacitor BFT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1907, 9, '0000000065', NULL, 'imagenes/productos/default.png', 'Capacitor FAAC', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1908, 9, '0000000066', NULL, 'imagenes/productos/default.png', 'Carrito para riel T', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1909, 9, '0000000067', NULL, 'imagenes/productos/default.png', 'Carrito para riel Cuadrado', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1910, 9, '0000000068', NULL, 'imagenes/productos/default.png', 'Carrito p/ mod. 711', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1911, 9, '0000000069', NULL, 'imagenes/productos/default.png', 'Cerebro Euro Bat', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1912, 9, '0000000070', NULL, 'imagenes/productos/default.png', 'Chapa Destrabadora', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1913, 9, '0000000071', NULL, 'imagenes/productos/default.png', 'Chapa Electronica FAAC', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1914, 9, '0000000072', NULL, 'imagenes/productos/default.png', 'Chapa Euro Bat', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1915, 9, '0000000093', NULL, 'imagenes/productos/default.png', 'Engrane', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1916, 9, '0000000094', NULL, 'imagenes/productos/default.png', 'Engrane Corona O', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1917, 9, '0000000095', NULL, 'imagenes/productos/default.png', 'Engrane punta de flecha', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1918, 9, '0000000096', NULL, 'imagenes/productos/default.png', 'Engrane Sinfin', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1919, 9, '0000000097', NULL, 'imagenes/productos/default.png', 'Flecha Completa 8 D delgada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1920, 9, '0000000098', NULL, 'imagenes/productos/default.png', 'Flecha Completa 8 D delgada O', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1921, 9, '0000000099', NULL, 'imagenes/productos/default.png', 'Flecha Completa 8 D Normal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1922, 9, '0000000100', NULL, 'imagenes/productos/default.png', 'Flecha Completa 8 D Normal O', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1923, 9, '0000000101', NULL, 'imagenes/productos/default.png', 'Flecha Completa 10 D delgada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1924, 9, '0000000102', NULL, 'imagenes/productos/default.png', 'Flecha Completa 10 D Normal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1925, 9, '0000000103', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 8 D Normal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1926, 9, '0000000104', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 8 D Normal O', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1927, 9, '0000000105', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 8 D delgada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1928, 9, '0000000106', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 8D delgada O', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1929, 9, '0000000107', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 10 D delgada', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1930, 9, '0000000108', NULL, 'imagenes/productos/default.png', 'Flecha c/buje 10 D Normal', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1931, 9, '0000000109', NULL, 'imagenes/productos/default.png', 'Fotoceldas Jgo.', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1932, 9, '0000000110', NULL, 'imagenes/productos/default.png', 'Lampara Para Pistones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1933, 9, '0000000118', NULL, 'imagenes/productos/default.png', 'Limite.', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1934, 9, '0000000119', NULL, 'imagenes/productos/default.png', 'Micas Craftsman', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1935, 9, '0000000120', NULL, 'imagenes/productos/default.png', 'Micas redondas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1936, 9, '0000000121', NULL, 'imagenes/productos/default.png', 'Pichanchas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1937, 9, '0000000125', NULL, 'imagenes/productos/default.png', 'Polea Final Cadena', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1938, 9, '0000000126', NULL, 'imagenes/productos/default.png', 'Polea Final Chicote', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1939, 9, '0000000127', NULL, 'imagenes/productos/default.png', 'Polea Metalica', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1940, 9, '0000000144', NULL, 'imagenes/productos/default.png', 'Refuerzo Lateral', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1941, 9, '0000000145', NULL, 'imagenes/productos/default.png', 'Relay tarjeta BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1942, 9, '0000000202', NULL, 'imagenes/productos/default.png', 'Riel Cuadrado', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1943, 9, '0000000203', NULL, 'imagenes/productos/default.png', 'Riel T', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1944, 9, '0000000204', NULL, 'imagenes/productos/default.png', 'Roscas Limite', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1945, 9, '0000000205', NULL, 'imagenes/productos/default.png', 'Sensor Revoluciones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1946, 9, '0000000206', NULL, 'imagenes/productos/default.png', 'Switch', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1947, 9, '0000000207', NULL, 'imagenes/productos/default.png', 'Tapas Cuenta Vueltas', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1948, 9, '0000000208', NULL, 'imagenes/productos/default.png', 'Tapas Revoluciones', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1949, 9, '0000000209', NULL, 'imagenes/productos/default.png', 'Tarjeta Electronica Ambar', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1950, 9, '0000000210', NULL, 'imagenes/productos/default.png', 'Tarjeta Electronica 315 BMT 5011', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1951, 9, '0000000211', NULL, 'imagenes/productos/default.png', 'Tarjeta Electronica 315 sencilla', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1952, 9, '0000000212', NULL, 'imagenes/productos/default.png', 'Tarjeta Electronica 315 doble', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1953, 9, '0000000213', NULL, 'imagenes/productos/default.png', 'Tarjeta Electronica 390 doble', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1954, 9, '0000000215', NULL, 'imagenes/productos/default.png', 'Transformador BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1955, 9, '0000000216', NULL, 'imagenes/productos/default.png', 'Tubos Automatizacion', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1956, 9, '0000000242', NULL, 'imagenes/productos/default.png', 'Central Motor Axial', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1957, 9, '0000000243', NULL, 'imagenes/productos/default.png', 'Bateria para Motor Axial', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1958, 9, '0000000244', NULL, 'imagenes/productos/default.png', 'Control Motor Axial', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1959, 9, '0000000246', NULL, 'imagenes/productos/default.png', 'Cebrero Motor Axial', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1960, 9, '0000000249', NULL, 'imagenes/productos/default.png', 'Boton timbre de motor', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1961, 9, '0000000250', NULL, 'imagenes/productos/default.png', 'Capacitor para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1962, 9, '0000000251', NULL, 'imagenes/productos/default.png', 'Capacitor para motor', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1963, 9, '0000000252', NULL, 'imagenes/productos/default.png', 'Carrito para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1964, 9, '0000000254', NULL, 'imagenes/productos/default.png', 'Disco de Clutch para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1965, 9, '0000000255', NULL, 'imagenes/productos/default.png', 'Interruptor para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1966, 9, '0000000257', NULL, 'imagenes/productos/default.png', 'Plato de clutch para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1967, 9, '0000000258', NULL, 'imagenes/productos/default.png', 'Polea final Craftsman', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1968, 9, '0000000259', NULL, 'imagenes/productos/default.png', 'Resorte de clutch p/BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1969, 9, '0000000260', NULL, 'imagenes/productos/default.png', 'Selenoide para motor BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1970, 9, '0000000261', NULL, 'imagenes/productos/default.png', 'Relevador para BMT', 0, NULL, '1.0000', '1.0000', 'Kit', '1.0000'),
(1971, 7, 'PD34', 'Producto de tipo dolar', 'imagenes/productos/dia del padre amor corazon hijos.jpg', 'Producto Dolar', 1, '2013-04-27', '50.2300', '602.7600', 'PZA', '12.0000'),
(1972, 7, 'asdasdas', 'asasasa', 'imagenes/productos/slide1.jpg', 'asdasdas', 0, '2013-05-03', '111.0000', '111.0000', 'asdas', '1.0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` smallint(6) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Esta tabla guardara las imagenes a mostrar en el silide' AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `descripcion`, `estatus`, `imagen`, `nombre`) VALUES
(6, 'assaas', 0, 'imagenes/slider/slide1.jpg', 'asas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `usuario`, `contrasena`, `fecha_registro`, `status`) VALUES
(1, 'paul', 'paul@mail.com', 'paul', '123', '2013-04-01', '1'),
(2, 'david', 'david@mail.com', 'david', '123', '2013-04-01', '1');
