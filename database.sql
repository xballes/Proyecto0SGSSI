-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 10-10-2022 a las 15:51:30
-- Versión del servidor: 10.8.2-MariaDB-1:10.8.2+maria~focal
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perro`
--

CREATE TABLE `Perro` (
  `NombrePerro` varchar(20) NOT NULL,
  `Raza` varchar(20) NOT NULL,
  `Peso` int(3) NOT NULL,
  `FechaNacimiento` varchar(20) NOT NULL,
  `PaisOrigen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Perro`
--

INSERT INTO `Perro` (`NombrePerro`, `Raza`, `Peso`, `FechaNacimiento`, `PaisOrigen`) VALUES
('Camilo', 'Beagle', 10, '2000-10-10', 'Francia'),
('Rocky', 'Pug', 27, '2002-11-25', 'España'),
('Monchi', 'Pastor Aleman', 45, '2019-10-08', 'Alemania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `Nombre` varchar(20) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Nombre`, `DNI`, `Telefono`, `Fecha`, `Email`, `Contrasena`) VALUES
('Jokin', '12085928A', 678543291, '2009-11-12', 'pepe@hotmail.com', 'pepe'),
('Ander', '79045038H', 98765432, '2009-11-12', 'gorka@gmail.com', 'ander'),
('Alberto', '80465972N', 617789854, '2002-10-9', 'alberto@gmail.com', 'alberto'),
('Kepa', '87302877Y', 687798451, '2004-10-04', 'kepa@gmail.com', 'kepa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`DNI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
