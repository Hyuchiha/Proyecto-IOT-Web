-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2016 a las 16:47:07
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smartparking`
--
CREATE DATABASE IF NOT EXISTS `smartparking` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `smartparking`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parking`
--

CREATE TABLE `parking` (
  `id_parking` int(11) NOT NULL,
  `min_time` time(3) DEFAULT '00:00:00.000',
  `max_time` time(3) DEFAULT '00:00:00.000',
  `average_time` time(3) DEFAULT '00:00:00.000',
  `current_status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id_record` int(10) UNSIGNED NOT NULL,
  `parking_id_parking` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `time_parking` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `auth_key`, `access_token`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'VbjVFlJ9-hFWMiQ9gCxZINZ7KGRFxvMj', '933BbvBHkucxW_0EqJ2OpLoSBR8cgecA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parking`
--
ALTER TABLE `parking`
  ADD PRIMARY KEY (`id_parking`);

--
-- Indices de la tabla `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id_record`,`parking_id_parking`),
  ADD KEY `fk_record_parking_idx` (`parking_id_parking`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `record`
--
ALTER TABLE `record`
  MODIFY `id_record` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `fk_record_parking` FOREIGN KEY (`parking_id_parking`) REFERENCES `parking` (`id_parking`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
