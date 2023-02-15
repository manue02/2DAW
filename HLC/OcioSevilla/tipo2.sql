-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 20:03:59
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tipo2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_pelicula` int(4) NOT NULL,
  `id_persona` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id_pelicula`, `id_persona`) VALUES
(3, 8),
(4, 6),
(6, 9),
(6, 10),
(14, 7),
(16, 11),
(17, 3),
(17, 5),
(17, 8),
(17, 10),
(18, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(4) UNSIGNED NOT NULL,
  `peli_nombre` varchar(45) NOT NULL,
  `peli_tipo` tinyint(3) NOT NULL DEFAULT '0',
  `peli_anno` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `peli_nombre`, `peli_tipo`, `peli_anno`) VALUES
(1, 'Bruce Almighty', 5, 2010),
(2, 'Office Space', 4, 2000),
(3, 'prueba22222', 7, 55555),
(6, 'Liberad a Willy', 8, 1993),
(4, 'Solo en casa', 8, 1990),
(14, 'Hasta el ultimo hombre', 7, 2022),
(16, 'sasdadad', 7, 2222),
(17, 'Hasta el ultimo hombre', 7, 2000),
(18, 's', 7, 4444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(4) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`) VALUES
(1, 'Jim Carrey'),
(2, 'Tom Shadyac'),
(3, 'Lawrence Kasdan'),
(4, 'Kevin Kline'),
(5, 'Ron Livingston'),
(6, 'Mike Judge'),
(7, 'Macaulay Culkin'),
(8, 'Chris Columbus'),
(9, 'Jason James Richter'),
(10, 'Simon Wincer'),
(11, 'Val Kilmer'),
(12, 'Antony Hoffman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `NOMBRE` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `NOMBRE`) VALUES
(1, 'Sci Fi'),
(2, 'Drama'),
(3, 'Adventure'),
(4, 'War'),
(5, 'Comedy'),
(6, 'Horror'),
(7, 'Action'),
(8, 'Kids');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_peliculas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_peliculas` (
`id` int(4) unsigned
,`Nombre` varchar(45)
,`Tipo` varchar(100)
,`Id_Tipo` tinyint(3) unsigned
,`Año` smallint(5) unsigned
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_peliculas`
--
DROP TABLE IF EXISTS `vista_peliculas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_peliculas`  AS  select distinct `peliculas`.`id` AS `id`,`peliculas`.`peli_nombre` AS `Nombre`,`tipos`.`NOMBRE` AS `Tipo`,`tipos`.`id` AS `Id_Tipo`,`peliculas`.`peli_anno` AS `Año` from (((`peliculas` join `participantes`) join `tipos`) join `personas`) where ((`peliculas`.`peli_tipo` = `tipos`.`id`) and (`peliculas`.`id` = `participantes`.`id_pelicula`) and (`personas`.`id` = `participantes`.`id_persona`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_pelicula`,`id_persona`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peli_type` (`peli_tipo`,`peli_anno`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
