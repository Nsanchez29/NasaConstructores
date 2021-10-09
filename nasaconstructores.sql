-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 11:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasaconstructores`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `telefono` int(8) NOT NULL,
  `direccion` text NOT NULL,
  `nit` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `telefono`, `direccion`, `nit`, `estado`) VALUES
(1, 'Cliente', 12345678, 'Calle Principal San Agustin', 1234850, 1),
(2, 'Cliente 2', 876543210, 'Calle Principal 2', 234850, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `departamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `departamento`) VALUES
(1, 'Guatemala'),
(2, 'El Progreso'),
(3, 'Sacatepéquez'),
(4, 'Chimaltenango'),
(5, 'Escuintla'),
(6, 'Santa Rosa'),
(7, 'Sololá'),
(8, 'Totonicapán'),
(9, 'Quetzaltenango'),
(10, 'Suchitepéquez'),
(11, 'Retalhuleu'),
(12, 'San Marcos'),
(13, 'Huehuetenango'),
(14, 'Quiché'),
(15, 'Baja Verapaz'),
(16, 'Alta Verapaz'),
(17, 'Petén'),
(18, 'Izabal'),
(19, 'Zacapa'),
(20, 'Chiquimula'),
(21, 'Jalapa'),
(22, 'Jutiapa');

-- --------------------------------------------------------

--
-- Table structure for table `egreso`
--

CREATE TABLE `egreso` (
  `id_egreso` int(11) NOT NULL,
  `proyecto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `egreso`
--

INSERT INTO `egreso` (`id_egreso`, `proyecto`, `id_usuario`, `fecha`, `monto`, `descripcion`, `estado`) VALUES
(1, 1, 1, '2021-10-03', '200.00', 'Gasolina', 1),
(2, 1, 1, '2021-10-03', '200.00', 'Gastos', 1),
(3, 1, 1, '2021-10-03', '150.00', 'otros', 1),
(4, 1, 1, '2021-10-03', '50.00', 'otros 2', 0),
(5, 1, 1, '2021-10-03', '250.00', 'PRUEBA', 1),
(6, 1, 2, '2021-10-03', '935.20', 'Comida', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `id_proyecto`, `fecha`, `monto`, `descripcion`, `estado`) VALUES
(1, 1, '2021-10-03', '50000.00', 'Anticipo de proyecto Prueba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `municipio` text NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `municipio`, `id_departamento`) VALUES
(1, 'Guatemala', 1),
(2, 'Santa Catarina Pinula', 1),
(3, 'San José Pinula', 1),
(4, 'San José del Golfo', 1),
(5, 'Palencia', 1),
(6, 'Chinautla', 1),
(7, 'San Pedro Ayampuc', 1),
(8, 'Mixco', 1),
(9, 'San Pedro Sacatepéquez', 1),
(10, 'San Juan Sacatepéquez', 1),
(11, 'San Raymundo', 1),
(12, 'Chuarrancho', 1),
(13, 'Fraijanes', 1),
(14, 'Amatitlán', 1),
(15, 'Villa Nueva', 1),
(16, 'Villa Canales', 1),
(17, 'Petapa', 1),
(18, 'Guastatoya', 2),
(19, 'Morazán', 2),
(20, 'San Agustín Acasaguastlán', 2),
(21, 'San Cristóbal Acasaguastlán', 2),
(22, 'El Jícaro', 2),
(23, 'Sansare', 2),
(24, 'Sanarate', 2),
(25, 'San Antonio la Paz', 2),
(26, 'Antigua Guatemala', 3),
(27, 'Jocotenango', 3),
(28, 'Pastores', 3),
(29, 'Sumpango', 3),
(30, 'Santo Domingo Xenacoj', 3),
(31, 'Santiago Sacatepéquez', 3),
(32, 'San Bartolomé Milpas Altas', 3),
(33, 'San Lucas Sacatepéquez', 3),
(34, 'Santa Lucía Milpas Altas', 3),
(35, 'Magdalena Milpas Altas', 3),
(36, 'Santa María de Jesús', 3),
(37, 'Ciudad Vieja', 3),
(38, 'San Miguel Dueñas', 3),
(39, 'Alotenango', 3),
(40, 'San Antonio Aguas Calientes', 3),
(41, 'Santa Catarina Barahona', 3),
(42, 'Chimaltenango', 4),
(43, 'San José Poaquil', 4),
(44, 'San Martín Jilotepeque', 4),
(45, 'Comalapa', 4),
(46, 'Santa Apolonia', 4),
(47, 'Tecpán Guatemala', 4),
(48, 'Patzún', 4),
(49, 'Pochuta', 4),
(50, 'Patzicía', 4),
(51, 'Santa Cruz Balanyá', 4),
(52, 'Acatenango', 4),
(53, 'Yepocapa', 4),
(54, 'San Andrés Itzapa', 4),
(55, 'Parramos', 4),
(56, 'Zaragoza', 4),
(57, 'El Tejar', 4),
(58, 'Escuintla', 5),
(59, 'Santa Lucía Cotzumalguapa', 5),
(60, 'La Democracia', 5),
(61, 'Siquinalá', 5),
(62, 'Masagua', 5),
(63, 'Tiquisate', 5),
(64, 'La Gomera', 5),
(65, 'Guanagazapa', 5),
(66, 'San José', 5),
(67, 'Iztapa', 5),
(68, 'Palín', 5),
(69, 'San Vicente Pacaya', 5),
(70, 'Nueva Concepción', 5),
(71, 'Cuilapa', 6),
(72, 'Barberena', 6),
(73, 'Santa Rosa de Lima', 6),
(74, 'Casillas', 6),
(75, 'San Rafael las Flores', 6),
(76, 'Oratorio', 6),
(77, 'San Juan Tecuaco', 6),
(78, 'Chiquimulilla', 6),
(79, 'Taxisco', 6),
(80, 'Santa María Ixhuatán', 6),
(81, 'Guazacapán', 6),
(82, 'Santa Cruz Naranjo', 6),
(83, 'Pueblo Nuevo Viñas', 6),
(84, 'Nueva Santa Rosa', 6),
(85, 'Sololá', 7),
(86, 'San José Chacayá', 7),
(87, 'Santa María Visitación', 7),
(88, 'Santa Lucía Utatlán', 7),
(89, 'Nahualá', 7),
(90, 'Santa Catarina Ixtahuacán', 7),
(91, 'Santa Clara la Laguna', 7),
(92, 'Concepción', 7),
(93, 'San Andrés Semetabaj', 7),
(94, 'Panajachel', 7),
(95, 'Santa Catarina Palopó', 7),
(96, 'San Antonio Palopó', 7),
(97, 'San Lucas Tolimán', 7),
(98, 'Santa Cruz la Laguna', 7),
(99, 'San Pablo la Laguna', 7),
(100, 'San Marcos la Laguna', 7),
(101, 'San Juan la Laguna', 7),
(102, 'San Pedro la Laguna', 7),
(103, 'Santiago Atitlán', 7),
(104, 'Totonicapán', 8),
(105, 'San Cristóbal Totonicapán', 8),
(106, 'San Francisco el Alto', 8),
(107, 'San Andrés Xecul', 8),
(108, 'Momostenango', 8),
(109, 'Santa María Chiquimula', 8),
(110, 'Santa Lucía la Reforma', 8),
(111, 'San Bartolo', 8),
(112, 'Quetzaltenango', 9),
(113, 'Salcajá', 9),
(114, 'Olintepeque', 9),
(115, 'San Carlos Sija', 9),
(116, 'Sibilia', 9),
(117, 'Cabricán', 9),
(118, 'Cajolá', 9),
(119, 'San Miguel Siguilá', 9),
(120, 'Ostuncalco', 9),
(121, 'San Mateo', 9),
(122, 'Concepción Chiquirichapa', 9),
(123, 'San Martín Sacatepéquez', 9),
(124, 'Almolonga', 9),
(125, 'Cantel', 9),
(126, 'Huitán', 9),
(127, 'Zunil', 9),
(128, 'Colomba', 9),
(129, 'San Francisco la Unión', 9),
(130, 'El Palmar', 9),
(131, 'Coatepeque', 9),
(132, 'Génova', 9),
(133, 'Flores Costa Cuca', 9),
(134, 'La Esperanza', 9),
(135, 'Palestina de los Altos', 9),
(136, 'Mazatenango', 10),
(137, 'Cuyotenango', 10),
(138, 'San Francisco Zapotitlán', 10),
(139, 'San Bernardino', 10),
(140, 'San José el Idolo', 10),
(141, 'Santo Domingo Suchitepéquez', 10),
(142, 'San Lorenzo', 10),
(143, 'Samayac', 10),
(144, 'San Pablo Jocopilas', 10),
(145, 'San Antonio Suchitepéquez', 10),
(146, 'San Miguel Panán', 10),
(147, 'San Gabriel', 10),
(148, 'Chicacao', 10),
(149, 'Patulul', 10),
(150, 'Santa Bárbara', 10),
(151, 'San Juan Bautista', 10),
(152, 'Santo Tomás la Unión', 10),
(153, 'Zunilito', 10),
(154, 'Pueblo Nuevo', 10),
(155, 'Río Bravo', 10),
(156, 'San José La Máquina', 10),
(157, 'Retalhuleu', 11),
(158, 'San Sebastián', 11),
(159, 'Santa Cruz Muluá', 11),
(160, 'San Martín Zapotitlán', 11),
(161, 'San Felipe', 11),
(162, 'San Andrés Villa Seca', 11),
(163, 'Champerico', 11),
(164, 'Nuevo San Carlos', 11),
(165, 'El Asintal', 11),
(166, 'San Marcos', 12),
(167, 'San Pedro Sacatepéquez', 12),
(168, 'San Antonio Sacatepéquez', 12),
(169, 'Comitancillo', 12),
(170, 'San Miguel Ixtahuacán', 12),
(171, 'Concepción Tutuapa', 12),
(172, 'Tacaná', 12),
(173, 'Sibinal', 12),
(174, 'Tajumulco', 12),
(175, 'Tejutla', 12),
(176, 'San Rafael Pié de la Cuesta', 12),
(177, 'Nuevo Progreso', 12),
(178, 'El Tumbador', 12),
(179, 'El Rodeo', 12),
(180, 'Malacatán', 12),
(181, 'Catarina', 12),
(182, 'Ayutla', 12),
(183, 'Ocós', 12),
(184, 'San Pablo', 12),
(185, 'El Quetzal', 12),
(186, 'La Reforma', 12),
(187, 'Pajapita', 12),
(188, 'Ixchiguán', 12),
(189, 'San José Ojetenán', 12),
(190, 'San Cristóbal Cucho', 12),
(191, 'Sipacapa', 12),
(192, 'Esquipulas Palo Gordo', 12),
(193, 'Río Blanco', 12),
(194, 'San Lorenzo', 12),
(195, 'La Blanca', 12),
(196, 'Huehuetenango', 13),
(197, 'Chiantla', 13),
(198, 'Malacatancito', 13),
(199, 'Cuilco', 13),
(200, 'Nentón', 13),
(201, 'San Pedro Necta', 13),
(202, 'Jacaltenango', 13),
(203, 'Soloma', 13),
(204, 'Ixtahuacán', 13),
(205, 'Santa Bárbara', 13),
(206, 'La Libertad', 13),
(207, 'La Democracia', 13),
(208, 'San Miguel Acatán', 13),
(209, 'San Rafael la Independencia', 13),
(210, 'Todos Santos Cuchumatán', 13),
(211, 'San Juan Atitán', 13),
(212, 'Santa Eulalia', 13),
(213, 'San Mateo Ixtatán', 13),
(214, 'Colotenango', 13),
(215, 'San Sebastián Huehuetenango', 13),
(216, 'Tectitán', 13),
(217, 'Concepción Huista', 13),
(218, 'San Juan Ixcoy', 13),
(219, 'San Antonio Huista', 13),
(220, 'San Sebastián Coatán', 13),
(221, 'Barillas', 13),
(222, 'Aguacatán', 13),
(223, 'San Rafael Petzal', 13),
(224, 'San Gaspar Ixchil', 13),
(225, 'Santiago Chimaltenango', 13),
(226, 'Santa Ana Huista', 13),
(227, 'Unión Cantinil', 13),
(228, 'Santa Cruz del Quiché', 14),
(229, 'Chiché', 14),
(230, 'Chinique', 14),
(231, 'Zacualpa', 14),
(232, 'Chajul', 14),
(233, 'Chichicastenango', 14),
(234, 'Patzité', 14),
(235, 'San Antonio Ilotenango', 14),
(236, 'San Pedro Jocopilas', 14),
(237, 'Cunén', 14),
(238, 'San Juan Cotzal', 14),
(239, 'Joyabaj', 14),
(240, 'Nebaj', 14),
(241, 'San Andrés Sajcabajá', 14),
(242, 'Uspantán', 14),
(243, 'Sacapulas', 14),
(244, 'San Bartolomé Jocotenango', 14),
(245, 'Canillá', 14),
(246, 'Chicamán', 14),
(247, 'Ixcán', 14),
(248, 'Pachalum', 14),
(249, 'Salamá', 15),
(250, 'San Miguel Chicaj', 15),
(251, 'Rabinal', 15),
(252, 'Cubulco', 15),
(253, 'Granados', 15),
(254, 'El Chol', 15),
(255, 'San Jerónimo', 15),
(256, 'Purulhá', 15),
(257, 'Cobán', 16),
(258, 'Santa Cruz Verapaz', 16),
(259, 'San Cristóbal Verapaz', 16),
(260, 'Tactic', 16),
(261, 'Tamahú', 16),
(262, 'Tucurú', 16),
(263, 'Panzós', 16),
(264, 'Senahú', 16),
(265, 'San Pedro Carchá', 16),
(266, 'San Juan Chamelco', 16),
(267, 'Lanquín', 16),
(268, 'Cahabón', 16),
(269, 'Chisec', 16),
(270, 'Chahal', 16),
(271, 'Fray Bartolomé de las Casas', 16),
(272, 'Santa Catalina la Tinta', 16),
(273, 'Raxruhá', 16),
(274, 'Flores', 17),
(275, 'San José', 17),
(276, 'San Benito', 17),
(277, 'San Andrés', 17),
(278, 'La Libertad', 17),
(279, 'San Francisco', 17),
(280, 'Santa Ana', 17),
(281, 'Dolores', 17),
(282, 'San Luis', 17),
(283, 'Sayaxché', 17),
(284, 'Melchor de Mencos', 17),
(285, 'Poptún', 17),
(286, 'Las Cruces', 17),
(287, 'El Chal', 17),
(288, 'Puerto Barrios', 18),
(289, 'Livingston', 18),
(290, 'El Estor', 18),
(291, 'Morales', 18),
(292, 'Los Amates', 18),
(293, 'Zacapa', 19),
(294, 'Estanzuela', 19),
(295, 'Río Hondo', 19),
(296, 'Gualán', 19),
(297, 'Teculután', 19),
(298, 'Usumatlán', 19),
(299, 'Cabañas', 19),
(300, 'San Diego', 19),
(301, 'La Unión', 19),
(302, 'Huité', 19),
(303, 'San Jorge', 19),
(304, 'Chiquimula', 20),
(305, 'San José La Arada', 20),
(306, 'San Juan Ermita', 20),
(307, 'Jocotán', 20),
(308, 'Camotán', 20),
(309, 'Olopa', 20),
(310, 'Esquipulas', 20),
(311, 'Concepción Las Minas', 20),
(312, 'Quetzaltepeque', 20),
(313, 'San Jacinto', 20),
(314, 'Ipala', 20),
(315, 'Jalapa', 21),
(316, 'San Pedro Pinula', 21),
(317, 'San Luis Jilotepeque', 21),
(318, 'San Manuel Chaparrón', 21),
(319, 'San Carlos Alzatate', 21),
(320, 'Monjas', 21),
(321, 'Mataquescuintla', 21),
(322, 'Jutiapa', 22),
(323, 'El Progreso', 22),
(324, 'Santa Catarina Mita', 22),
(325, 'Agua Blanca', 22),
(326, 'Asunción Mita', 22),
(327, 'Yupiltepeque', 22),
(328, 'Atescatempa', 22),
(329, 'Jerez', 22),
(330, 'El Adelanto', 22),
(331, 'Zapotitlán', 22),
(332, 'Comapa', 22),
(333, 'Jalpatagua', 22),
(334, 'Conguaco', 22),
(335, 'Moyuta', 22),
(336, 'Pasaco', 22),
(337, 'San José Acatempa', 22),
(338, 'Quesada', 22);

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `municipio` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `contrato` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nog` text NOT NULL,
  `estadoproyecto` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `id_cliente`, `nombre`, `municipio`, `departamento`, `direccion`, `precio`, `contrato`, `fecha_inicio`, `fecha_fin`, `nog`, `estadoproyecto`, `estado`) VALUES
(1, 1, 'Proyecto de prueba 1', 1, 1, 'Calle Principal Barrio Guaytan 1', '82000.00', 'SN0010', '2021-10-01', '2021-10-17', 'Nog10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Gerencia'),
(3, 'Secretaria');

-- --------------------------------------------------------

--
-- Table structure for table `transferencia`
--

CREATE TABLE `transferencia` (
  `id_transferencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_usuariodest` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `tipo` text NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transferencia`
--

INSERT INTO `transferencia` (`id_transferencia`, `id_usuario`, `id_usuariodest`, `monto`, `descripcion`, `fecha`, `tipo`, `estado`) VALUES
(1, 1, 1, '6000.00', 'Salario', '2021-10-03', 'PROPIA', 1),
(2, 1, 2, '2000.00', 'Gastos internos', '2021-10-03', 'TERCEROS', 1),
(3, 1, 2, '8200.00', 'Otros Gastos', '2021-10-03', 'TERCEROS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `estado` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `password`, `estado`, `id_rol`) VALUES
(1, 'Néstor Antonio Sánchez Larios', 'nsanchez', '$2y$10$SxML3yNqwHV2Z4Odug1pGem6ITsJ0GpJ3gZo.0mGuy7gkggigSDsO', 1, 1),
(2, 'Antonio Salvador Sánchez Ayala', 'asanchez', '$2y$10$kb3coAoKDkmpvcvhKhBXXeAZYk1mDJLB0hKPar/tS2X0LTy4Kethy', 1, 2),
(3, 'Irma Beatriz Vásquez', 'ivasquez', '$2y$10$XYdSrjVLoADIan9VjkqMq.5u/6FKvGtWDxRSU7PcagPXwlZmruhk6', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`id_egreso`),
  ADD KEY `proyecto` (`proyecto`);

--
-- Indexes for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indexes for table `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`id_transferencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `egreso`
--
ALTER TABLE `egreso`
  MODIFY `id_egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transferencia`
--
ALTER TABLE `transferencia`
  MODIFY `id_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `egreso`
--
ALTER TABLE `egreso`
  ADD CONSTRAINT `proyecto` FOREIGN KEY (`proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `id_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transferencia`
--
ALTER TABLE `transferencia`
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
