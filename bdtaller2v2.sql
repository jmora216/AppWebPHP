-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2022 a las 20:32:12
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdtaller2v2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `id_producto`, `id_usuario`) VALUES
(15, 5, 1),
(19, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(120) DEFAULT NULL,
  `precio` decimal DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `precio`) VALUES
(1, 'aceite', '5450'),
(2, 'pasta', '8900'),
(3, 'arroz', '10800'),
(4, 'leche', '3900'),
(5, 'huevos', '17500'),
(6, 'frijoles', '3500'),
(7, 'lentejas', '3100'),
(8, 'pan', '5000'),
(9, 'azucar', '4800'),
(10, 'sal', '3700'),
(11, 'cafe', '7800'),
(12, 'harina', '9100'),
(13, 'mermelada', '1800'),
(14, 'galletas', '3570'),
(15, 'atun', '5650'),
(16, 'maizena', '2400'),
(17, 'mantequilla', '3200'),
(18, 'queso', '7300'),
(19, 'yogurt', '1700'),
(20, 'salchichas', '11600');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `usuario`, `clave`, `rol`) VALUES
(1, 'juliana', 'jmora216', 'jmora216', 'admin'),
(2, 'edynson muñoz jimenez', 'edynsonmj', 'edynsonmj', 'admin'),
(3, 'usuario1', 'usuario1', 'usuario1', 'no-admin'),
(4, 'usuario2', 'usuario2', 'usuario2', 'no-admin'),
(5, 'usuario5', 'usuario5', 'usuario5', 'no-admin'),
(6, 'usuario6', 'usuario6', 'usuario6', 'no-admin'),
(7, 'usuario7', 'usuario7', 'usuario7', 'no-admin'),
(8, 'usuario8', 'usuario8', 'usuario8', 'no-admin'),
(9, 'usuario9', 'usuario9', 'usuario9', 'no-admin'),
(10, 'usuario10', 'usuario10', 'usuario10', 'no-admin'),
(11, 'usuario11', 'usuario11', 'usuario11', 'no-admin'),
(12, 'usuario12', 'usuario12', 'usuario12', 'no-admin'),
(13, 'usuario13', 'usuario13', 'usuario13', 'no-admin'),
(14, 'usuario14', 'usuario14', 'usuario14', 'no-admin'),
(15, 'usuario15', 'usuario15', 'usuario15', 'no-admin'),
(16, 'usuario16', 'usuario16', 'usuario16', 'no-admin'),
(17, 'usuario17', 'usuario17', 'usuario17', 'no-admin'),
(18, 'usuario18', 'usuario18', 'usuario18', 'no-admin'),
(19, 'usuario19', 'usuario19', 'usuario19', 'no-admin'),
(20, 'usuario20', 'usuario20', 'usuario20', 'no-admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
