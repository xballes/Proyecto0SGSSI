-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 19-11-2022 a las 11:59:18
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
-- Estructura de tabla para la tabla `Log`
--

CREATE TABLE `Log` (
  `Descripcion` varchar(50) NOT NULL,
  `IP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Log`
--

INSERT INTO `Log` (`Descripcion`, `IP`) VALUES
('Contraseña incorrecta,usuario con DNI  79045038H', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI  79045038H', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI  79045038H', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI  79045038H', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Contraseña incorrecta,usuario con DNI 79045038H', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1'),
('Se ha iniciado sesión correctamente', '172.17.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perro`
--

CREATE TABLE `Perro` (
  `NombrePerro` varchar(20) NOT NULL,
  `Raza` varchar(20) NOT NULL,
  `Peso` int(3) NOT NULL,
  `FechaNacimiento` varchar(20) NOT NULL,
  `PaisOrigen` varchar(20) NOT NULL,
  `DNIDueño` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Perro`
--

INSERT INTO `Perro` (`NombrePerro`, `Raza`, `Peso`, `FechaNacimiento`, `PaisOrigen`, `DNIDueño`) VALUES
('Isi', 'Bulldog', 45, '2009-11-17', 'Francia', '79045038H'),
('Lodeon', 'Caniche', 25, '2009-11-17', 'España', '12085928A'),
('Milo', 'Pug', 25, '2009-11-17', 'Alemania', '54585175B'),
('Rocky', 'Koki', 10, '2000-10-10', 'España', '98943127W'),
('Thor', 'Pastor Aleman', 45, '2001-10-25', 'Alemania', '79045038H');

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
  `Contrasena` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Nombre`, `DNI`, `Telefono`, `Fecha`, `Email`, `Contrasena`) VALUES
('Ander', '12085928A', 666612345, '2002-10-30', 'jonan@gmail.com', '$2y$10$Qu8a8YUX1XOO9.05UmKArOiidFmfkB49tjfb8Szu.Bq.GcOTmCU0q'),
('Pepe', '39546953V', 617765413, '2002-10-29', 'pepe@gmail.com', '$2y$10$FogknxvbZ3ZBBbjQWVo5keed1dd4A9tNbgeYRLa6fyqbjVtvhot5O'),
('Pepe', '54585175B', 987546321, '2000-10-10', 'pepe@gmail.com', '$2y$10$.5NWR8yIEoxmWewlj4IPO.k5lrIsLufmPLmRob2MXld3TuEPEU31O'),
('Ander', '79045038H', 618876514, '2004-12-29', 'xabi@gmail.com', '$2y$10$/XMYdQQw/EyMd.O8KuVc6uCX5tFZ3AvJWrtJOfeHJz1qLI4rPONPi'),
('Jose Luis', '98943127W', 617765413, '2009-11-12', 'xxxx@gmail.com', '$2y$10$4FcAYJchYJid7Bzky731qOfgGlr4EtnKnrN.uHkY/trwCepgINY3O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Perro`
--
ALTER TABLE `Perro`
  ADD PRIMARY KEY (`NombrePerro`,`DNIDueño`),
  ADD KEY `DNIDueñoYPerro` (`DNIDueño`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`DNI`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Perro`
--
ALTER TABLE `Perro`
  ADD CONSTRAINT `DNIDueñoYPerro` FOREIGN KEY (`DNIDueño`) REFERENCES `Usuario` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
