-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-08-2020 a las 18:07:45
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inevesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categorias` int(11) NOT NULL,
  `nombre_categorias` varchar(255) NOT NULL,
  `activo_categorias` int(11) NOT NULL DEFAULT '0',
  `estado_categorias` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categorias`, `nombre_categorias`, `activo_categorias`, `estado_categorias`) VALUES
(1, 'Monitor LED', 1, 1),
(2, 'Mouse', 1, 1),
(3, 'Teclados', 1, 1),
(4, 'Camaras', 1, 1),
(5, 'Impresoras', 1, 1),
(6, 'Monitor LCD', 1, 1),
(7, 'Mouse Pad', 1, 1),
(9, 'Mouse Gamer', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(120) NOT NULL,
  `activo_marca` int(11) NOT NULL DEFAULT '0',
  `estado_marca` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`, `activo_marca`, `estado_marca`) VALUES
(1, 'DELL', 1, 1),
(2, 'HP', 1, 1),
(3, 'LENOVO', 1, 1),
(4, 'INTEL', 1, 1),
(5, 'SONY', 1, 1),
(6, 'LOGITECH', 1, 1),
(7, 'BENQ', 1, 1),
(10, 'SAMSUNG', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categorias` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_productos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `modelo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `serie` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_baja` date NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `id_marca`, `id_categorias`, `id_usuario`, `nombre_productos`, `modelo`, `serie`, `fecha_alta`, `fecha_baja`, `activo`) VALUES
(1, 6, 3, 1, 'Teclado Mecanico', 'G513', 'Prodigy', '2020-07-25 20:12:00', '0000-00-00', 1),
(2, 3, 3, 1, 'Teclado mecanico', 'Inspiron', 'AS921', '2020-07-25 23:38:54', '0000-00-00', 1),
(3, 7, 1, 1, 'Monitor BENQ', 'GW2480', 'GW2480', '2020-07-25 23:41:15', '0000-00-00', 1),
(4, 6, 2, 1, 'Logitech HERO', 'G503', 'Prodigy', '2020-07-26 00:55:30', '0000-00-00', 1),
(6, 6, 3, 1, 'Teclado mecanico', 'CARBON', '913', '2020-07-30 16:07:46', '0000-00-00', 1),
(7, 2, 2, 2, 'Prueba', 'Prueba', 'Prueba', '2020-07-30 16:23:19', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(40) NOT NULL,
  `masterpass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `email`, `masterpass`) VALUES
(1, 'administrador', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', '87acb5c1c415cd49605d5291eb97352f'),
(2, 'Usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 'usuario@usuario.com', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`),
  ADD KEY `fk_productos_ref_marcas` (`id_marca`),
  ADD KEY `fk_productos_ref_categorias` (`id_categorias`),
  ADD KEY `fk_productos_ref_usuarios` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
