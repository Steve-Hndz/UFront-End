-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2020 a las 04:03:19
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_bloodproject`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addDonante` (IN `nombreDonante` TEXT, IN `apellidoDonante` TEXT, IN `telefonoDonante` TEXT, IN `idDepartamento` INT, IN `idMunicipio` INT, IN `pruebaDonante` TINYINT, IN `estadoDonante` TINYINT, IN `idSangre` INT)  BEGIN
    INSERT INTO `tbl_donantes`(
        `nombre_donante`,
        `apellido_donante`,
        `telefono_donante`,
        `id_departamento`,
        `id_municipio`,
        `prueba_donante`,
        `estado_donante`,
        `id_sangre`
    )
VALUES(
    nombreDonante,
    apellidoDonante,
    telefonoDonante,
    idDepartamento,
    municipioDonante,
    pruebaDonante,
    estadoDonante,
    idSangre
);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addHospital` (IN `nombreHospital` TEXT, IN `telefonoHospital` TEXT, IN `direccionHospital` TEXT, IN `encargadoHospital` TEXT, IN `telefonoEncargadoHospital` TEXT, IN `correoEncargadoHospital` TEXT, IN `correoContactoHospital` TEXT)  BEGIN
    INSERT INTO `tbl_hospitales`(
        `nombre_hospital`,
        `telefono_hospital`,
        `direccion_hospital`,
        `encargado_hospital`,
        `telefonoEncargado_hospital`,
        `correoEncargado_hospital`,
        `correoContacto_hospital`
    )
VALUES(
    nombreHospital,
    telefonoHospital,
    direccionHospital,
    direccionHospital,
    telefonoEncargadoHospital,
    correoEncargadoHospital,
    correoContactoHospital
);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addPaciente` (IN `nombrePaciente` TEXT, IN `apellidoPaciente` TEXT, IN `telefonoPaciente` TEXT, IN `correoPaciente` TEXT, IN `idSangre` INT, IN `idDepartamento` INT, IN `idMunicipio` INT, IN `estadoPaciente` TINYINT, IN `idHospital` INT)  BEGIN
    INSERT INTO `tbl_pacientes`(
        `nombre_paciente`,
        `apellido_paciente`,
        `telefono_paciente`,
        `correo_paciente`,
        `id_sangre`,
        `id_departamento`,
        `id_municipio`,
        `estado_paciente`,
         `id_hospital`
    )
VALUES(
    nombrePaciente,
    apellidoPaciente,
    telefonoPaciente,
    correoPaciente,
    idSangre,
    idDepartamento,
    idMunicipio,
    estadoPaciente,
    idHospital
) ;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `departamentos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `departamentos` (
`ID` int(11)
,`Departamento` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `donantes_activos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `donantes_activos` (
`Nombre` mediumtext
,`Telefono` text
,`Sangre` text
,`Departamento` varchar(100)
,`Municipio` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `hospitales`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `hospitales` (
`ID` int(11)
,`Nombre` text
,`Direccion` text
,`Telefono` text
,`Correo` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `municipios`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `municipios` (
`ID` int(11)
,`Municipio` varchar(100)
,`IdDepartamento` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pacientes_activos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `pacientes_activos` (
`Nombre` mediumtext
,`Telefono` text
,`Sangre` text
,`Hospital` text
,`Departamento` varchar(100)
,`Municipio` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `sangres`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `sangres` (
`ID` int(11)
,`Tipo` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'San Salvador'),
(2, 'San Miguel'),
(3, 'Santa Ana'),
(4, 'Usulután'),
(5, 'Morazán'),
(6, 'La Unión'),
(7, 'La Libertad'),
(8, 'Cabañas'),
(9, 'San Vicente'),
(10, 'Chalatenango'),
(11, 'La Paz'),
(12, 'Sonsonate'),
(13, 'Ahuachapán'),
(14, 'Cuscatlán'),
(15, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_donantes`
--

CREATE TABLE `tbl_donantes` (
  `id_donante` int(11) NOT NULL,
  `nombre_donante` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_donante` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_donante` text COLLATE utf8_spanish_ci NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `prueba_donante` enum('Yes','No') COLLATE utf8_spanish_ci NOT NULL,
  `estado_donante` enum('Activo','Inactivo','') COLLATE utf8_spanish_ci NOT NULL,
  `id_sangre` int(11) NOT NULL,
  `carnet` enum('Yes','No') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No',
  `historial` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasenia` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_donantes`
--

INSERT INTO `tbl_donantes` (`id_donante`, `nombre_donante`, `apellido_donante`, `telefono_donante`, `id_departamento`, `id_municipio`, `prueba_donante`, `estado_donante`, `id_sangre`, `carnet`, `historial`, `contrasenia`) VALUES
(1, 'Oscar', 'Palacios', '7588-9633', 1, 2, 'Yes', '', 1, 'No', NULL, ''),
(4, 'Erick Josue', 'Saravia', '71021375', 1, 1, 'Yes', '', 1, 'No', NULL, ''),
(5, 'Erick', 'Saravia', '7102-1375', 2, 11, '', '', 1, 'No', 'No tengo ningun dato', ''),
(6, 'Erick', 'Saravia', '7102-1375', 2, 11, '', '', 1, 'No', 'No tengo ningun dato', ''),
(7, 'erick', 'Saravia', '7102-1375', 1, 1, '', '', 1, 'No', 'adasd', ''),
(8, 'erick', 'Saravia', '7102-1375', 1, 1, '', '', 1, 'No', 'adasd', ''),
(9, 'asdasd', 'sdsdad', '7102-1375', 1, 1, '', '', 3, 'No', 'asdas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_hospitales`
--

CREATE TABLE `tbl_hospitales` (
  `id_hospital` int(11) NOT NULL,
  `nombre_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `encargado_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `telefonoEncargado_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `correoEncargado_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `correoContacto_hospital` text COLLATE utf8_spanish_ci NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_hospitales`
--

INSERT INTO `tbl_hospitales` (`id_hospital`, `nombre_hospital`, `telefono_hospital`, `direccion_hospital`, `encargado_hospital`, `telefonoEncargado_hospital`, `correoEncargado_hospital`, `correoContacto_hospital`, `id_departamento`, `id_municipio`) VALUES
(1, 'Hospital Nacional de Niños Benjamín Bloom', '2225-4114', 'Boulevard De Los Héroes, San Salvador', '', '', '', '', 0, 0),
(2, 'Hospital Médico Quirúrgico y Oncológico (HMQ del ISSS)', '2244-4777 y 2591-3000', 'Alameda Juan Pablo II, San Salvador', '', '', '', 'atencionalusuario@isss.gob.sv', 0, 0),
(3, 'Hospital Nacional Rosales', '2231-9200', '25 Av Norte y Final Calle Arce, San Salvador', '', '', '', '', 0, 0),
(4, 'Hospital Nacional San Juan de Dios de Santa Ana​', '2435 9500', '17 Avenida Sur, Barrio San Rafael, Santa Ana', '', '', '', '', 0, 0),
(5, 'Hospital Militar Central', '2250-0080', 'Residencial San Luis y Avenida Bernal, San Salvador', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipio`
--

CREATE TABLE `tbl_municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_municipio`
--

INSERT INTO `tbl_municipio` (`id_municipio`, `nombre_municipio`, `id_departamento`) VALUES
(1, 'San Salvador', 1),
(2, 'Aguilares', 1),
(3, 'Apopa', 1),
(4, 'Ayutuxtepeque', 1),
(5, 'Cuscatancingo', 1),
(6, 'San Martin', 1),
(7, 'Cuscatancingo', 1),
(8, 'San Martin', 1),
(9, 'Mejicanos', 1),
(10, 'Soyapango', 1),
(11, 'San Miguel', 2),
(12, 'Carolina', 2),
(13, 'Chinameca', 2),
(14, 'Chirilagua', 2),
(15, 'Ciudad Barrios', 2),
(16, 'Comacarán', 2),
(17, 'Moncagua', 2),
(18, 'El tránsito', 2),
(19, 'Quelepa', 2),
(20, 'San Jorge', 2),
(21, 'El Congo', 3),
(22, 'Chalchuapa', 3),
(23, 'Candelaria de la Frontera', 3),
(24, 'Coatepeque', 3),
(25, 'Metapán', 3),
(26, 'Texistepeque', 3),
(27, 'Santa Ana', 3),
(28, 'Masahuat', 3),
(29, 'El Porvenir', 3),
(30, 'San Antonio Pajonal', 3),
(31, 'Alegría', 4),
(32, 'Berlín', 4),
(33, 'California', 4),
(34, 'Concepción Batres', 4),
(35, 'El Triunfo', 4),
(36, 'Ereguayquín', 4),
(37, 'Estanzuelas', 4),
(38, 'Jiquilisco', 4),
(39, 'Jucuapa', 4),
(40, 'Usulután', 4),
(41, 'Arambala', 5),
(42, 'Perquín', 5),
(43, 'Osicala', 5),
(44, 'Lolotiquillo', 5),
(45, 'Jocoro', 5),
(46, 'Jocoaitique', 5),
(47, 'El Divisadero', 5),
(48, 'El Rosario', 5),
(49, 'Cacaopera', 5),
(50, 'San Francisco Gotera', 5),
(51, 'Anamorós', 6),
(52, 'Bolívar', 6),
(53, 'Concepción de Oriente', 6),
(54, 'Conchagua', 6),
(55, 'El Carmen', 6),
(56, 'El Sauce', 6),
(57, 'Intipucá', 6),
(58, 'La Unión', 6),
(59, 'Lislique', 6),
(60, 'Pasaquina', 6),
(61, 'Antiguo Cuscatlán', 7),
(62, 'Quezaltepeque', 7),
(63, 'Ciudad Arce', 7),
(64, 'Colón', 7),
(65, 'Comasagua', 7),
(66, 'Huizúcar', 7),
(67, 'Jayaque', 7),
(68, 'Zaragoza', 7),
(69, 'La Libertad', 7),
(70, 'Santa Tecla', 7),
(71, 'Victoria', 8),
(72, 'Tejutepeque', 8),
(73, 'Sensuntepeque', 8),
(74, 'San Isidro', 8),
(75, 'Jutiapa', 8),
(76, 'Ilobasco', 8),
(77, 'Cinquera', 8),
(78, 'Dolores', 8),
(79, 'Guacotecti', 8),
(80, 'Verapaz', 9),
(81, 'Tecoluca', 9),
(82, 'Tepetitán', 9),
(83, 'Santo Domingo', 9),
(84, 'Santa Clara', 9),
(85, 'San Vicente', 9),
(86, 'San Sebastián', 9),
(87, 'San Ildefonso', 9),
(88, 'San Lorenzo', 9),
(89, 'Apastepeque', 9),
(90, 'Tejutla', 10),
(91, 'Santa Rita', 10),
(92, 'San Rafael', 10),
(93, 'Chalatenango', 10),
(94, 'San Ignacio', 10),
(95, 'San Francisco Lempa', 10),
(96, 'Nueva Trinidad', 10),
(97, 'Nueva Concepción', 10),
(98, 'Comalapa', 10),
(99, 'El Carrizal', 10),
(100, 'Zacatecoluca', 11),
(101, 'Santiago Nonualco', 11),
(102, 'Santa María Ostuma', 11),
(103, 'San Luis Talpa', 11),
(104, 'San Juan Tepezontes', 11),
(105, 'San Antonio Masahuat', 11),
(106, 'Olocuilta', 11),
(107, 'Jerusalén', 11),
(108, 'El Rosario', 11),
(109, 'Mercedes la Ceiba', 11),
(110, 'Sonzacate', 12),
(111, 'Sonsonate', 12),
(112, 'San Julián', 12),
(113, 'Nahuizalco', 12),
(114, 'San Antonio del Monte', 12),
(115, 'Armenia', 12),
(116, 'Salcoatitán', 12),
(117, 'Juayúa', 12),
(118, 'Izalco', 12),
(119, 'Acajutla', 12),
(120, 'Ahuachapán', 13),
(121, 'Turín', 13),
(122, 'Tacuba', 13),
(123, 'San Pedro Puxtla', 13),
(124, 'San Lorenzo', 13),
(125, 'Guaymango', 13),
(126, 'Concepción de Ataco', 13),
(127, 'Jujutla', 13),
(128, 'Apaneca', 13),
(129, 'Atiquizaya', 13),
(130, 'Tenancingo', 14),
(131, 'Suchitoto', 14),
(132, 'Santa Cruz Michapa', 14),
(133, 'San Ramón', 14),
(134, 'San Rafael Cedros', 14),
(135, 'San Pedro Perulapán', 14),
(136, 'San Cristóbal', 14),
(137, 'Cojutepeque', 14),
(138, 'Candelaria', 14),
(139, 'El Carmen', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `correo_paciente` text COLLATE utf8_spanish_ci NOT NULL,
  `id_sangre` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `estado_paciente` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Activo',
  `id_hospital` int(11) NOT NULL,
  `contrasenia` longtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_pacientes`
--

INSERT INTO `tbl_pacientes` (`id_paciente`, `nombre_paciente`, `apellido_paciente`, `telefono_paciente`, `correo_paciente`, `id_sangre`, `id_departamento`, `id_municipio`, `estado_paciente`, `id_hospital`, `contrasenia`) VALUES
(2, 'Luis', 'Chavez', '7485-9632', 'luisv@gmail.com', 1, 1, 2, '', 1, ''),
(3, 'erick', 'Saravia', '7102-1375', '', 2, 1, 1, '', 1, ''),
(4, 'erick', 'Saravia', '7102-1375', '', 2, 1, 1, '', 1, ''),
(5, 'erick', 'Saravia', '7102-1375', '', 2, 1, 1, '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sangre`
--

CREATE TABLE `tbl_sangre` (
  `id_sangre` int(11) NOT NULL,
  `nombre_sangre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_sangre`
--

INSERT INTO `tbl_sangre` (`id_sangre`, `nombre_sangre`) VALUES
(1, 'ORH+ (ORH positivo)'),
(2, 'ORH- (ORH negativo)'),
(3, 'O- (O negativo)'),
(4, 'O+ (O positivo)'),
(5, 'A- (A negativo)'),
(6, 'A+ (A positivo)'),
(7, 'B- (B negativo)'),
(8, 'B+ (B positivo)'),
(9, 'AB- (AB negativo)'),
(10, 'AB+ (AB positivo)');

-- --------------------------------------------------------

--
-- Estructura para la vista `departamentos`
--
DROP TABLE IF EXISTS `departamentos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departamentos`  AS  select `tbl_departamento`.`id_departamento` AS `ID`,`tbl_departamento`.`nombre_departamento` AS `Departamento` from `tbl_departamento` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `donantes_activos`
--
DROP TABLE IF EXISTS `donantes_activos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `donantes_activos`  AS  select concat(`d`.`nombre_donante`,' ',`d`.`apellido_donante`) AS `Nombre`,`d`.`telefono_donante` AS `Telefono`,`s`.`nombre_sangre` AS `Sangre`,`dp`.`nombre_departamento` AS `Departamento`,`m`.`nombre_municipio` AS `Municipio` from (((`tbl_donantes` `d` join `tbl_sangre` `s` on(`d`.`id_sangre` = `s`.`id_sangre`)) join `tbl_departamento` `dp` on(`d`.`id_departamento` = `dp`.`id_departamento`)) join `tbl_municipio` `m` on(`d`.`id_municipio` = `m`.`id_municipio`)) where `d`.`estado_donante` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `hospitales`
--
DROP TABLE IF EXISTS `hospitales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hospitales`  AS  select `tbl_hospitales`.`id_hospital` AS `ID`,`tbl_hospitales`.`nombre_hospital` AS `Nombre`,`tbl_hospitales`.`direccion_hospital` AS `Direccion`,`tbl_hospitales`.`telefono_hospital` AS `Telefono`,`tbl_hospitales`.`correoContacto_hospital` AS `Correo` from `tbl_hospitales` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `municipios`
--
DROP TABLE IF EXISTS `municipios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `municipios`  AS  select `tbl_municipio`.`id_municipio` AS `ID`,`tbl_municipio`.`nombre_municipio` AS `Municipio`,`tbl_municipio`.`id_departamento` AS `IdDepartamento` from `tbl_municipio` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `pacientes_activos`
--
DROP TABLE IF EXISTS `pacientes_activos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pacientes_activos`  AS  select concat(`p`.`nombre_paciente`,' ',`p`.`apellido_paciente`) AS `Nombre`,`p`.`telefono_paciente` AS `Telefono`,`s`.`nombre_sangre` AS `Sangre`,`h`.`nombre_hospital` AS `Hospital`,`d`.`nombre_departamento` AS `Departamento`,`m`.`nombre_municipio` AS `Municipio` from ((((`tbl_pacientes` `p` join `tbl_sangre` `s` on(`p`.`id_sangre` = `s`.`id_sangre`)) join `tbl_departamento` `d` on(`p`.`id_departamento` = `d`.`id_departamento`)) join `tbl_municipio` `m` on(`p`.`id_municipio` = `m`.`id_municipio`)) join `tbl_hospitales` `h` on(`p`.`id_hospital` = `h`.`id_hospital`)) where `p`.`estado_paciente` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `sangres`
--
DROP TABLE IF EXISTS `sangres`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sangres`  AS  select `tbl_sangre`.`id_sangre` AS `ID`,`tbl_sangre`.`nombre_sangre` AS `Tipo` from `tbl_sangre` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `tbl_donantes`
--
ALTER TABLE `tbl_donantes`
  ADD PRIMARY KEY (`id_donante`),
  ADD KEY `donante-departamento` (`id_departamento`),
  ADD KEY `donante-municipio` (`id_municipio`),
  ADD KEY `id_sangre` (`id_sangre`);

--
-- Indices de la tabla `tbl_hospitales`
--
ALTER TABLE `tbl_hospitales`
  ADD PRIMARY KEY (`id_hospital`);

--
-- Indices de la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento-municipio` (`id_departamento`);

--
-- Indices de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_sangre` (`id_sangre`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `idHospital` (`id_hospital`);

--
-- Indices de la tabla `tbl_sangre`
--
ALTER TABLE `tbl_sangre`
  ADD PRIMARY KEY (`id_sangre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_donantes`
--
ALTER TABLE `tbl_donantes`
  MODIFY `id_donante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_hospitales`
--
ALTER TABLE `tbl_hospitales`
  MODIFY `id_hospital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_sangre`
--
ALTER TABLE `tbl_sangre`
  MODIFY `id_sangre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_donantes`
--
ALTER TABLE `tbl_donantes`
  ADD CONSTRAINT `donante-departamento` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamento` (`id_departamento`),
  ADD CONSTRAINT `donante-municipio` FOREIGN KEY (`id_municipio`) REFERENCES `tbl_municipio` (`id_municipio`),
  ADD CONSTRAINT `donante-sangre` FOREIGN KEY (`id_sangre`) REFERENCES `tbl_sangre` (`id_sangre`);

--
-- Filtros para la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  ADD CONSTRAINT `departamento-municipio` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamento` (`id_departamento`);

--
-- Filtros para la tabla `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD CONSTRAINT `paciente-departamento` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamento` (`id_departamento`),
  ADD CONSTRAINT `paciente-hospital` FOREIGN KEY (`id_hospital`) REFERENCES `tbl_hospitales` (`id_hospital`),
  ADD CONSTRAINT `paciente-municipio` FOREIGN KEY (`id_municipio`) REFERENCES `tbl_municipio` (`id_municipio`),
  ADD CONSTRAINT `paciente-sangre` FOREIGN KEY (`id_sangre`) REFERENCES `tbl_sangre` (`id_sangre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
