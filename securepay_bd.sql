-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2014 a las 22:41:41
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `securepay_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_articulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_articulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `id_imagen` (`id_imagen`),
  KEY `id_pagina` (`id_pagina`),
  KEY `rut` (`rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `nombre_articulo`, `tipo_articulo`, `descripcion`, `rut`, `fecha`, `id_imagen`, `id_pagina`) VALUES
(4, 'cuarto', 'Normal', 'este es el cuarto', '18788855-7', '2014-11-22', 51, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `rut` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_region` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `id_region` (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre_ciudad`, `id_region`) VALUES
(1, 'San Carlos', 8),
(2, 'Iquique', 1),
(3, 'Antofagasta', 2),
(4, 'La Serena', 4),
(5, 'Valparaiso', 5),
(6, 'Talca', 7),
(7, 'Chillán', 8),
(8, 'Concepción', 8),
(9, 'Temuco', 9),
(10, 'Puerto Montt', 10),
(11, 'Punta Arenas', 12),
(12, 'Santiago', 13),
(13, 'Valdivia', 14),
(14, 'Arica', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento_pagina`
--

CREATE TABLE IF NOT EXISTS `elemento_pagina` (
  `id_elemento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_elemento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion_elemento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_pagina` int(11) NOT NULL,
  PRIMARY KEY (`id_elemento`),
  KEY `id_pagina` (`id_pagina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_imagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `rut` (`rut`),
  KEY `rut_2` (`rut`),
  KEY `rut_3` (`rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=55 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_imagen`, `tipo_imagen`, `rut`, `fecha`) VALUES
(2, '1416408722_68.png', 'Normal', '18788855-7', '2014-11-19'),
(3, '1416409516_63.jpg', 'Normal', '18788855-7', '2014-11-19'),
(4, '1416410138_83.jpg', 'Normal', '18788855-7', '2014-11-19'),
(5, '1416411723_9.jpg', 'Informativo', '18788855-7', '2014-11-19'),
(6, '1416411890_40.jpg', 'Normal', '18788855-7', '2014-11-19'),
(7, '1416412110_15.jpg', 'Normal', '18788855-7', '2014-11-19'),
(8, '1416412323_32.jpg', 'Informativo', '18788855-7', '2014-11-19'),
(9, '1416412372_88.jpg', 'Normal', '18788855-7', '2014-11-19'),
(10, '1416412551_56.psd', 'Normal', '18788855-7', '2014-11-19'),
(11, '1416412634_5.png', 'Normal', '18788855-7', '2014-11-19'),
(12, '1416412950_21.png', 'Normal', '18788855-7', '2014-11-19'),
(13, '1416413223_87.png', 'Normal', '18788855-7', '2014-11-19'),
(14, '1416413277_35.png', 'Normal', '18788855-7', '2014-11-19'),
(15, '1416413429_79.png', 'Normal', '18788855-7', '2014-11-19'),
(16, '1416414978_70.png', 'Normal', '18788855-7', '2014-11-19'),
(17, '1416415061_7.png', 'Normal', '18788855-7', '2014-11-19'),
(18, '1416415129_77.jpg', 'Normal', '18788855-7', '2014-11-19'),
(19, '1416415290_20.jpg', 'Normal', '18788855-7', '2014-11-19'),
(20, '1416415372_92.png', 'Informativo', '18788855-7', '2014-11-19'),
(21, '1416415418_11.png', 'Normal', '18788855-7', '2014-11-19'),
(22, '1416415490_5.png', 'Normal', '18788855-7', '2014-11-19'),
(23, '1416415646_90.png', 'Normal', '18788855-7', '2014-11-19'),
(24, '1416417088_35.jpg', 'Normal', '18788855-7', '2014-11-19'),
(25, '1416417240_40.png', 'Normal', '18788855-7', '2014-11-19'),
(26, '1416417387_0.png', 'Normal', '18788855-7', '2014-11-19'),
(27, '1416417450_65.png', 'Informativo', '18788855-7', '2014-11-19'),
(28, '1416417528_15.png', 'Normal', '18788855-7', '2014-11-19'),
(29, '1416417833_19.jpg', 'Informativo', '18788855-7', '2014-11-19'),
(30, '1416417909_62.png', 'Normal', '18788855-7', '2014-11-19'),
(31, '1416417989_68.png', 'Normal', '18788855-7', '2014-11-19'),
(32, '1416418036_3.png', 'Normal', '18788855-7', '2014-11-19'),
(33, '1416418110_19.', 'Normal', '18788855-7', '2014-11-19'),
(34, '1416418123_61.jpg', 'Normal', '18788855-7', '2014-11-19'),
(35, '1416418159_96.jpg', 'Normal', '18788855-7', '2014-11-19'),
(36, '1416418307_81.png', 'Normal', '18788855-7', '2014-11-19'),
(37, '1416418350_93.png', 'Normal', '18788855-7', '2014-11-19'),
(38, '1416418392_85.png', 'Normal', '18788855-7', '2014-11-19'),
(39, '1416418562_6.png', 'Normal', '18788855-7', '2014-11-19'),
(40, '1416418616_81.png', 'Normal', '18788855-7', '2014-11-19'),
(41, '1416418686_36.png', 'Informativo', '18788855-7', '2014-11-19'),
(42, '1416419872_4.png', 'Informativo', '18788855-7', '2014-11-19'),
(43, '1416419910_66.jpg', 'Normal', '18788855-7', '2014-11-19'),
(44, '1416420568_93.png', 'Normal', '18788855-7', '2014-11-19'),
(45, '1416420701_57.jpg', 'Normal', '18788855-7', '2014-11-19'),
(46, '1416420975_35.png', 'Normal', '18788855-7', '2014-11-19'),
(47, '1416421056_39.', 'Normal', '18788855-7', '2014-11-19'),
(48, '1416421098_36.png', 'Normal', '18788855-7', '2014-11-19'),
(51, '1416691372_23.jpg', 'Normal', '18788855-7', '2014-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `rut` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `id_oferta` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  PRIMARY KEY (`id_oferta`),
  KEY `rut` (`rut`),
  KEY `id_publicacion` (`id_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_menu`
--

CREATE TABLE IF NOT EXISTS `opciones_menu` (
  `id_opciones_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_boton` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  `ruta_menu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_opciones_menu`),
  KEY `id_menu` (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pagina` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_pagina` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_pagina`),
  KEY `rut` (`rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`id_pagina`, `nombre_pagina`, `tipo_pagina`, `rut`, `fecha`) VALUES
(2, 'index', 'normal', '18788855-7', '2014-11-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_empresa`
--

CREATE TABLE IF NOT EXISTS `perfil_empresa` (
  `rut_empresa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `representante` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `slogan` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`rut_empresa`),
  KEY `id_region` (`id_region`),
  KEY `id_ciudad` (`id_ciudad`),
  KEY `rut` (`rut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil_empresa`
--

INSERT INTO `perfil_empresa` (`rut_empresa`, `nombre_empresa`, `id_region`, `id_ciudad`, `direccion`, `email`, `logo`, `representante`, `slogan`, `telefono`, `rut`, `fecha`) VALUES
('18788699-K', 'SecurePay', 15, 14, 'INACAP', 'securepay@gmail.com', '1416691323_99.jpg', 'el cabron', 'lo mas segura de la red', 67838234, '18788855-7', '2014-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_tipo_publicacion` int(11) NOT NULL,
  `valor_publicacion` int(11) NOT NULL,
  `rut` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `rut` (`rut`),
  KEY `id_tipo_publicacion` (`id_tipo_publicacion`),
  KEY `id_imagen` (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_region` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id_region`, `nombre_region`) VALUES
(1, 'Tarapacá'),
(2, 'Antofagasta'),
(3, 'Atacama'),
(4, 'Coquimbo'),
(5, 'Valparaiso'),
(6, 'OHiggins'),
(7, 'Maule'),
(8, 'Bio-Bio'),
(9, 'Araucanía'),
(10, 'Los Lagos'),
(11, 'Aisén'),
(12, 'Magallanes'),
(13, 'Metropolitana'),
(14, 'Los Ríos'),
(15, 'Arica y Parinacota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicacion`
--

CREATE TABLE IF NOT EXISTS `tipo_publicacion` (
  `id_tipo_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_expiracion` date NOT NULL,
  PRIMARY KEY (`id_tipo_publicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `rut` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cuenta` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_activo` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `id_region` (`id_region`),
  KEY `id_ciudad` (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `nombres`, `apellido_paterno`, `apellido_materno`, `tipo_cuenta`, `direccion`, `id_region`, `id_ciudad`, `email`, `telefono`, `password`, `estado`, `usuario_activo`) VALUES
('18788855-7', 'Rubén Eugenio', 'Muñoz', 'Burgos', 'admin', 'Pasaje Yungay 364', 8, 1, 'ruben.munozb@hotmail.com', 76573047, '123456', 'disponible', 'true');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articulo_ibfk_3` FOREIGN KEY (`id_pagina`) REFERENCES `paginas` (`id_pagina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `elemento_pagina`
--
ALTER TABLE `elemento_pagina`
  ADD CONSTRAINT `elemento_pagina_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `paginas` (`id_pagina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `oferta_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oferta_ibfk_2` FOREIGN KEY (`id_publicacion`) REFERENCES `tipo_publicacion` (`id_tipo_publicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_menu`
--
ALTER TABLE `opciones_menu`
  ADD CONSTRAINT `opciones_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD CONSTRAINT `paginas_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_empresa`
--
ALTER TABLE `perfil_empresa`
  ADD CONSTRAINT `perfil_empresa_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_empresa_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `perfil_empresa_ibfk_4` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`rut`) REFERENCES `usuarios` (`rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicacion_ibfk_2` FOREIGN KEY (`id_tipo_publicacion`) REFERENCES `tipo_publicacion` (`id_tipo_publicacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publicacion_ibfk_3` FOREIGN KEY (`id_imagen`) REFERENCES `imagen` (`id_imagen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
