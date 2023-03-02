-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2023 a las 13:45:10
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
-- Base de datos: `parte1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--
DROP DATABASE IF EXISTS `parte1`;
create database parte1;
use parte1;
CREATE TABLE `aulas` (
  `aula_id` int(5) NOT NULL,
  `edificio` varchar(25) DEFAULT NULL,
  `numaula` decimal(4,0) DEFAULT NULL,
  `num_sillas` decimal(4,0) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`aula_id`, `edificio`, `numaula`, `num_sillas`, `description`) VALUES
(99987, 'edificio 6', '210', '20', 'Ordenadores 2'),
(99988, 'edificio 7', '315', '25', 'Ordenadores 1'),
(99989, 'edificio 7', '323', '50', 'Usos múltiples E'),
(99990, 'edificio 7', '310', '35', 'Uso general'),
(99991, 'edificio 7', '310', '50', 'Uso general'),
(99992, 'edificio 7', '300', '75', 'Usos múltiples D'),
(99993, 'edificio de música', '200', '100', 'Aula de conciertos'),
(99994, 'edificio de música', '100', '10', 'Clase de prácticas de música'),
(99995, 'edificio 6', '170', '50', 'Usos múltiples C'),
(99996, 'edificio 6', '160', '50', 'Usos múltiples B'),
(99997, 'edificio 6', '150', '50', ' Usos múltiples A'),
(99998, 'edificio 6', '101', '250', 'Sala de juntas'),
(99999, 'edificio 7', '310', '400', 'Salón de actos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `departamento` varchar(3) NOT NULL DEFAULT '',
  `curso` decimal(3,0) NOT NULL DEFAULT 0,
  `descripcion` varchar(2000) DEFAULT NULL,
  `max_estudiantes` decimal(3,0) DEFAULT NULL,
  `num_estudiantes` decimal(3,0) DEFAULT NULL,
  `num_creditos` decimal(1,0) DEFAULT NULL,
  `aula_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`departamento`, `curso`, `descripcion`, `max_estudiantes`, `num_estudiantes`, `num_creditos`, `aula_id`) VALUES
('CS', '101', 'Informática 101', '50', '0', '4', 99990),
('CS', '102', 'Informática 102', '35', '3', '4', 99996),
('ECN', '101', 'Económicas 101', '50', '0', '4', 99988),
('ECN', '203', 'Económicas 203', '15', '0', '3', 99987),
('HIS', '101', 'Historia 101', '12', '11', '4', 99999),
('HIS', '301', 'Historia 301', '30', '2', '4', 99993),
('MUS', '410', 'Música 410', '5', '3', '3', 99994),
('NUT', '307', 'Nutrición 307', '20', '2', '4', 99995);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `modulos_aulas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `modulos_aulas` (
`DEPARTAMENTO` varchar(3)
,`CURSO` decimal(3,0)
,`EDIFICIO` varchar(25)
,`NUMAULA` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `modulos_aulas`
--
DROP TABLE IF EXISTS `modulos_aulas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `modulos_aulas`  AS SELECT `modulos`.`departamento` AS `DEPARTAMENTO`, `modulos`.`curso` AS `CURSO`, `aulas`.`edificio` AS `EDIFICIO`, `aulas`.`numaula` AS `NUMAULA` FROM (`aulas` join `modulos`) WHERE `aulas`.`aula_id` = `modulos`.`aula_id`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`aula_id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`departamento`,`curso`),
  ADD KEY `aula_id` (`aula_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `modulos_ibfk_1` FOREIGN KEY (`aula_id`) REFERENCES `aulas` (`aula_id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
