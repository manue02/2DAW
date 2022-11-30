-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 14:52:35
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE IF EXISTS TIPOB;
CREATE DATABASE TIPOB;
USE TIPOB;

CREATE TABLE `directivos` (
  `DNI` int(8) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `PASSWORD` varchar(6) NOT NULL,
  `CARGO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `directivos`
--

INSERT INTO `directivos` (`DNI`, `NOMBRE`, `PASSWORD`, `CARGO`) VALUES
(222, 'PEDRO', 'PEDRO', 'GERENTE'),
(333, 'ANTONIA', 'TOÑI', 'DIRECTORA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operaciones`
--

CREATE TABLE `operaciones` (
  `dni_operario` int(8) NOT NULL,
  `cod_trabajo` smallint(3) NOT NULL,
  `tiempo` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operaciones`
--

INSERT INTO `operaciones` (`dni_operario`, `cod_trabajo`, `tiempo`, `fecha`) VALUES
(666, 1, 476, '2019-12-02'),
(666, 2, 61, '2019-12-16'),
(666, 3, 54, '2019-11-11'),
(666, 5, 40, '2019-11-20'),
(777, 6, 68, '2019-12-03'),
(777, 6, 65, '2019-12-04'),
(777, 7, 48, '2019-11-25'),
(777, 7, 45, '2019-12-04'),
(888, 1, 60, '2019-12-05'),
(888, 1, 78, '2019-12-09'),
(888, 4, 65, '2019-11-26'),
(888, 4, 53, '2019-12-06'),
(888, 4, 47, '2019-12-10'),
(999, 2, 44, '2019-11-25'),
(999, 2, 53, '2019-12-12'),
(999, 5, 33, '2019-12-03'),
(999, 5, 56, '2019-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE `operarios` (
  `DNI` int(8) NOT NULL DEFAULT '0',
  `NOMBRE` varchar(20) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `funcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`DNI`, `NOMBRE`, `PASSWORD`, `funcion`) VALUES
(666, 'LUIS', 'LUIS', 'MECANICA'),
(777, 'MANUEL', 'MANUEL', 'ELECTRICID'),
(888, 'JESUS', 'JESUS', 'NEUMATICOS'),
(999, 'JUANMA', 'JUANMA', 'MECANICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `DNI` int(8) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `PASSWORD` varchar(8) NOT NULL,
  `TRABAJO` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`DNI`, `NOMBRE`, `PASSWORD`, `TRABAJO`) VALUES
(3443, 'ANAP', 'ANAP', 7),
(6767, 'MIGUELP', 'MIGUELP', 2),
(8181, 'ANTONIOP', 'ANTONIOP', 6),
(8785, 'ENRIQUEP', 'ENRIQUEP', 0),
(9090, 'LUISAP', 'LUISAP', 5),
(9292, 'MANUELP', 'MANUELP', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `cod_trabajo` int(3) NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`cod_trabajo`, `nombre`) VALUES
(1, 'Alineación'),
(2, 'Puesta a punto'),
(3, 'Cambio correa'),
(4, 'Arreglo Pinchazo'),
(5, 'Cambio Aceite'),
(6, 'Cambio de Bateria'),
(7, 'Cambio Alternador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `directivos`
--
ALTER TABLE `directivos`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `operaciones`
--
ALTER TABLE `operaciones`
  ADD PRIMARY KEY (`dni_operario`,`cod_trabajo`,`fecha`);

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`cod_trabajo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
