-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2018 a las 23:18:18
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `bolsa_trabajo`
--
CREATE DATABASE IF NOT EXISTS `bolsa_trabajo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bolsa_trabajo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `no_control` varchar(8) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `habilidades` varchar(150) NOT NULL,
  `diplomados_cursos` varchar(150) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `edad` int(2) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`no_control`, `nombre`, `paterno`, `materno`, `habilidades`, `diplomados_cursos`, `id_carrera`, `telefono`, `edad`, `correo`, `pass`, `imagen`) VALUES
('115Q0258', 'Javier', 'Castro', 'Lagunes', 'Programación y cumplido', 'Java 8', 2, '2881293843', 21, 'alumno@alumno.com', 'f6b16b945f3a595d0f4d0b9270eb0cb5', '115Q0258.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre`) VALUES
(1, 'Ingenierí­a Industrial'),
(2, 'Ingeniería Informática'),
(3, 'Ingenierí­a Sistemas Computacionales'),
(4, 'Ingenierí­a Electrónica'),
(5, 'Ingenierí­a en Gestión Empresarial'),
(6, 'Ingenierí­a Petrolera'),
(7, 'Ingenierí­a Innovación Agrícola Sustentable'),
(8, 'Ingenierí­a Tecnologías de la Información'),
(9, 'Ingenierí­a Energías Renovables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `pass` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `direccion`, `telefono`, `correo`, `usuario`, `pass`) VALUES
(1, 'Patito Edit', 'Calle Patito 102 Col Patito', '2881133782', 'correo@empresa.com', 'patito', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Patito', 'Calle Patito 102 Col Patito', '281133728', 'correo@empresa.com', 'pato', '3411f6d521ed0d17b6953e5741eaecca'),
(5, 'Sicsa', 'Calle Principal Col Centro', '8274847581', 'correo@empresa.com', 'sicsa', 'bdbba3706bdf5a9bd792185d1f5793ee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_empresa` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `descripcion`, `fecha`, `id_empresa`, `titulo`, `id_carrera`) VALUES
(2, 'Se solicita programador PHP en el puerto de Veracruz, excelente salario.', '2018-07-11 15:55:39', 0, 'Programador PHP', 0),
(3, 'Se solicitar programador java para importante empresa de programación', '2018-07-19 18:25:42', 5, 'Programador Java 2', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulaciones`
--

CREATE TABLE `postulaciones` (
  `id_postulacion` int(11) NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `postulaciones`
--

INSERT INTO `postulaciones` (`id_postulacion`, `id_user`, `id_oferta`, `fecha`) VALUES
(2, '0', 2, '2018-07-11 16:00:02'),
(3, '4', 2, '2018-07-11 16:19:29'),
(4, '115Q0258', 3, '2018-07-19 19:09:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `tipo`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(5, 'Admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`no_control`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  ADD PRIMARY KEY (`id_postulacion`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `postulaciones`
--
ALTER TABLE `postulaciones`
  MODIFY `id_postulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;