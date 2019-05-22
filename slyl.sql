-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2019 a las 05:38:12
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5
CREATE DATABASE SLYL;
use SLYL;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `slyl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--



CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `nombre_archivo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `path` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `nombre_archivo`, `activo`, `path`) VALUES
(11, 'Quattuor', '0', '/files/12.png'),
(9, 'test', '0', '/files/10.jpg'),
(10, 'Arya', '0', '/files/11.jpg'),
(12, 'imagen', '0', '/files/13.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_niveles`
--

CREATE TABLE `cat_niveles` (
  `id_nivel` int(11) NOT NULL,
  `departamento` varchar(30) DEFAULT NULL,
  `nivel_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_niveles`
--

INSERT INTO `cat_niveles` (`id_nivel`, `departamento`, `nivel_usuario`) VALUES
(1, 'ROOT', 0),
(2, 'ADMINISTRADOR', 1),
(3, 'CONTABILIDAD', 2),
(4, 'DISEÑO', 3),
(5, 'VENTAS', 4),
(6, 'PRODUCCIÓN', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `correo_cliente` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_cliente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono_cliente` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `correo_cliente`, `nombre_cliente`, `telefono_cliente`, `fecha_nacimiento`, `activo`) VALUES
(9, 'joel.gaona.haro@gmail.com', 'JOEL GAONA', '6371222630', '2019/05/07', '1'),
(11, 'joel.gaona.haro@gmail.com', 'DANIEL MORENO', '6371222630', '2019/01/17', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `nombre_proyecto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_cliente` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_inicio` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_final` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creador_proyecto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario_email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_p` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellido_m` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  `contrasena` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `letreros`
--

CREATE TABLE `letreros` (
  `id_letrero` int(11) NOT NULL,
  `nombre_proyecto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creador_proyecto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activo` char(1) COLLATE utf8_unicode_ci DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario_email`, `nombre`, `apellido_p`, `apellido_m`, `id_nivel`, `contrasena`, `activo`) VALUES
(1, 'root@pinguinosystems.com', 'MARTIN FRANCISCO', 'MARTINEZ', 'FEDERICO', 1, '123456', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `cat_niveles`
--
ALTER TABLE `cat_niveles`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`nombre_proyecto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indices de la tabla `letreros`
--
ALTER TABLE `letreros`
  ADD PRIMARY KEY (`id_letrero`),
  ADD KEY `nombre_proyecto` (`nombre_proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cat_niveles`
--
ALTER TABLE `cat_niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

--
-- AUTO_INCREMENT de la tabla `letreros`
--
ALTER TABLE `letreros`
  MODIFY `id_letrero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
