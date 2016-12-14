-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2016 a las 16:05:14
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parking`
--

CREATE TABLE `parking` (
  `id_parking` int(11) NOT NULL,
  `min_time` time DEFAULT '00:00:00',
  `max_time` time DEFAULT '00:00:00',
  `average_time` time DEFAULT '00:00:00',
  `current_status` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `parking`
--

INSERT INTO `parking` (`id_parking`, `min_time`, `max_time`, `average_time`, `current_status`) VALUES
(1, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(2, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(3, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(4, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(5, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(6, '00:00:00', '00:00:00', '00:00:00', 'Available'),
(7, '00:00:00', '00:00:00', '00:00:00', 'Available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `record`
--

CREATE TABLE `record` (
  `id_record` int(10) UNSIGNED NOT NULL,
  `parking_id_parking` int(11) NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `time_parking` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `record`
--

INSERT INTO `record` (`id_record`, `parking_id_parking`, `create_at`, `update_at`, `time_parking`) VALUES
(1, 1, '2016-12-12 05:07:50', '2016-12-12 05:17:50', '00:10:00'),
(2, 1, '2016-12-11 23:12:18', '2016-12-11 23:19:50', '00:07:32'),
(3, 2, '2016-12-12 05:08:05', '2016-12-12 05:12:05', '00:04:00'),
(4, 6, '2016-12-12 06:38:07', '2016-12-12 07:38:07', '01:00:00'),
(5, 4, '2016-12-12 06:46:18', '2016-12-12 06:58:18', '00:12:00'),
(6, 6, '2016-12-12 08:08:05', '2016-12-12 08:18:05', '00:10:00'),
(7, 2, '2016-12-12 08:20:05', '2016-12-12 08:35:05', '00:15:00'),
(8, 1, '2016-12-12 10:10:05', '2016-12-12 10:37:05', '00:27:00');

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
  MODIFY `id_record` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
