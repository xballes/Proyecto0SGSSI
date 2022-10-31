-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 31-10-2022 a las 14:48:23
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
  `PaisOrigen` varchar(20) NOT NULL,
  `DNIDueño` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Perro`
--

INSERT INTO `Perro` (`NombrePerro`, `Raza`, `Peso`, `FechaNacimiento`, `PaisOrigen`, `DNIDueño`) VALUES
('Milo', 'Pug', 25, '2009-11-17', 'Alemania', '54585175B'),
('Rocky', 'Bulldog', 22, '2008-12-27', 'Kenia', '43942808C');

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
('Xabier', '43942808C', 987654321, '2000-07-14', 'xxxx@gmail.com', '$2y$10$2UVdrpwvK5Sbbq1nC42GFujsIhM.kFBXd8YQvjHPh8chiBBwxnBNq'),
('Pepe', '54585175B', 987546321, '2000-10-10', 'pepe@gmail.com', '$2y$10$x3.eN1joEMOxo3h2YBN6CuUUGbaoeRiET9HtZ5FILss9Rb8ukH6te'),
('Jose Luis', '62796815F', 987654321, '2000-10-10', 'luis@gmail.com', '$2y$10$WecC.v0jUwu89B0dlUv7.OVzCg6AIDTRMp1y6KEcrGOnY4NsiDTiy'),
('Ander', '79045038H', 123456789, '2002-07-08', 'ander@gmail.com', '$2y$10$lm/oxIcy7YVkSlAMv91Ffe1qFtP2z8jCC3RoRMR92dqv52e3DCpyC'),
('Alberto', '86868605C', 654271891, '2000-12-12', 'alberto@gmail.com', '$2y$10$9u/ppb3lass/TmmuGHYwS.QwoZE4PMiAMub2Ts2IFYaHO9mDfvKRS');

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