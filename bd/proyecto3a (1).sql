-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2023 a las 16:49:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto3a`
--
CREATE DATABASE IF NOT EXISTS `proyecto3a` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `proyecto3a`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicion`
--

DROP TABLE IF EXISTS `medicion`;
CREATE TABLE `medicion` (
  `id` int(10) NOT NULL,
  `id sonda` int(15) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time(6) NOT NULL,
  `Latitud` float NOT NULL,
  `Longitud` double NOT NULL,
  `Humedad` int(100) NOT NULL,
  `Temperatura` float NOT NULL,
  `Contaminacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicion`
--

INSERT INTO `medicion` (`id`, `id sonda`, `fecha`, `hora`, `Latitud`, `Longitud`, `Humedad`, `Temperatura`, `Contaminacion`) VALUES
(1, 1, '0000-00-00', '00:00:00.000000', 0, 0, 0, 0, 0),
(2, 0, '0000-00-00', '00:00:00.000000', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sonda`
--

DROP TABLE IF EXISTS `sonda`;
CREATE TABLE `sonda` (
  `ID Sonda` int(10) NOT NULL,
  `ID mediciones` int(15) NOT NULL,
  `ID usuario` int(15) NOT NULL,
  `bateria` int(100) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sonda`
--

INSERT INTO `sonda` (`ID Sonda`, `ID mediciones`, `ID usuario`, `bateria`, `estado`) VALUES
(1, 1, 73667766, 90, 'ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `ID` int(15) NOT NULL,
  `nombre` char(25) NOT NULL,
  `usuario` char(15) NOT NULL,
  `contraseña` char(15) NOT NULL,
  `idSonda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `nombre`, `usuario`, `contraseña`, `idSonda`) VALUES
(123456789, 'Carles', 'Admin', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicion`
--
ALTER TABLE `medicion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id Sonda` (`id sonda`);

--
-- Indices de la tabla `sonda`
--
ALTER TABLE `sonda`
  ADD PRIMARY KEY (`ID Sonda`),
  ADD KEY `id medicion fk` (`ID mediciones`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idSonda` (`idSonda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicion`
--
ALTER TABLE `medicion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sonda`
--
ALTER TABLE `sonda`
  MODIFY `ID Sonda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123456790;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sonda`
--
ALTER TABLE `sonda`
  ADD CONSTRAINT `id medicion fk` FOREIGN KEY (`ID mediciones`) REFERENCES `medicion` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idSonda`) REFERENCES `sonda` (`ID Sonda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
