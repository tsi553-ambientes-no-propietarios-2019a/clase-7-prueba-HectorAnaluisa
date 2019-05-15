-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2019 a las 11:35:45
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebab1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(256) DEFAULT NULL,
  `Nombre` varchar(120) DEFAULT NULL,
  `Tipo` varchar(120) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `id_us` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `Nombre`, `Tipo`, `Cantidad`, `Precio`, `id_us`) VALUES
(1, 'qwerty', 'Papitas', 'Alimento', 23, 54, 2),
(2, 'kioko', 'TAkis', 'Alimento', 345, 7890, 1),
(3, 'nhgt', 'Salticas', 'Alimento', 56, 23, 1),
(4, 'juhsb', 'Tortolines', 'Alimento', 78, 34, 1),
(5, 'ihyt', 'Biberones', 'Vestimenta', 23, 89, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `ID` int(11) NOT NULL,
  `NomTienda` varchar(120) NOT NULL,
  `Usuario` varchar(120) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`ID`, `NomTienda`, `Usuario`, `Password`) VALUES
(1, 'Granjas el Pollon', 'Toto', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Rikkoso', 'David', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Titanic', 'Gato', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_us` (`id_us`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UsuarioUNico` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_us`) REFERENCES `tienda` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
