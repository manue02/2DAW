-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2015 a las 15:44:47
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
DROP DATABASE IF EXISTS ciclos;
--
-- Base de datos: `ciclos`
--
CREATE DATABASE  `ciclos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ciclos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `DNI_ALUMNO` int(8) NOT NULL,
  `COD_MODULO` int(3) NOT NULL,
  `EVALUACION` int(1) NOT NULL,
  `NOTA` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`DNI_ALUMNO`, `COD_MODULO`, `EVALUACION`, `NOTA`) VALUES
(32132445, 101, 1, 6),
(32132445, 101, 2, 7),
(32132445, 101, 3, 6),
(32132445, 102, 1, 4),
(32132445, 102, 2, 5),
(32132445, 106, 1, 6),
(48438344, 101, 1, 7),
(48438344, 106, 1, 6),
(48438344, 106, 2, 9),
(93453462, 101, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursa`
--

CREATE TABLE `cursa` (
  `DNI_ALUMNO` int(8) NOT NULL,
  `COD_MODULO` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursa`
--

INSERT INTO `cursa` (`DNI_ALUMNO`, `COD_MODULO`) VALUES
(32132445, 101),
(32132445, 102),
(32132445, 104),
(48438344, 101),
(48438344, 102),
(48438344, 103),
(48438344, 104),
(48438344, 105),
(48438344, 106),
(93453462, 101);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imparte`
--

CREATE TABLE `imparte` (
  `DNI_PROFESOR` int(8) NOT NULL,
  `COD_MODULO` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imparte`
--

INSERT INTO `imparte` (`DNI_PROFESOR`, `COD_MODULO`) VALUES
(132123, 101),
(132123, 106),
(9887987, 103),
(55577789, 102),
(98734534, 104),
(98734534, 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `COD_MODULO` int(3) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `DURACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`COD_MODULO`, `NOMBRE`, `DURACION`) VALUES
(101, 'LENGUAJE DE MARCAS', 120),
(102, 'FOL', 120),
(103, 'SISTEMAS', 140),
(104, 'IDE', 120),
(105, 'BASE DE DATOS', 160),
(106, 'PROGRAMACIÓN', 160);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` int(8) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `TELEFONO` int(9) NOT NULL,
  `PASSWORD` varchar(6) NOT NULL,
  `TIPO_USU` enum('A','P','L') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `NOMBRE`, `TELEFONO`, `PASSWORD`, `TIPO_USU`) VALUES
(132123, 'FRAN', 12315236, 'FRAN', 'P'),
(9887987, 'CARLOS', 23555922, 'CARLOS', 'P'),
(32132445, 'VICTOR', 2212134, 'VICTOR', 'L'),
(48438344, 'PACO', 984747321, 'PACO', 'L'),
(55577789, 'PEDRO', 942435693, 'PEDRO', 'P'),
(93453462, 'PEPE', 964321345, 'PEPE', 'L'),
(98734534, 'ROSA', 982773643, 'ROSA', 'P');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`DNI_ALUMNO`,`COD_MODULO`,`EVALUACION`);

--
-- Indices de la tabla `cursa`
--
ALTER TABLE `cursa`
  ADD PRIMARY KEY (`DNI_ALUMNO`,`COD_MODULO`);

--
-- Indices de la tabla `imparte`
--
ALTER TABLE `imparte`
  ADD PRIMARY KEY (`DNI_PROFESOR`,`COD_MODULO`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`COD_MODULO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
